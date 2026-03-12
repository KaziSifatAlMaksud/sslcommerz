<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CSS CDN -->
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
            {{-- <a href="" class="block p-2 rounded hover:bg-gray-700 transition">Users</a> --}}
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

        <!-- Dashboard Content -->
    <main class="p-6 flex-1 overflow-y-auto">

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">

        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
            <h3 class="text-gray-500 text-sm">Total Orders</h3>
            <p class="text-3xl font-bold mt-2">{{ $totalOrders }}</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
            <h3 class="text-gray-500 text-sm">Total Revenue</h3>
            <p class="text-3xl font-bold mt-2">৳{{ number_format($totalRevenue, 2) }}</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
            <h3 class="text-gray-500 text-sm">Weekly Revenue</h3>
            <p class="text-3xl font-bold mt-2">৳{{ number_format($weekRevenue, 2) }}</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
            <h3 class="text-gray-500 text-sm">Monthly Revenue</h3>
            <p class="text-3xl font-bold mt-2">৳{{ number_format($monthRevenue, 2) }}</p>
        </div>

    </div>

    <!-- Additional Stats -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6 mb-6">

        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
            <h3 class="text-gray-500 text-sm">Average Order Value</h3>
            <p class="text-3xl font-bold mt-2">৳{{ number_format($avgOrder, 2) }}</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
            <h3 class="text-gray-500 text-sm">Orders This Month</h3>
            <p class="text-3xl font-bold mt-2">{{ \App\Models\Order::whereMonth('created_at', \Carbon\Carbon::now()->month)->count() }}</p>
        </div>

    </div>
</main>

    </div>

</div>

</body>
</html>