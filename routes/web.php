<?php

use App\Models\Order;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
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

Route::get('/dashboard', function () {
    return view('dashboard'); 


})->middleware(['auth'])->name('dashboard');

Route::get('/order_list', function () {

    $orders = Order::latest()->paginate(10);

    return view('admin.order_list', compact('orders'));

})->middleware(['auth'])->name('order_list');