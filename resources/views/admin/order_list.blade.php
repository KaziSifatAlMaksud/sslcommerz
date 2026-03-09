<!doctype html>
<html lang="bn">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>অর্ডার লিস্ট</title>
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
            <a href="#" class="block p-2 rounded hover:bg-gray-700 transition">Users</a>
            <a href="{{ route('order_list') }}" class="block p-2 rounded hover:bg-gray-700 transition">Orders</a>
            <a href="#" class="block p-2 rounded hover:bg-gray-700 transition">Products</a>
            <a href="#" class="block p-2 rounded hover:bg-gray-700 transition">Settings</a>
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

    <div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-semibold mb-4">Recent Orders</h2>

    <table class="w-full table-auto border-collapse">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2 text-left">Order ID</th>
                <th class="border p-2 text-left">Customer Name</th>
                <th class="border p-2 text-left">Phone</th>
                <th class="border p-2 text-left">Product</th>
            </tr>
        </thead>

        <tbody>
            @forelse($orders as $order)
            <tr class="hover:bg-gray-50">
                <td class="border p-2">{{ $order->id }}</td>
                <td class="border p-2">{{ $order->name }}</td>
                <td class="border p-2">{{ $order->phone }}</td>
                <td class="border p-2">{{ $order->product }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="border p-4 text-center text-gray-500">
                    No orders found
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">
    {{ $orders->links() }}
</div>

  </div>

    </div>

</div>
</body>
</html>