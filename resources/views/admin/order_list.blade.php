<!doctype html>
<html lang="bn">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>অর্ডার লিস্ট</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

  <div class="flex h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-900 text-white flex flex-col">
        <div class="p-6 text-2xl font-bold border-b border-gray-700">
            Admin Panel
        </div>

        <nav class="flex-1 p-4 space-y-2">
            <a href="{{ route('dashboard') }}" class="block p-2 rounded hover:bg-gray-700 transition">Dashboard</a>
            {{-- <a href="#" class="block p-2 rounded hover:bg-gray-700 transition">Users</a> --}}
            <a href="{{ route('order_list') }}" class="block p-2 rounded hover:bg-gray-700 transition">Orders</a>
            {{-- <a href="#" class="block p-2 rounded hover:bg-gray-700 transition">Products</a>
            <a href="#" class="block p-2 rounded hover:bg-gray-700 transition">Settings</a> --}}
        </nav>

        <div class="p-4 border-t border-gray-700">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full bg-red-500 p-2 rounded hover:bg-red-600 transition">
                    Logout
                </button>
            </form>
        </div>
    </aside>


    <!-- Main Content -->
    <div class="flex-1 flex flex-col">

        <!-- Navbar -->
        <header class="bg-white shadow p-4 flex justify-between items-center">
            <h1 class="text-xl font-semibold">Dashboard</h1>
            <div>
                Welcome, <span class="font-semibold">{{ Auth::user()->name }}</span>
            </div>
        </header>

  <div class="max-w-6xl mx-auto py-10">
    <h1 class="text-3xl font-bold mb-6">অর্ডার লিস্ট</h1>

    @if(session('success'))
<div class="bg-green-500 text-white p-2 rounded mb-2">
    {{ session('success') }}
</div>
@endif

<div class="bg-white p-6 rounded-lg shadow overflow-x-auto">

<table class="min-w-full border-collapse text-sm">
<thead>
<tr class="bg-gray-100">
    <th class="border p-2">Order ID</th>
    <th class="border p-2">Customer</th>
    <th class="border p-2">Phone</th>
    <th class="border p-2">Amount</th>
    <th class="border p-2">Status</th>
    <th class="border p-2">Image</th>
    <th class="border p-2">Bkash ID</th>
    <th class="border p-2">Action</th>
</tr>
</thead>

<tbody>
@forelse($orders as $order)
<tr class="hover:bg-gray-50">

        <td class="border p-2">{{ $order->id }}</td>

        <td class="border p-2">
            <div class="font-semibold">{{ $order->name }}</div>
            <div class="text-gray-500 text-xs">{{ $order->email }}</div>
        </td>

        <td class="border p-2">{{ $order->phone }}</td>

        <td class="border p-2 font-semibold">
            {{ $order->amount }} {{ $order->currency }}
        </td>

        <td class="border p-2">

        @if($order->status == 'Pending')
        <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs">
        Pending
        </span>
        @else
        <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">
        Paid
        </span>
        @endif

        </td>

        <td class="border p-2">
        @if ($order->transaction_file)
        <a href="{{ asset('storage/' . $order->transaction_file) }}" target="_blank">
        <img src="{{ asset('storage/' . $order->transaction_file) }}"
        class="w-14 h-14 object-cover rounded hover:scale-110 transition">
        </a>
        @else
        <span class="text-gray-400 text-xs">No Image</span>
        @endif
        </td>

        <td class="border p-2 text-xs">
        {{ $order->transaction_bkash_id }}
        </td>

        <td class="border p-2 flex gap-2">

        <!-- Payment Complete Button -->
      @if($order->status == 'Complete')

        <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">
        Complete
        </span>

        @else

        <button type="button"
            onclick="openModal({{ $order->id }})"
            class="bg-yellow-500 text-white px-2 py-1 rounded text-xs hover:bg-yellow-600">
            Incomplete
        </button>

      @endif

        <!-- Invoice Icon -->
            <a href="{{ route('invoice.show', $order->id) }}"
            class="text-blue-500 hover:text-blue-700 text-lg">
            <i class="bi bi-receipt"></i>
            </a>

        </td>

</tr>
@empty

<tr>
<td colspan="8" class="text-center p-6 text-gray-500">
No orders found
</td>
</tr>

@endforelse
</tbody>
</table>

</div>

<div id="confirmModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
    
    <div class="bg-white p-6 rounded shadow-md w-80 text-center">

        <h2 class="text-lg font-semibold mb-4">
        Are you sure you want to complete this order?
        </h2>

        <form id="completeForm" method="POST">
        @csrf

        <div class="flex justify-center gap-3">

        <button type="submit"
        class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
        Yes, Complete
        </button>

        <button type="button"
        onclick="closeModal()"
        class="bg-gray-400 text-white px-3 py-1 rounded hover:bg-gray-500">
        Cancel
        </button>

        </div>

        </form>

    </div>
</div>
<script>
function openModal(orderId) {

    let form = document.getElementById('completeForm');

    form.action = "/payment/complete/" + orderId;

    document.getElementById('confirmModal').classList.remove('hidden');
    document.getElementById('confirmModal').classList.add('flex');
}

function closeModal() {
    document.getElementById('confirmModal').classList.add('hidden');
}
</script>





<div class="mt-4">
    {{ $orders->links() }}
</div>

  </div>

    </div>

</div>
</body>
</html>