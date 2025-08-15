<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BadalOrder;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'package', 'pelaksana'])->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with(['user', 'package', 'pelaksana', 'payment'])->findOrFail($id);

        return view('admin.orders.show', compact('order'));
    }



    public function verifyPayment($id)
    {
        $order = \App\Models\Order::findOrFail($id);

        if ($order->status !== 'paid') {
            return back()->with('error', 'Order ini belum dibayar atau sudah diverifikasi.');
        }

        $order->update([
            'status' => 'in_progress'
        ]);

        return back()->with('success', 'Pembayaran berhasil diverifikasi. Order masuk tahap pelaksanaan.');
    }


    public function assignForm($id)
    {
        $order = Order::findOrFail($id);
        $pelaksanaList = \App\Models\User::role('pelaksana')->get();
        return view('admin.orders.assign', compact('order', 'pelaksanaList'));
    }

    public function assignPelaksana(Request $request, $id)
    {
        $request->validate([
            'pelaksana_id' => 'required|exists:users,id',
            'execution_date' => 'required|date'
        ]);

        $order = Order::findOrFail($id);
        $order->update([
            'pelaksana_id' => $request->pelaksana_id,
            'tanggal_pelaksanaan' => $request->execution_date,
            'status' => 'assigned'
        ]);

        return back()->with('success', 'Pelaksana berhasil ditugaskan');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,paid,assigned,done,rejected'
        ]);

        $order = Order::findOrFail($id);
        $order->update(['status' => $request->status]);

        return back()->with('success', 'Status order diperbarui');
    }

    public function completeOrder($id)
    {
        $order = Order::findOrFail($id);

        if ($order->status !== 'in_progress') {
            return back()->with('error', 'Order tidak dalam tahap pelaksanaan.');
        }

        $order->update(['status' => 'completed']);

        return back()->with('success', 'Order berhasil diselesaikan.');
    }


    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Order berhasil dihapus');
    }
}
