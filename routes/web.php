<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PanierController;


// Ajouter un produit dans le panier
Route::post('/panier/ajouter', [PanierController::class,'ajouterProduitDansPanier'])->name('panier.ajouter');

// Supprimer un produit du panier (pour utilisateur connecté)
Route::post('/panier/supprimer-produit', [PanierController::class, 'supprimerProduitDuPanier'])->name('panier.supprimerProduit');

// Mettre à jour la quantité d'un produit dans le panier
Route::post('/panier/mettre-a-jour', [PanierController::class,'mettreAJourQuantiteProduit'])->name('panier.mettreAJour');

// Calculer le prix TTC d'un produit
Route::get('/produit/calculer-prix/{idProduit}/{quantite}', [PanierController::class,'calculerPrixTTCProduit'])->name('produit.calculerPrixTTC');

// Calculer le prix total du panier
Route::get('/panier/calculer-prix-total', [PanierController::class,'calculerPrixTotalPanier'])->name('panier.calculerPrixTotal');
// afficher panier 
Route::get('/panier', [PanierController::class,'afficherPanier'])->name('panier');







Route::get('/',[ProductController::class,'afficherProduitsAleatoires'])->name('index');
Route::get('/recherche',[ProductController::class,'recherchePro'])->name('recherchePro');
Route::get('/',[HomeController::class,'index'])->name('index');
Route::get('/checkout',[HomeController::class,'checkout'])->name('checkout');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::get('/detail/{pro}', [homeController::class, 'detail'])->name('detail');
Route::get('/shop',[ProductController::class,'shop'])->name('shop');
Route::get('/dashboard', [HomeController::class,'dashbord'])->middleware(['auth', 'verified'])->name('dashboard');
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




