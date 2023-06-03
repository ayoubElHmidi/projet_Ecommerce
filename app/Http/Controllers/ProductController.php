<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Produit;
use App\Models\Categorie;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function shop()
    {
        $id=Auth::id();
        $user=User::find($id);
        $categories = Categorie::all();
        $produits = produit::all();
        return view('shop', ['categories' => $categories,'produits' => $produits,'user'=>$user]);
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
        'idCat' => 'required|numeric',
        'color' => 'required|string',
        'size' => 'required|string',
    ]);

    switch ($request->idCat) {
        case 1:
            $imgpath = $request->file('photo')->storeAs('public/femmes', $request->file('photo')->getClientOriginalName());
            break;
        case 2:
            $imgpath = $request->file('photo')->storeAs('public/hommes', $request->file('photo')->getClientOriginalName());
            break;
        case 3:
            $imgpath = $request->file('photo')->storeAs('public/enfants', $request->file('photo')->getClientOriginalName());
            break;
        case 4:
            $imgpath = $request->file('photo')->storeAs('public/vetementSport', $request->file('photo')->getClientOriginalName());
            break;
        case 5:
            $imgpath = $request->file('photo')->storeAs('public/accessoires', $request->file('photo')->getClientOriginalName());
            break;
        case 6:
            $imgpath = $request->file('photo')->storeAs('public/chaussures', $request->file('photo')->getClientOriginalName());
            break;
    }
    $imgpath = str_replace("public", "storage", $imgpath);

    Produit::create([
        "nomPro" => $request->nomPro,
        "descriptionPro" => $request->descriptionPro,
        "photo" => $imgpath,
        "prixPro" => $request->prixPro,
        'qtePro' => $request->qtePro,
        'idCat' => $request->idCat,
        'color' => $request->color,
        'size' => $request->size,
    ]);

    return redirect()->route('admin');
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
            'prixPro' => 'required|numeric',
            'qtePro' => 'required|numeric',
            'idCat' => 'required|numeric',
            'color' => 'required|string',
            'size' => 'required|string',
        ];

        if ($request->hasFile('photo')) {
            $rules['photo'] = 'photo|max:1024';
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
            'color' => $request->color,
            'size' => $request->size,
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
    public function filterByPrice(Request $request)
    {
        // Récupérer les valeurs sélectionnées dans le formulaire
        $selectedPrices = $request->input('prix');
    
        // Effectuer le filtrage en fonction des prix sélectionnés
        if ($selectedPrices) {
            // Récupérer tous les produits ou utiliser vos propres données
            $products = produit::all();
    
            // Filtrer les produits en fonction des prix sélectionnés
            $filteredProducts = $products->filter(function ($product) use ($selectedPrices) {
                // Définir les intervalles de prix correspondant aux valeurs sélectionnées
                $priceRanges = [
                    'all' => [0, 500],     // Tous les prix
                    '1' => [0, 100],       // $0 - $100
                    '2' => [100, 200],     // $100 - $200
                    '3' => [200, 300],     // $200 - $300
                    '4' => [300, 400],     // $300 - $400
                    '5' => [400, 500],     // $400 - $500
                ];
    
                // Récupérer l'intervalle de prix correspondant à la valeur sélectionnée
                $selectedPriceRange = $priceRanges[$selectedPrices];
    
                // Vérifier si le prix du produit est compris dans l'intervalle sélectionné
                return $product->price >= $selectedPriceRange[0] && $product->price <= $selectedPriceRange[1];
            });
        } else {
            // Aucun prix sélectionné, retourner tous les produits ou utiliser vos propres données
            $filteredProducts = produit::all();
        }
    
        // Retourner les résultats filtrés
        return view('shop', compact('filteredProducts'));
    }
    
    
    public function filterByColor(Request $request)
    {
        // Récupérer les valeurs sélectionnées dans le formulaire
        $selectedColors = $request->input('couleur');
    
        // Effectuer le filtrage en fonction des couleurs sélectionnées
        if ($selectedColors) {
            // Récupérer tous les produits ou utiliser vos propres données
            $products = produit::all();
    
            // Filtrer les produits en fonction des couleurs sélectionnées
            $filteredProducts = $products->filter(function ($product) use ($selectedColors) {
                // Vérifier si la couleur du produit fait partie des couleurs sélectionnées
                return in_array($product->color, $selectedColors);
            });
        } else {
            // Aucune couleur sélectionnée, retourner tous les produits ou utiliser vos propres données
            $filteredProducts = produit::all();
        }
    
        // Retourner les résultats filtrés
        return view('shop', compact('filteredProducts'));
    }
    
    
    public function filterBySize(Request $request)
    {
        // Récupérer les valeurs sélectionnées dans le formulaire
        $selectedSizes = $request->input('taille');
    
        // Effectuer le filtrage en fonction des tailles sélectionnées
        if ($selectedSizes) {
            // Récupérer tous les produits ou utiliser vos propres données
            $products = produit::all();
    
            // Filtrer les produits en fonction des tailles sélectionnées
            $filteredProducts = $products->filter(function ($product) use ($selectedSizes) {
                // Vérifier si la taille du produit fait partie des tailles sélectionnées
                return in_array($product->size, $selectedSizes);
            });
        } else {
            // Aucune taille sélectionnée, retourner tous les produits ou utiliser vos propres données
            $filteredProducts = produit::all();
        }
    
        // Retourner les résultats filtrés
        return view('shop', compact('filteredProducts'));
    }
    
    
}
