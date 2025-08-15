<?php

namespace App\Http\Controllers\Pelaksana;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PelaksanaController extends Controller
{
    /**
     * List tugas pelaksana
     */
    public function index()
    {
        $orders = Order::where('pelaksana_id', Auth::id())
            ->whereIn('status', ['assigned', 'in_progress'])
            ->latest()
            ->get();

        return view('pelaksana.index', compact('orders'));
    }

    /**
     * Detail tugas
     */
    public function show($id)
    {
        $order = Order::where('pelaksana_id', Auth::id())->findOrFail($id);
        return view('pelaksana.show', compact('order'));
    }

    /**
     * Form upload bukti video
     */
    public function uploadForm($id)
    {
        $order = Order::where('pelaksana_id', Auth::id())->findOrFail($id);
        return view('pelaksana.upload', compact('order'));
    }

    /**
     * Simpan bukti video
     */
    public function upload(Request $request, $id)
    {
        // Cek apakah ada file yang diupload
        if (!$request->hasFile('bukti_video')) {
            return back()->with('error', 'Silakan pilih file video terlebih dahulu.');
        }

        // Cek ukuran POST data terlebih dahulu
        $postMaxSize = $this->parseSize(ini_get('post_max_size'));
        $contentLength = $request->server('CONTENT_LENGTH');
        
        if ($contentLength && $contentLength > $postMaxSize) {
            return back()->with('error', 'Total ukuran file terlalu besar. Maksimal: ' . ini_get('post_max_size'));
        }

        // Validasi input
        $request->validate([
            'bukti_video' => 'required|array|min:1|max:10', // maksimal 10 file
            'bukti_video.*' => 'required|file|mimes:mp4,avi,mov,mkv,3gp,flv,wmv|max:102400', // 100MB per file
            'keterangan' => 'nullable|string|max:1000'
        ], [
            'bukti_video.required' => 'Minimal satu video harus diupload',
            'bukti_video.array' => 'Format data video tidak valid',
            'bukti_video.min' => 'Minimal satu video harus diupload',
            'bukti_video.max' => 'Maksimal 10 video dapat diupload sekaligus',
            'bukti_video.*.required' => 'File video diperlukan',
            'bukti_video.*.file' => 'File harus berupa video yang valid',
            'bukti_video.*.mimes' => 'Format video harus MP4, AVI, MOV, MKV, 3GP, FLV, atau WMV',
            'bukti_video.*.max' => 'Ukuran video maksimal 100MB per file',
            'keterangan.max' => 'Keterangan maksimal 1000 karakter'
        ]);

        // Cari order dan pastikan milik pelaksana yang login
        $order = Order::where('pelaksana_id', auth()->id())->findOrFail($id);

        // Cek apakah order masih bisa diupload videonya
        if (!in_array($order->status, ['assigned', 'in_progress'])) {
            return back()->with('error', 'Order ini tidak dapat diupload video lagi. Status: ' . ucfirst($order->status));
        }

        // Start database transaction
        DB::beginTransaction();
        
        try {
            $uploadedVideos = [];
            $totalSize = 0;

            // Validasi ukuran total semua file
            foreach ($request->file('bukti_video') as $videoFile) {
                $totalSize += $videoFile->getSize();
            }

            // Cek apakah total ukuran melebihi batas (500MB total)
            $maxTotalSize = 500 * 1024 * 1024; // 500MB dalam bytes
            if ($totalSize > $maxTotalSize) {
                return back()->with('error', 'Total ukuran semua file melebihi batas maksimal 500MB. Total saat ini: ' . $this->formatBytes($totalSize));
            }

            // Buat direktori berdasarkan tahun/bulan jika belum ada
            $directory = 'videos/' . date('Y/m');
            if (!Storage::disk('public')->exists($directory)) {
                Storage::disk('public')->makeDirectory($directory);
            }

            // Upload semua video
            foreach ($request->file('bukti_video') as $index => $videoFile) {
                // Validasi file secara individual
                if (!$videoFile->isValid()) {
                    throw new \Exception("File ke-" . ($index + 1) . " tidak valid atau rusak");
                }

                // Generate unique filename dengan sanitization
                $originalName = pathinfo($videoFile->getClientOriginalName(), PATHINFO_FILENAME);
                $originalName = preg_replace('/[^A-Za-z0-9\-_]/', '_', $originalName); // Sanitize filename
                $extension = strtolower($videoFile->getClientOriginalExtension());
                
                // Pastikan ekstensi valid
                $allowedExtensions = ['mp4', 'avi', 'mov', 'mkv', '3gp', 'flv', 'wmv'];
                if (!in_array($extension, $allowedExtensions)) {
                    throw new \Exception("Format file ke-" . ($index + 1) . " tidak didukung: ." . $extension);
                }

                $filename = $originalName . '_' . $order->order_code . '_' . time() . '_' . ($index + 1) . '.' . $extension;

                // Store file dengan penanganan error
                try {
                    $path = $videoFile->storeAs($directory, $filename, 'public');
                    
                    if (!$path) {
                        throw new \Exception("Gagal menyimpan file ke-" . ($index + 1));
                    }
                } catch (\Exception $e) {
                    throw new \Exception("Error saat menyimpan file ke-" . ($index + 1) . ": " . $e->getMessage());
                }

                // Save to database
                $video = Video::create([
                    'order_id' => $order->id,
                    'pelaksana_id' => auth()->id(),
                    'file_path' => $path,
                    'original_name' => $videoFile->getClientOriginalName(),
                    'file_size' => $videoFile->getSize(),
                    'mime_type' => $videoFile->getMimeType(),
                    'description' => $request->keterangan ?: "Video dokumentasi pelaksanaan - File ke-" . ($index + 1),
                    'status' => 'pending', // akan diupdate oleh admin setelah verifikasi
                    'uploaded_at' => now()
                ]);

                $uploadedVideos[] = $video;

                // Log successful upload
                Log::info("Video uploaded successfully", [
                    'order_id' => $order->id,
                    'pelaksana_id' => auth()->id(),
                    'filename' => $filename,
                    'size' => $this->formatBytes($videoFile->getSize())
                ]);
            }

            // Update order status jika perlu
            if ($order->status === 'assigned') {
                $order->update([
                    'status' => 'in_progress',
                    'started_at' => now()
                ]);
            }

            // Commit transaction
            DB::commit();

            $successMessage = 'Berhasil mengupload ' . count($uploadedVideos) . ' video bukti pelaksanaan.';
            $successMessage .= ' Total ukuran: ' . $this->formatBytes($totalSize) . '.';
            $successMessage .= ' Status: Menunggu verifikasi admin.';

            return redirect()->route('pelaksana.orders.index')
                ->with('success', $successMessage);

        } catch (\Exception $e) {
            // Rollback database transaction
            DB::rollback();

            // Rollback uploaded files jika ada error
            if (!empty($uploadedVideos)) {
                foreach ($uploadedVideos as $video) {
                    try {
                        if (Storage::disk('public')->exists($video->file_path)) {
                            Storage::disk('public')->delete($video->file_path);
                        }
                        $video->delete();
                    } catch (\Exception $cleanupError) {
                        Log::error("Error during cleanup", [
                            'file_path' => $video->file_path,
                            'error' => $cleanupError->getMessage()
                        ]);
                    }
                }
            }

            // Log error
            Log::error("Video upload failed", [
                'order_id' => $id,
                'pelaksana_id' => auth()->id(),
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return back()
                ->withInput()
                ->with('error', 'Gagal mengupload video: ' . $e->getMessage());
        }
    }

    /**
     * Parse ukuran string ke bytes
     */
    private function parseSize($size)
    {
        if (empty($size)) {
            return 0;
        }
        
        $unit = preg_replace('/[^bkmgtpezy]/i', '', $size);
        $size = (float) preg_replace('/[^0-9\.]/', '', $size);
        
        if ($unit) {
            $unitMap = [
                'b' => 0, 'k' => 1, 'm' => 2, 'g' => 3, 
                't' => 4, 'p' => 5, 'e' => 6, 'z' => 7, 'y' => 8
            ];
            $power = $unitMap[strtolower($unit[0])] ?? 0;
            return (int) round($size * pow(1024, $power));
        }
        
        return (int) round($size);
    }

    /**
     * Format bytes ke human readable
     */
    private function formatBytes($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        
        for ($i = 0; $bytes >= 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        
        return round($bytes, $precision) . ' ' . $units[$i];
    }

    /**
     * Hapus video (jika diperlukan)
     */
    public function deleteVideo($orderId, $videoId)
    {
        $order = Order::where('pelaksana_id', auth()->id())->findOrFail($orderId);
        $video = Video::where('order_id', $order->id)->where('id', $videoId)->firstOrFail();

        try {
            // Hapus file dari storage
            if (Storage::disk('public')->exists($video->file_path)) {
                Storage::disk('public')->delete($video->file_path);
            }

            // Hapus record dari database
            $video->delete();

            return response()->json([
                'success' => true,
                'message' => 'Video berhasil dihapus'
            ]);

        } catch (\Exception $e) {
            Log::error("Failed to delete video", [
                'video_id' => $videoId,
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus video: ' . $e->getMessage()
            ], 500);
        }
    }
}