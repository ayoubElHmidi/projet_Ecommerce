<?php

namespace App\Http\Controllers;
<<<<<<< HEAD
use App\Models\Categorie;
use App\Models\Produit;
=======
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;

use App\Models\Categorie;
use App\Models\Produit;
use App\Models\Panie;
use App\Models\User;
>>>>>>> baebe58916d12ff9e1b8596ef6e225555b1b6933
class HomeController extends Controller
{
    public function dashbord(){
        $categories = Categorie::all();
        return view('dashboard',['categories' => $categories]);
    }
    public function index(){
        $id=Auth::id();
        $user=User::find($id);
        $produits = Produit::inRandomOrder()->take(8)->get();
        $categories = Categorie::all();
        $produits = Produit::all();
        return view('index',['categories' => $categories,"produits"=>$produits,'user'=>$user]);
    }
<<<<<<< HEAD

=======
    public function cart(){
        $id=Auth::id();
        $user=User::find($id);
        $categories = Categorie::all();
        return view('cart',['categories' => $categories,'user'=>$user]);
    }
>>>>>>> baebe58916d12ff9e1b8596ef6e225555b1b6933
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


    public function shop(){
        return view('shop');
    }
    
}
