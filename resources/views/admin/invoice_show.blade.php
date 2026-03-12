<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Invoice</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-10">

<div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-8">

<!-- Header -->
<div class="flex justify-between mb-8">
    <div>
        <h1 class="text-2xl font-bold">INVOICE</h1>
        <p class="text-sm text-gray-500">Order #{{ $order->id }}</p>
    </div>

    <div class="text-right">
        <p class="font-semibold">Your Company</p>
        <p class="text-sm text-gray-500">Dhaka, Bangladesh</p>
    </div>
</div>

<!-- Customer Info -->
<div class="mb-6">
    <h2 class="font-semibold mb-2">Bill To:</h2>
    <p>{{ $order->name }}</p>
    <p>{{ $order->email }}</p>
    <p>{{ $order->phone }}</p>
</div>

<!-- Invoice Table -->
<table class="w-full border-collapse border">

<thead class="bg-gray-100">
<tr>
<th class="border p-2 text-left">Description</th>
<th class="border p-2">Amount</th>
</tr>
</thead>

<tbody>
<tr>
<td class="border p-2">({{ $order->product_id }}) - {{ $order->product_name }}</td>
<td class="border p-2 text-center">
{{ $order->amount }} {{ $order->currency }}
</td>
</tr>
</tbody>

</table>

<!-- Payment Info -->
<div class="mt-6">

<p><strong>Status:</strong>
<span class="text-green-600">{{ $order->status }}</span>
</p>

<p><strong>Bkash Transaction ID:</strong>
{{ $order->transaction_bkash_id }}
</p>

</div>

<!-- Footer -->
<div class="mt-10 text-center text-gray-500 text-sm">
Thank you for your business!
</div>

<!-- Print Button -->
<div class="text-center mt-6">
<button onclick="window.print()" class="bg-blue-500 text-white px-4 py-2 rounded">
Print Invoice
</button>
</div>

</div>

</body>
</html>