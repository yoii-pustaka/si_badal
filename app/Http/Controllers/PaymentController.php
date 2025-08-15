<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Form upload bukti pembayaran
     */
    public function create($orderId)
    {
        $order = Order::where('user_id', auth()->id())
            ->whereIn('status', ['pending', 'rejected'])
            ->findOrFail($orderId);
    
        return view('payments.create', compact('order'));
    }

    /**
     * Simpan bukti pembayaran
     */

     public function store(Request $request, $orderId)
     {
         $request->validate([
             'bukti_pembayaran' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048'
         ]);
     
         $order = Order::where('user_id', auth()->id())->findOrFail($orderId);
     
         $path = $request->file('bukti_pembayaran')->store('payments', 'public');
     
         Payment::create([
             'order_id' => $order->id,
             'file_path' => $path,
             'status' => 'waiting_verification'
         ]);
     
         $order->update(['status' => 'paid']);
     
         return redirect()->route('orders.index')->with('success', 'Bukti pembayaran berhasil dikirim');
     }

}
