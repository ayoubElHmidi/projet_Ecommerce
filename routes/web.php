<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
<<<<<<< HEAD
use App\Http\Controllers\AdminController;
=======
use App\Http\Controllers\ProduitController;

>>>>>>> b354e83d3faae4a86225dfa936ca9f662e951a6a
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



Route::get('/',[HomeController::class,'index'])->name('index');
Route::get('/cart',[HomeController::class,'cart'])->name('cart');
Route::get('/checkout',[HomeController::class,'checkout'])->name('checkout');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::get('/detail',[HomeController::class,'detail'])->name('detail');
Route::get('/shop',[ProduitController::class,'shop'])->name('shop');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin', [AdminController::class, 'admin_index'])
    //->middleware(['auth', 'verified'])
    ->name('admin');
Route::get('/admin/create', [AdminController::class,'create'])->name('admin.create');
Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');



require __DIR__.'/auth.php';
