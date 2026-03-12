<?php

use App\Models\Order;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';

// Route::middleware(['auth','admin'])->prefix('admin')->group(function () {

//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     });

// });

Route::get('/', function () {
    return view('pages.index');
})->name('home');

Route::get('/details', function () {
    return view('pages.details');
})->name('details');

Route::get('/checkout', function () {
    return view('pages.checkout');
})->name('checkout');
    

Route::post('/checkout_page', [CheckoutController::class, 'store'])->name('checkout.store');

// Route ::get('/success_page', function () {
//     return view('pages.success');
// })->name('success_page');

Route::get('/success/{order}', [CheckoutController::class, 'success'])->name('success_page');



Route::get('/dashboard', [AdminController::class, 'dashboard'])
     ->middleware(['auth'])
     ->name('dashboard');

Route::get('/invoice/{order}', function (Order $order) {
    return view('InvoiceShow', compact('order')); 
})->middleware(['auth'])->name('invoice.show');


Route::post('/payment/complete/{order}', function (Order $order) {

    $order->status = 'Complete';
    $order->save();

    return redirect()->back()->with('success', 'Order completed successfully!');

})->middleware(['auth'])->name('payment.complete');


Route::get('/invoice/{order}', function (Order $order) {
    return view('admin.invoice_show', compact('order'));
})->name('invoice.show');

Route::get('/order_list', function () {

    $orders = Order::latest()->paginate(7);

    return view('admin.order_list', compact('orders'));

})->middleware(['auth'])->name('order_list');