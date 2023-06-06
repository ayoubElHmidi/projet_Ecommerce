<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CategorieController;


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

Route::get('/checkout', [CommandeController::class, 'index'])->name('checkout.index');
Route::post('/place-order', [CommandeController::class,'placeOrder'])->name('placeOrder');


Route::get('/',[ProductController::class,'afficherProduitsAleatoires'])->name('index');
Route::get('/recherche',[ProductController::class,'recherchePro'])->name('recherchePro');
Route::get('/',[HomeController::class,'index'])->name('index');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::get('/detail/{pro}', [homeController::class, 'detail'])->name('detail');
Route::get('/shop',[ProductController::class,'shop'])->name('shop');
Route::get('/dashboard', [HomeController::class,'dashbord'])->middleware(['auth', 'verified'])->name('dashboard');

// Route pour afficher la vue du formulaire de filtrage
// Route pour le filtrage par prix
Route::get('/products/filter',[ProductController::class,'filterByPrice'])->name('products.filter.price');

// Route pour le filtrage par couleur
Route::get('/products/filter', [ProductController::class,'filterByColor'])->name('products.filter.color');

// Route pour le filtrage par taille
Route::get('/products/filter', [ProductController::class,'filterBySize'])->name('products.filter.size');




Route::get('/dashboard', function () {

    return view('dashboard');
 
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin', [AdminController::class,'admin_index'])
    //->middleware(['auth', 'verified'])
    ->name('admin');
    
Route::get('/admin-panel', [AdminController::class,"bladeAdmine"]
)->middleware(['auth', 'verified'])->name('admine');

//view crud produit
Route::get('/produits',[AdminController::class,'affichagePro'])->name('blade.affichagePro');
Route::get('/produit/add',[AdminController::class,'ajouteProd'])->name('blade.ajouteProd');
Route::get('/produit/edit/{idPro}',[AdminController::class,'edit'])->name('blade.edit');
//filré produit par categorie
Route::get('/produit/categorie/{idCat}',[AdminController::class,'filtreProParCat'])->name('filtreProParCat');
//methode crud produit
Route::post('/produit', [ProductController::class, 'store'])->name('ajouterpro');
Route::get('/produit/update/{product}',[ProductController::class,'update'])->name('updatePro');
Route::get('/produit/delete/{product}', [ProductController::class, 'destroy'])->name('deletePro');
//ajoute administratour
Route::get('/admin/create', [AdminController::class,'create'])->name('blade.createPro');
Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');
//user
Route::get('/users',[AdminController::class,'affichageUser'])->name('blade.affichageUser');
Route::get('/user/delete/{user}', [AdminController::class, 'deleteUser'])->name('deleteUser');
Route::post('/user/block/{id}', [AdminController::class, 'blockUser'])->name('blockUser');
Route::post('/user/unlock/{id}', [AdminController::class, 'unlockUser'])->name('unlockUser');
//detail produit in page admin
Route::get('/detaiAdmin/{idPro}',[AdminController::class,'detaiAdmin'])->name('detaiAdmin');
//edit quantity
Route::get('/editQte/{produit}',[AdminController::class,'editQte'])->name('editQte');
//contact
Route::post('/Contact/sendMessage', [ContactController::class, 'sendContact'])->name('sendContact');
//view crud categorie
Route::get('/categorie/add',[CategorieController::class,'ajouteCat'])->name('blade.ajouteCat');
//methode crude categorie
Route::post('/categorie/ajoute',[CategorieController::class,'addCat'])->name('addCat');
Route::post('/categorie/delete/{Categorie}',[CategorieController::class,'deleteCat'])->name('deleteCat');

require __DIR__.'/auth.php';
//------                               ayoub                      ------
Route::get('/shop/{categorie}', [ProductController::class,'afficherProduitsParCategorie'])->name('produits.categorie');




