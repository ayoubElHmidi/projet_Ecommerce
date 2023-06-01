<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;

use App\Models\Categorie;
use App\Models\Produit;
use App\Models\Panie;
use App\Models\User;
class HomeController extends Controller
{
    public function index(){
        $id=Auth::id();
        $user=User::find($id);
        $produits = Produit::inRandomOrder()->take(8)->get();
        $categories = Categorie::all();
        $produits = Produit::all();
        return view('index',['categories' => $categories,"produits"=>$produits,'user'=>$user]);
    }
    public function cart(){
        $id=Auth::id();
        $user=User::find($id);
        $categories = Categorie::all();
        return view('cart',['categories' => $categories,'user'=>$user]);
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
    $id=Auth::id();
    $user=User::find($id);
    $produits = Produit::findOrFail($pro);
    $categories = Categorie::all();
    if ($produits) {
        return view('detail', ["categories"=>$categories,"produits"=>$produits,'user'=>$user]); 
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
