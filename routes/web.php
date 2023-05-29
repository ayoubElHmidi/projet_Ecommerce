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
Route::get('/',[HomeController::class,'index'])->name('index');
Route::get('/cart',[HomeController::class,'cart'])->name('cart');
Route::get('/checkout',[HomeController::class,'checkout'])->name('checkout');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::get('/detail/{pro}', [homeController::class, 'detail'])->name('detail');
//route ajouter au panier

Route::get('/addPanier/{pro}', [homeController::class, 'ajouterProduitAuPanier'])->name('cookie');
//route supprimer au panier
Route::post('/panier/{idPro}/supprimer', [HomeController::class, 'supprimerProduitDuPanier'])->name('panier.supprimer');
Route::get('/addPanier/{pro}', [homeController::class, 'ajouterProduitAuPanier'])->name('cookie');
//route supprimer au panier
Route::post('/panier/{idPro}/supprimer', [HomeController::class, 'supprimerProduitDuPanier'])->name('panier.supprimer');

Route::get('/shop',[ProductController::class,'shop'])->name('shop');



Route::get('/dashboard', function () {

    return view('dashboard');
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
        return view("fireshop.admin.index");
    }
)
//->middleware(['auth', 'verified'])
->name('admine');
//crud produit
Route::get('/ajouter-Produit',[AdminController::class,'ajouteProd'])->name('ajouteProd');
Route::post('/produit', [ProductController::class, 'store'])->name('products.store');
Route::get('/produits',[AdminController::class,'affichagePro'])->name('affichagePro');
Route::get('/produit/edit/{idPro}',[AdminController::class,'edit'])->name('edit.store');
Route::get('/produit/update/{product}',[ProductController::class,'update'])->name('updateProduct');
Route::get('/produit/delete/{product}', [ProductController::class, 'destroy'])->name('destroy');


//ajoute administratour
Route::get('/admin/create', [AdminController::class,'create'])->name('admin.create');
Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');



require __DIR__.'/auth.php';

//------                               ayoub                      ------
Route::get('/shop/{categorie}', [ProductController::class,'afficherProduitsParCategorie'])->name('produits.categorie');




