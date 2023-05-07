<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personne;
use App\Models\Categorie;
use App\Models\Produit;

class HomeController extends Controller
{
    public function index(){
        $categories = Categorie::all();
        return view('index',['categories' => $categories]);
    }
    public function cart(){
        return view('cart');
    }
    public function checkout(){
        return view('checkout');
    }
    public function contact(){
        return view('contact');
    }
    public function detail($pro)
{
    $produits = Produit::find($pro);
    $categories = Categorie::all();
    return view('detail', compact('categories', 'produits'));
}
    public function shop(){
        return view('shop');
    }
    
}
