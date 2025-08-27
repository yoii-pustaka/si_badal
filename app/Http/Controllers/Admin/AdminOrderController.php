<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BadalOrder;
use App\Models\Order;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
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
        $order = Order::with('payment')->findOrFail($id);

        if ($order->status !== 'paid') {
            return back()->with('error', 'Order ini belum dibayar atau sudah diverifikasi.');
        }

        $order->update([
            'status' => 'in_progress'
        ]);
        $order->payment->update([
            'status' => 'verified',
            'confirmed_by' => auth()->id()
        ]);
        return back()->with('success', 'Pembayaran berhasil diverifikasi. Order masuk tahap pelaksanaan.');
    }


    public function assignForm($id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => 'in_progress']);
        $pelaksanaList = User::role('pelaksana')->get();
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

        $order = Order::with('payment')->findOrFail($id);
        $order->update(['status' => $request->status]);
        $order->payment->update(['status' => 'verified']);

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

    public function report(Request $request)
    {
        $query = Order::with('package', 'user');

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->tanggal_mulai && $request->tanggal_selesai) {
            $query->whereBetween('tanggal_pelaksanaan', [$request->tanggal_mulai, $request->tanggal_selesai]);
        }

        $orders = $query->get();

        return view('admin.orders.report', compact('orders'));
    }

    public function exportCsv()
    {
        $orders = Order::with('package')->get(['id', 'order_code', 'status', 'tanggal_pelaksanaan', 'package_id']);

        $csv = implode(",", ['ID', 'Kode Order', 'Status', 'Tanggal Pelaksanaan', 'Paket']) . "\n";

        foreach ($orders as $order) {
            $csv .= "{$order->id},{$order->order_code},{$order->status}," .
                ($order->tanggal_pelaksanaan ?? '-') . "," .
                ($order->package->name ?? '-') . "\n";
        }

        return response($csv)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename=orders.csv');
    }

    // Export PDF
    public function exportPdf()
    {
        $orders = Order::with('package')->get();
        $pdf = Pdf::loadView('exports.orders', compact('orders'));
        return $pdf->download('orders.pdf');
    }
}
