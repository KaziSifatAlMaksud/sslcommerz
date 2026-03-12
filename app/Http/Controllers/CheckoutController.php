<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class CheckoutController extends Controller
{
public function store(Request $request)
{
    // Validate first
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'email' => 'required|email|max:255',
        'transaction_bkash_id' => 'nullable|string|max:255',
        'transaction_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'amount' => 'nullable|numeric|min:0',
        'product_id' => 'nullable|string|max:50',
        'product_name' => 'nullable|string|max:255',
    ]);

    try {
        $order = new Order();

        $order->name = $validated['name'];
        $order->phone = $validated['phone'];
        $order->email = $validated['email'];
        $order->amount = $validated['amount'] ?? 0;
        $order->status = 'Pending';
        $order->transaction_id = 'N/A';
        $order->currency = 'BDT';
        $order->product_id = $validated['product_id'] ?? null;
        $order->product_name = $validated['product_name'] ?? null;
        $order->transaction_bkash_id = $validated['transaction_bkash_id'] ?? null;

        // Upload transaction screenshot
        if ($request->hasFile('transaction_file')) {
            $path = $request->file('transaction_file')->store('transactions', 'public');
            $order->transaction_file = $path;
        }

        $order->save();

        return redirect()
            ->route('success_page', $order->id)
            ->with('success', 'Order submitted successfully!');
    } catch (\Exception $e) {
        // For debugging, you can temporarily dd the error
        dd($e->getMessage(), $e->getLine(), $e->getFile());

        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'অনুগ্রহ করে সবগুলো ফিল্ড সঠিকভাবে পূরণ করে আবার চেষ্টা করুন।');
    }
}

    public function success(Order $order)
    {
        return view('pages.success', compact('order'));
    }
}