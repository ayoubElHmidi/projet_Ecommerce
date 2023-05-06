<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class CategorieController extends Controller
{
    public function afficherCategories()
    {
        $categories = Categorie::all(); 
        return view('navbarhome', compact('categories')); 
    }
}
