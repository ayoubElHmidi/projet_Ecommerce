<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function shop()
    {
        $data = Categorie::all();
        return view('shop', ['data' => $data]);
    }
    


    public function index(Produit $product): View
    {
        return view("fireshop.index");
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
        ]);

        $imgpath = $request->file('photo')->storeAs('public', $request->file('photo')->getClientOriginalName());
        $imgpath = str_replace("public/", "storage/", $imgpath);

        Produit::create([
            "nomPro" => $request->nomPro,
            "descriptionPro" => $request->descriptionPro,
            "photo" => $imgpath,
            "prixPro" => $request->prixPro,
            'qtePro' => $request->qtePro,
            'idCat' => $request->idCat,
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
        ];

        if ($request->hasFile('picture')) {
            $rules['picture'] = 'image|max:1024';
        }

        $this->validate($request, $rules);

        $imgpath = "";

        if ($request->hasFile('picture')) {
            $imgpath = Storage::putFile('img', $request->file('picture'));
            if ($product->picture) {
                Storage::delete($product->picture);
            }
        } else {
            $imgpath = $product->picture;
        }

        // dd($imgpath);

        $productData = [
            "nomPro" => $request->nomPro,
            "descriptionPro" => $request->descriptionPro,
            "photo" => $imgpath,
            "prixPro" => $request->prixPro,
            'qtePro' => $request->qtePro,
            'idCat' => $request->idCat,
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
