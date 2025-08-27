<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    // Index + filter
    public function index(Request $request)
    {
        $orders = Order::with(['user', 'package', 'pelaksana'])
            ->when($request->status, function ($q) use ($request) {
                $q->where('status', $request->status);
            })
            ->when($request->tanggal_mulai, function ($q) use ($request) {
                $q->whereDate('tanggal_pelaksanaan', '>=', $request->tanggal_mulai);
            })
            ->when($request->tanggal_selesai, function ($q) use ($request) {
                $q->whereDate('tanggal_pelaksanaan', '<=', $request->tanggal_selesai);
            })
            ->when($request->pelaksana_id, function ($q) use ($request) {
                $q->where('pelaksana_id', $request->pelaksana_id);
            })
            ->latest()
            ->get();

        // ambil daftar pelaksana untuk filter dropdown
        $pelaksanas = \App\Models\User::role('pelaksana')->get();

        return view('admin.reports.index', compact('orders', 'pelaksanas'));
    }

    // Export PDF
    public function exportPdf(Request $request)
    {
        $orders = Order::with(['user', 'package'])
            ->when($request->status, fn($q) => $q->where('status', $request->status))
            ->when($request->tanggal_mulai, fn($q) => $q->whereDate('tanggal_pelaksanaan', '>=', $request->tanggal_mulai))
            ->when($request->tanggal_selesai, fn($q) => $q->whereDate('tanggal_pelaksanaan', '<=', $request->tanggal_selesai))
            ->latest()
            ->get();

        $pdf = Pdf::loadView('admin.reports.export-pdf', compact('orders'));
        return $pdf->download('laporan_orders.pdf');
    }

    // Export CSV
    public function exportCsv(Request $request)
    {
        $orders = Order::with(['user', 'package'])
            ->when($request->status, fn($q) => $q->where('status', $request->status))
            ->when($request->tanggal_mulai, fn($q) => $q->whereDate('tanggal_pelaksanaan', '>=', $request->tanggal_mulai))
            ->when($request->tanggal_selesai, fn($q) => $q->whereDate('tanggal_pelaksanaan', '<=', $request->tanggal_selesai))
            ->latest()
            ->get();

        $csv = implode(",", ['Kode Order', 'User', 'Paket', 'Pelaksana', 'Status', 'Tanggal Pelaksanaan']) . "\n";

        foreach ($orders as $order) {
            $csv .= "{$order->order_code},"
                . ($order->user->name ?? '-') . ","
                . ($order->package->name ?? '-') . ","
                . ($order->pelaksana->name ?? '-') . ","
                . ucfirst(str_replace('_', ' ', $order->status)) . ","
                . ($order->tanggal_pelaksanaan ?? '-') . "\n";
        }


        return response($csv)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename=laporan_orders.csv');
    }
}
