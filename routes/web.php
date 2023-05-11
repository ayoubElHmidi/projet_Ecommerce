<?php
use App\Models\Categorie;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProductController;

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
Route::get('/',[ProductController::class,'afficherProduitsAleatoires'])->name('index');

Route::get('/recherche',[ProductController::class,'recherchePro'])->name('recherchePro');




Route::get('/cart',[HomeController::class,'cart'])->name('cart');
Route::get('/checkout',[HomeController::class,'checkout'])->name('checkout');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::get('/detail/{pro}', [homeController::class, 'detail'])->name('detail');


Route::get('/shop',[ProductController::class,'shop'])->name('shop');



Route::get('/dashboard', function () {
    $categories = Categorie::all();
    return view('dashboard', ["categories"=>$categories]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin', [AdminController::class,'admin_index'])
    //->middleware(['auth', 'verified'])
    ->name('admin');
    
Route::get('/admin-panel', 
    function(){
        return view("fireshop.admin");
    }
)
//->middleware(['auth', 'verified'])
->name('admine');

Route::get('/admin/create', [AdminController::class,'create'])->name('admin.create');
Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');

Route::resource("products", ProductController::class);

require __DIR__.'/auth.php';

//------                               ayoub                      ------
Route::get('/shop/{categorie}', [ProductController::class,'afficherProduitsParCategorie'])->name('produits.categorie');


