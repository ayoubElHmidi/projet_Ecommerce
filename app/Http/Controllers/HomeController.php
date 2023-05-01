<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personne;
class HomeController extends Controller
{
    public function index(){
        return view('index');
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
    public function detail(){
        return view('detail');
    }
    public function shop(){
        return view('shop');
    }
    
}
