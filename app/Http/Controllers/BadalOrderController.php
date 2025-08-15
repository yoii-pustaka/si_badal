<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Package;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class BadalOrderController extends Controller
{
    /**
     * Tampilkan daftar order (user atau admin tergantung role)
     */
    public function index()
    {
        if (auth()->user()->hasRole('user')) {
            $packages = Package::with('services')->get();
            $orders = Order::with('package')
                ->where('user_id', auth()->id())
                ->latest()
                ->get();
            return view('orders.index', compact('orders', 'packages'));
        }

        // Kalau admin / pelaksana, bisa diarahkan ke view lain
        $orders = Order::with(['package', 'user'])->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Form pendaftaran order badal umroh
     */
    public function create(Request $request)
    {
        $packages = Package::with(['services', 'parent.services'])->get();

        $selectedPackage = null;
        if ($request->has('package_id')) {
            $selectedPackage = Package::with(['services', 'parent.services'])->find($request->package_id);
        }

        return view('orders.create', compact('packages', 'selectedPackage'));
    }


    /**
     * Simpan data order baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_alm' => 'required|string|max:255',
            'bin_binti' => 'required|string|max:255',
            'kondisi' => 'required|in:almarhum,tua renta,sakit',
            'package_id' => 'required|exists:packages,id',
            'alamat_pendaftar' => 'required|string',
            'no_hp' => 'required|string|max:20',
            'keterangan' => 'nullable|string'
        ]);

        $order = Order::create([
            'order_code' => 'ORD-' . strtoupper(uniqid()),
            'user_id' => auth()->id(),
            'package_id' => $request->package_id,
            'nama_alm' => $request->nama_alm,
            'bin_binti' => $request->bin_binti,
            'kondisi' => $request->kondisi,
            'nama_pendaftar' => auth()->user()->name,
            'alamat_pendaftar' => $request->alamat_pendaftar,
            'no_hp' => $request->no_hp,
            'keterangan' => $request->keterangan,
            'status' => 'pending'
        ]);

        return redirect()->route('orders.show', $order->id)->with('success', 'Pendaftaran berhasil dibuat! Silakan lakukan pembayaran.');
    }

    /**
     * Tampilkan detail order
     */
    public function show($id)
    {
        $order = Order::with([
            'package.services',
            'user',
            'payment',
            'videos' => function($q) {
                $q->where('status', 'approved');
            }
        ])->findOrFail($id);
    
        if (auth()->user()->hasRole('user') && $order->user_id !== auth()->id()) {
            abort(403, 'Akses ditolak');
        }
    
        return view('orders.show', compact('order'));
    }
    

    /**
     * Form edit order
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);

        // Only allow edit if status is pending
        if ($order->status !== 'pending') {
            return redirect()->route('orders.show', $order->id)
                ->with('error', 'Order tidak dapat diedit karena sudah diproses.');
        }

        $packages = Package::with('services')->get();
        return view('orders.edit', compact('order', 'packages'));
    }

    /**
     * Upload bukti pembayaran
     */
    public function uploadPaymentProof(Request $request, Order $order)
    {
        if (auth()->user()->hasRole('user') && $order->user_id !== auth()->id()) {
            abort(403, 'Akses ditolak');
        }

        $request->validate([
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $path = $request->file('payment_proof')->store('payment_proofs', 'public');

        // Simpan ke tabel payments
        $payment = $order->payment;
        if ($payment) {
            // Update jika sudah ada
            $payment->update(['payment_proof' => $path]);
        } else {
            // Buat baru jika belum ada
            Payment::create([
                'order_id' => $order->id,
                'payment_proof' => $path
            ]);
        }

        // Update status order
        $order->update(['status' => 'paid']);

        return redirect()->route('orders.show', $order->id)
            ->with('success', 'Bukti pembayaran berhasil diunggah.');
    }


    /**
     * Update order
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        // Only allow update if status is pending
        if ($order->status !== 'pending') {
            return redirect()->route('orders.show', $order->id)
                ->with('error', 'Order tidak dapat diupdate karena sudah diproses.');
        }

        $request->validate([
            'nama_alm' => 'required|string|max:255',
            'bin_binti' => 'required|string|max:255',
            'kondisi' => 'required|in:almarhum,tua renta,sakit',
            'package_id' => 'required|exists:packages,id',
            'alamat_pendaftar' => 'required|string',
            'no_hp' => 'required|string|max:20',
            'keterangan' => 'nullable|string'
        ]);

        $order->update([
            'package_id' => $request->package_id,
            'nama_alm' => $request->nama_alm,
            'bin_binti' => $request->bin_binti,
            'kondisi' => $request->kondisi,
            'alamat_pendaftar' => $request->alamat_pendaftar,
            'no_hp' => $request->no_hp,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('orders.show', $order->id)->with('success', 'Order berhasil diupdate.');
    }

    /**
     * Hapus order
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        // Only allow delete if status is pending
        if ($order->status !== 'pending') {
            return redirect()->route('orders.index')
                ->with('error', 'Order tidak dapat dihapus karena sudah diproses.');
        }

        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order berhasil dihapus');
    }
}
