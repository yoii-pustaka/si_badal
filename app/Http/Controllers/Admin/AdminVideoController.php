<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminVideoController extends Controller
{
    public function index()
    {
        // Ambil orders yang memiliki video, beserta semua videonya
        $orders = Order::whereHas('videos')
            ->with([
                'videos' => function($query) {
                    $query->with('pelaksana')->latest();
                },
                'package'
            ])
            ->latest()
            ->paginate(10);

        // Hitung statistik
        $totalVideos = Video::count();
        $pendingVideos = Video::where('status', 'pending')->count();
        $approvedVideos = Video::where('status', 'approved')->count();
        $rejectedVideos = Video::where('status', 'rejected')->count();

        return view('admin.videos.index', compact(
            'orders', 
            'totalVideos', 
            'pendingVideos', 
            'approvedVideos', 
            'rejectedVideos'
        ));
    }

    public function show($id)
    {
        // Untuk admin, tidak perlu filter berdasarkan pelaksana_id
        // Admin harus bisa melihat semua order
        $order = Order::with([
            'videos' => function ($query) {
                $query->orderBy('created_at', 'desc'); // Urutkan video terbaru dulu
            },
            'package',
            'user', // User yang membuat order
            'pelaksana' // Pelaksana yang mengerjakan
        ])->findOrFail($id);

        // Pastikan order memiliki videos
        if (!$order->relationLoaded('videos')) {
            \Log::warning('Videos relation not loaded for order: ' . $order->id);
        }

        // Log untuk debugging (opsional, bisa dihapus di production)
        \Log::info('Admin viewing order videos', [
            'order_id' => $order->id,
            'order_code' => $order->order_code,
            'videos_count' => $order->videos->count(),
            'pelaksana_id' => $order->pelaksana_id,
            'pelaksana_name' => $order->pelaksana->name ?? 'N/A'
        ]);

        return view('admin.videos.show', compact('order'));
    }

    public function approve(Video $video)
    {
        $video->update([
            'status' => 'approved',
            'reject_reason' => null
        ]);

        return back()->with('success', 'Video berhasil disetujui.');
    }

    public function reject(Request $request, Video $video)
    {
        $request->validate([
            'reason' => 'nullable|string|max:255'
        ]);

        $video->update([
            'status' => 'rejected',
            'reject_reason' => $request->reason
        ]);

        return back()->with('success', 'Video berhasil ditolak.');
    }

    public function destroy(Video $video)
    {
        // Hapus file video dari storage jika ada
        if ($video->file_path && \Storage::exists($video->file_path)) {
            \Storage::delete($video->file_path);
        }

        $video->delete();

        return back()->with('success', 'Video berhasil dihapus.');
    }
}