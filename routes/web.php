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
use App\Http\Controllers\ProduitCommandeController;


route::controller(ProduitCommandeController::class)->group(function(){
    Route::get('/commade/{idCom}','getCommandeDetails');    
    Route::post('/modifier-etat-commande','modifierEtatCommande')->name('modifierEtatCommande');
});


route::controller(PanierController::class)->group(function(){
    // Ajouter un produit dans le panier
    Route::post('/panier/ajouter', 'ajouterProduitDansPanier')->name('panier.ajouter');

    // Supprimer un produit du panier (pour utilisateur connecté)
    Route::post('/panier/supprimer-produit', 'supprimerProduitDuPanier')->name('panier.supprimerProduit');

    // Mettre à jour la quantité d'un produit dans le panier
    Route::post('/panier/mettre-a-jour','mettreAJourQuantiteProduit')->name('panier.mettreAJour');

    // Calculer le prix TTC d'un produit
    Route::get('/produit/calculer-prix/{idProduit}/{quantite}', 'calculerPrixTTCProduit')->name('produit.calculerPrixTTC');

    // Calculer le prix total du panier
    Route::get('/panier/calculer-prix-total', 'calculerPrixTotalPanier')->name('panier.calculerPrixTotal');
    // afficher panier 
    Route::get('/panier', 'afficherPanier')->name('panier');

});
Route::controller(CommandeController::class)->group(function(){
    Route::get('/checkout',  'index')->name('checkout.index');
    Route::post('/place-order', 'placeOrder')->name('placeOrder');
});

Route::controller(HomeController::class)->group(function(){
    Route::get('/','index')->name('index');
    Route::get('/detail/{pro}',  'detail')->name('detail');
    Route::get('/dashboard', 'dashbord')->middleware(['auth', 'verified'])->name('dashboard');
});

Route::controller(ProductController::class)->group(function(){
    
    Route::get('/recherche','recherchePro')->name('recherchePro');
    Route::get('/shop','shop')->name('shop');
    //methode crud produit
    Route::post('/produit',  'store')->name('ajouterpro');
    Route::get('/produit/update/{product}','update')->name('updatePro');
    Route::get('/produit/delete/{product}',  'destroy')->name('deletePro');
    Route::get('/shop/{categorie}', 'afficherProduitsParCategorie')->name('produits.categorie');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::controller(AdminController::class)->group(function(){
    Route::get('/admin', 'admin_index')->name('admin');

    Route::get('/admin-panel', "bladeAdmine"
    )->middleware(['auth', 'verified'])->name('admine');
    //view crud produit
    Route::get('/produits','affichagePro')->name('blade.affichagePro');
    Route::get('/produit/add','ajouteProd')->name('blade.ajouteProd');
    Route::get('/produit/edit/{idPro}','edit')->name('blade.edit');
    //filré produit par categorie
    Route::get('/produit/categorie/{idCat}','filtreProParCat')->name('filtreProParCat');
    //ajoute administratour
    Route::get('/admin/create', 'create')->name('blade.createPro');
    Route::post('/admin',  'store')->name('admin.store');
    //user
    Route::get('/users','affichageUser')->name('blade.affichageUser');
    Route::get('/user/delete/{user}',  'deleteUser')->name('deleteUser');
    Route::post('/user/block/{id}',  'blockUser')->name('blockUser');
    Route::post('/user/unlock/{id}',  'unlockUser')->name('unlockUser');
    //detail produit in page admin
    Route::get('/detaiAdmin/{idPro}','detaiAdmin')->name('detaiAdmin');
    //edit quantity
    Route::get('/editQte/{produit}','editQte')->name('editQte');

});



Route::controller(CategorieController::class)->group(function(){
    //view crud categorie
    Route::get('/categorie/add','ajouteCat')->name('blade.ajouteCat');
    //methode crude categorie
    Route::post('/categorie/ajoute','addCat')->name('addCat');
    Route::post('/categorie/delete/{Categorie}','deleteCat')->name('deleteCat');    
});

Route::get('/contact',[ContactController::class,'contact'])->name('contact');
//contact
Route::post('/Contact/sendMessage', [ContactController::class, 'sendContact'])->name('sendContact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__.'/auth.php';





