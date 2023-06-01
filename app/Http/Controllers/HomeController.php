<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use App\Models\Produit;
class HomeController extends Controller
{
    public function dashbord(){
        $categories = Categorie::all();
        return view('dashboard',['categories' => $categories]);
    }
    public function index(){
        $produits = Produit::inRandomOrder()->take(8)->get();
        $categories = Categorie::all();
        $produits = Produit::all();
        return view('index',['categories' => $categories,"produits"=>$produits]);
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


    public function shop(){
        return view('shop');
    }
    
}
