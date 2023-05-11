<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use App\Models\Personne;
use App\Models\Categorie;
use App\Models\Produit;

class HomeController extends Controller
{
    public function index(){

    }
    public function cart(){
        $categories = Categorie::all();
        return view('cart', ["categories"=>$categories]);
    }
    public function contact(){
        return view('contact');
    }


public function detail($pro)
{
    $produits = Produit::findOrFail($pro);
    $categories = Categorie::all();
    if ($produits) {
        return view('detail', ["categories"=>$categories,"produits"=>$produits]); 
    } 
}

    public function shop(){
        return view('shop');
    }
    
}
