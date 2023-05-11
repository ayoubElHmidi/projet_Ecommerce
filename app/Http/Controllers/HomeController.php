<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use App\Models\Personne;
use App\Models\Categorie;
use App\Models\Produit;
use App\Models\Panie;
class HomeController extends Controller
{
    public function index(){
        $categories = Categorie::all();
        return view('index',['categories' => $categories]);
    }
    public function cart(){
        $categories = Categorie::all();
        return view('cart',['categories' => $categories]);
    }
    public function checkout(){
        
        return view('checkout');
    }
    public function contact(){
        $categories = Categorie::all();
        return view('contact',["categories"=>$categories]);

    }

public function detail($pro)
{
    $produits = Produit::findOrFail($pro);
    $categories = Categorie::all();
    if ($produits) {
        return view('detail', ["categories"=>$categories,"produits"=>$produits]); 
    } 
}



public function ajouterProduitAuPanier($pro)
{
    $produit = Produit::find($pro);
    if(!$produit) {
        abort(404); // Produit non trouvé
    }
    
    $cookie_name = 'panier'; // Nom de la cookie
    $cookie_lifetime = 60*24*30; // Durée de vie de la cookie en minutes (ici 30 jours)
    
    // Récupération des données de la cookie
    $panier = json_decode(request()->cookie($cookie_name), true);
    $panier[$produit->idPro] = [
        'idPro' => $produit->idPro,
        'photo'=>$produit->photo,
        'nomPro'=>$produit->nomPro,
        'qteV' => 1,
        'prixpro' => $produit->prixPro
    ];
    
    // Création de la nouvelle cookie
    $cookie = cookie($cookie_name, json_encode($panier), $cookie_lifetime);
    
    // Redirection vers la page du panier
    return redirect()->route('cart')->cookie($cookie);
}
public function supprimerProduitDuPanier($idPro)
{
  $cookie_name = 'panier';
  $panier = json_decode(request()->cookie($cookie_name), true) ?? [];

  if (isset($panier[$idPro])) {
    unset($panier[$idPro]);
  }

  $cookie_lifetime = 60 * 24 * 30;
  $cookie = cookie($cookie_name, json_encode($panier), $cookie_lifetime);

  return redirect()->route('cart')->cookie($cookie);
}

    public function shop(){
        return view('shop');
    }
    
}
