<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class CheckoutController extends Controller
{
  public function store(Request $request)
{
    try {

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'transaction_id' => 'nullable|string|max:255',
            'transaction_bkash_id' => 'nullable|string|max:255',
            'transaction_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'amount' => 'nullable|numeric|min:0',
        ]);

        $order = new Order();

        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->email = $request->email;

        $order->amount = $request->amount ?? 0;
        $order->transaction_id = $request->transaction_id ?? 'N/A';
        $order->transaction_bkash_id = $request->transaction_bkash_id ?? 'N/A';

        $order->status = 'pending';
        $order->currency = 'BDT';

        // file upload
        if ($request->hasFile('transaction_file')) {
            $file = $request->file('transaction_file');
            $path = $file->store('transactions', 'public');
            $order->transaction_file = $path;
        }

        $order->save();

        return redirect()
                ->route('success_page', $order->id)
                ->with('success', 'Order submitted successfully!');

    } catch (\Exception $e) {

        return redirect()
                ->back()
                ->withInput()
                ->with('error', 'অনুগ্রহ করে সবগুলো ফিল্ড সঠিকভাবে পূরণ করে আবার চেষ্টা করুন।');
    }
}

    public function success(Order $order)
    {
        $order = Order::findOrFail($order->id);
        return view('pages.success', compact('order'));
    }
}