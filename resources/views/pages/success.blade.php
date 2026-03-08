<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>পেমেন্ট সফল</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #070b13; color: #e5e7eb; font-family: 'Inter', sans-serif; }
        .glass { background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1); backdrop-filter: blur(12px); }
        .muted { color: #cbd5e1; }
        .shadow-soft { box-shadow: 0 10px 30px rgba(0,0,0,.08); }
        .btn-indigo { background-color: #6366f1; color: white; }
        .btn-indigo:hover { background-color: #4f46e5; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center px-4">

    <div class="glass rounded-3xl p-10 max-w-lg text-center shadow-soft">
        <!-- ✅ Success Icon -->
        <div class="mb-6">
            <svg class="w-20 h-20 mx-auto text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
        </div>

        <!-- ✅ Success Message -->
        <h1 class="text-3xl md:text-4xl font-extrabold text-green-500 mb-4">পেমেন্ট সফল ✅</h1>
        <p class="text-gray-200 mb-6">
            ধন্যবাদ <strong>{{ $order->name ?? 'N/A' }}</strong>! আপনার <strong>{{ $order->amount ?? '0' }} {{ $order->currency ?? 'BDT' }}</strong> পেমেন্ট সফলভাবে সম্পন্ন হয়েছে।
        </p>

        <!-- ✅ Transaction Details -->
        <div class="bg-gray-900/20 p-4 rounded-xl mb-6 text-left">
            <p class="text-sm text-gray-400">Transaction ID:</p>
            <p class="font-semibold text-white">{{ $order->transaction_id ?? 'N/A' }}</p>

            <p class="mt-3 text-sm text-gray-400">Email:</p>
            <p class="font-semibold text-white">{{ $order->email ?? 'N/A' }}</p>

            <p class="mt-3 text-sm text-gray-400">Phone:</p>
            <p class="font-semibold text-white">{{ $order->phone ?? 'N/A' }}</p>

            <p class="mt-3 text-sm text-gray-400">Status:</p>
            <p class="font-semibold text-white">{{ $order->status ?? 'N/A' }}</p>
        </div>

        <!-- ✅ Buttons -->
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ url('/') }}" class="px-6 py-3 rounded-2xl btn-indigo shadow-soft font-semibold">হোমে ফিরে যান</a>
            {{-- <a href="{{ url('/') }}" class="px-6 py-3 rounded-2xl glass shadow-soft font-semibold text-white">বান্ডেল দেখুন</a> --}}
        </div>

        <p class="text-xs muted mt-6">আপনার পেমেন্টের রসিদ ইমেইলে পাঠানো হয়েছে।</p>
    </div>

</body>
</html>