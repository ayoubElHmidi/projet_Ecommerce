<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function shop()
    {
        $categories = Categorie::all();
        $produits = produit::all();
        return view('shop', ['categories' => $categories,'produits' => $produits]);
    }
    public function afficherProduitsParCategorie($idCategorie)
    {
        $categorie = Categorie::findOrFail($idCategorie);
        $produits = Produit::where('idCat', $idCategorie)->get();
        $categories = Categorie::all();
        return view('shop', compact('categories', 'produits', 'categorie'));
    }
    
    function recherchePro(Request $req){
            $produits=Produit::query()->where("nomPro","like","%".$req["recherchePro"]."%")->get();
            $categories = Categorie::all();
            if($produits){
                return view("/shop",["produits"=>$produits,'categories' => $categories]);
            }
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $data=Categorie::all();
        return view("fireshop.create",compact("data"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'nomPro' => 'required|string|max:255',
            'descriptionPro' => 'required|string|max:10000',
            'photo' => 'image|max:1024',
            'prixPro' => 'required|numeric',
            'qtePro' => 'required|numeric',
            'idCat' =>'required|numeric',
            'color' =>'required|string',
            'size' =>'required|string',
        ]);
        
        switch($request->idCat){
            case 1 : $imgpath = $request->file('photo')->storeAs('public/femmes', $request->file('photo')->getClientOriginalName());
            break;
            case 2 : $imgpath = $request->file('photo')->storeAs('public/hommes', $request->file('photo')->getClientOriginalName());
            break;
            case 3 : $imgpath = $request->file('photo')->storeAs('public/enfants', $request->file('photo')->getClientOriginalName());
            break;
            case 4 : $imgpath = $request->file('photo')->storeAs('public/vetementSport', $request->file('photo')->getClientOriginalName());
            break;
            case 5 : $imgpath = $request->file('photo')->storeAs('public/accessoires', $request->file('photo')->getClientOriginalName());
            break;
            case 6 : $imgpath = $request->file('photo')->storeAs('public/chaussures', $request->file('photo')->getClientOriginalName());
        }
        $imgpath = str_replace("public", "storage", $imgpath);
        

        Produit::create([
            "nomPro" => $request->nomPro,
            "descriptionPro" => $request->descriptionPro,
            "photo" => $imgpath,
            "prixPro" => $request->prixPro,
            'qtePro' => $request->qtePro,
            'idCat' => $request->idCat,
            'color' =>$request->color,
            'size' =>$request->size,
        ]);
        return redirect(route('admin'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $product): View
    {
        return view("fireshop.show", compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $product): View
    {
        // $this->authorize('update', $product);

        return view('fireshop.edit', [
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $product): RedirectResponse
    {
        $rules = [
            'nomPro' => 'required|string|max:255',
            'descriptionPro' => 'required|string|max:10000',
            'photo' => 'image|max:1024',
            'prixPro' => 'required|numeric',
            'qtePro' => 'required|numeric',
            'idCat' =>'required|numeric',
            'color' =>'required|string',
            'size' =>'required|string',
        ];

        if ($request->hasFile('photo')) {
            $rules['photo'] = 'image|max:1024';
        }

        $this->validate($request, $rules);

        $imgpath = "";

        if ($request->hasFile('photo')) {
            $imgpath = Storage::putFile('img', $request->file('photo'));
            if ($product->photo) {
                Storage::delete($product->photo);
            }
        } else {
            $imgpath = $product->photo;
        }

        $productData = [
            "nomPro" => $request->nomPro,
            "descriptionPro" => $request->descriptionPro,
            "photo" => $imgpath,
            "prixPro" => $request->prixPro,
            'qtePro' => $request->qtePro,
            'idCat' => $request->idCat,
            'color' =>$request->color,
            'size' =>$request->size,
        ];
        $product->update($productData);

        return redirect(route('admin'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $product): RedirectResponse
    {
        $product->delete();

        return redirect(route('admin'));
    }
}
