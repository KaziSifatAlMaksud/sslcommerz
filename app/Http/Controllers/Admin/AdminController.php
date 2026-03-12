<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard() {

        // Total orders
        $totalOrders = Order::count();

        // Total revenue
        $totalRevenue = Order::sum('amount');

        // Weekly revenue (last 7 days)
        $weekRevenue = Order::where('created_at', '>=', \Carbon\Carbon::now()->subDays(7))
                            ->sum('amount');

        // Monthly revenue (current month)
        $monthRevenue = Order::whereMonth('created_at', \Carbon\Carbon::now()->month)
                            ->whereYear('created_at', \Carbon\Carbon::now()->year)
                            ->sum('amount');

        // Optional: average order value
        $avgOrder = $totalOrders ? ($totalRevenue / $totalOrders) : 0;

        return view('dashboard', compact(
            'totalOrders',
            'totalRevenue',
            'weekRevenue',
            'monthRevenue',
            'avgOrder'
        ));
    }
}
