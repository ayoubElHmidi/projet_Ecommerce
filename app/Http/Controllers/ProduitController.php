<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Produit;

class ProduitController extends Controller
{
    public function shop()
    {
        $produits = Produit::all();
        return view('shop', ['produits' => $produits]);
    }
}
