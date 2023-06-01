<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Produit;
use App\Models\Panie;
use App\Models\Categorie;

class PanierController extends Controller
{
    public function afficherPanier()
    {
        // Vérifier si l'utilisateur est connecté
        if (Auth::check()) {
            // L'utilisateur est connecté, récupérer les éléments du panier depuis la table panie
            $panier = Panie::join('produits', 'panies.idPro', '=', 'produits.idPro')
                ->select('panies.*', 'produits.nomPro', 'produits.photo', 'produits.prixPro')
                ->where('panies.id', Auth::user()->id)
                ->get();
            $prixTotal = Panie::where('id', Auth::user()->id)->sum('prixTTC');
        }
        $categories = Categorie::all();
        return view('cart', compact('panier', 'prixTotal'),['categories' => $categories]);
    }
    

    public function ajouterProduitDansPanier(Request $request)
    {
        // Récupérer les informations du produit depuis la requête
        $idPro = $request->input('id_produit');
        $quantite = $request->input('quantite');
    
        // Vérifier si le produit existe
        $produit = Produit::find($idPro);
        if (!$produit) {
            // Le produit n'existe pas, gérer l'erreur
            return redirect()->route('panier');
        }
    
        // Créer un nouvel élément de panier
        $elementPanier = new Panie();
        $elementPanier->idPro = $idPro;
        $elementPanier->qteV = $quantite;
        $elementPanier->prixTTC = $produit->prixPro * $quantite;
    
        // Vérifier si l'utilisateur est connecté
        if (Auth::check()) {
            // L'utilisateur est connecté, enregistrer le panier dans la table panie
            $elementPanier->id = Auth::user()->id;
            $elementPanier->save();
        }
        if (Auth::check()){
            return redirect()->route('panier');
        }else{
            return redirect()->route('login');
        }
    }

    public function supprimerProduitDuPanier(Request $request)
    {
        // Récupérer l'ID de l'élément du panier à supprimer depuis la requête
        $idElementPanier = $request->input('id_element_panier');
    
        // Vérifier si l'utilisateur est connecté
        if (Auth::check()) {
            // L'utilisateur est connecté, supprimer l'élément du panier de la table panie
            Panie::where('idPanie', $idElementPanier)->delete();
        }
    }

    public function mettreAJourQuantiteProduit(Request $request)
    {
        // Récupérer les informations de mise à jour depuis la requête
        $idElementPanier = $request->input('id_element_panier');
        $nouvelleQuantite = $request->input('nouvelle_quantite');
    
        // Vérifier si l'utilisateur est connecté
        if (Auth::check()) {
            // L'utilisateur est connecté, mettre à jour la quantité du produit dans la table panie
            $elementPanier = Panie::find($idElementPanier);
            $elementPanier->qteV = $nouvelleQuantite;
            $elementPanier->prixTTC = $elementPanier->produit->prixPro * $nouvelleQuantite;
            $elementPanier->save();
            }
    }
}
