<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PizzaPlazaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [PizzaPlazaController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/main', [PizzaPlazaController::class, 'index'])->name('main');
    Route::get('/contact', [PizzaPlazaController::class, 'contact'])->name('contact');
    Route::get('/about', [PizzaPlazaController::class, 'about'])->name('about');
    Route::get('/imprint', [PizzaPlazaController::class, 'imprint'])->name('imprint');

    Route::get('/order', [OrderController::class, 'order'])->name('order');

    Route::group(['prefix' => 'cart'], function () {
        Route::get('/', [CartController::class, 'showCart'])->name('cart.show');
        Route::post('/add', [CartController::class, 'addToCart'])->name('cart.add');

        Route::post('/clear', function () {
            session()->forget('cart');
            return redirect()->back()->with('success', 'Cart cleared successfully!');
        })->name('clear');
    
    
    });

    Route::group(['prefix' => 'checkout'], function () {
        Route::get('/', [CheckoutController::class, 'showCheckout'])->name('checkout');
        Route::post('/process', [CheckoutController::class, 'processCheckout'])->name('checkout.process');
        Route::get('/success/{orderId}', [CheckoutController::class, 'success'])->name('pizzaplaza.checkout.success');
    });

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});


require __DIR__.'/auth.php';
