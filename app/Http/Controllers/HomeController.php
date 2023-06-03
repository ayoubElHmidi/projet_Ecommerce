<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Categorie;
use App\Models\Produit;
use App\Models\User;
class HomeController extends Controller
{
    public function checkout(){
        $categories = Categorie::all();
        if (Auth::check()){
        return view('checkout',['categories'=>$categories]);}
        else{
            return redirect()->route('login');
        }
    }

    public function index(){
        $id=Auth::id();
        $user=User::find($id);
        $produits = Produit::inRandomOrder()->take(8)->get();
        $categories = Categorie::all();
        $produits = Produit::all();
        return view('index',['categories' => $categories,"produits"=>$produits,'user'=>$user]);
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
}
