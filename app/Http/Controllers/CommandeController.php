<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Panie;
use App\Models\Commande;
use App\Models\ProduitCommande;
use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Console\Command;

class CommandeController extends Controller
{
    public function index()
    {
        // Récupérer le panier de l'utilisateur
        $panier = Panie::join('produits', 'panies.idPro', '=', 'produits.idPro')
            ->where('panies.id', Auth::id())
            ->select('produits.nomPro', 'panies.prixTTC')
            ->get();

        // Calculer le total de la commande
        $totalCommande = $panier->sum('prixTTC');
        $categories = Categorie::all();
        // Charger la vue avec les données de la commande
        return view('checkout', [
            'panier' => $panier,
            'totalCommande' => $totalCommande,
            'categories'=>$categories
        ]);
    }

    public function placeOrder(Request $request)
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Récupérer le panier de l'utilisateur
        $panier = Panie::join('produits', 'panies.idPro', '=', 'produits.idPro')
            ->where('panies.id', $user->id)
            ->select('panies.idPro', 'panies.qteV', 'panies.prixTTC')
            ->get();

        // Valider les données du formulaire
        $validatedData = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'mobileNo' => 'required',
            'addressLine1' => 'required',
            'addressLine2' => 'required',
            'country' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipCode' => 'required',
        ]);

        // Vérifier si les informations du formulaire correspondent à l'utilisateur connecté
        if (
            $validatedData['firstName'] !== $user->name ||
            $validatedData['lastName'] !== $user->name ||
            $validatedData['email'] !== $user->email
        ) {
            return redirect()->back()->with('error', 'Les informations du formulaire ne correspondent pas à votre profil.');
        }

        // Insérer la commande dans la table "commandes"
        $commande = new Commande;
        $commande->id = $user->id;
        $commande->dateCom = date('Y-m-d');
        $commande->numTel = $validatedData['mobileNo'];
        $commande->adrs = $validatedData['addressLine1'] . ', ' . $validatedData['addressLine2'] . ', ' . $validatedData['city'] . ', ' . $validatedData['state'] . ', ' . $validatedData['zipCode'];
        $commande->save();

        // Enregistrer les produits commandés dans la table "produits_commandes"
        foreach ($panier as $produit) {
            $produitCommande = new ProduitCommande;
            $produitCommande->id = $user->id;
            $produitCommande->idCom = $commande->idCom;
            $produitCommande->idPro = $produit->idPro;
            $produitCommande->qteC = $produit->qteV;
            $produitCommande->save();
        
            // Mettre à jour la quantité dans la table "produits"
            $produitToUpdate = Produit::find($produit->idPro);
            $produitToUpdate->qtePro = $produitToUpdate->qtePro - $produitCommande->qteC;
            $produitToUpdate->save();
        }
        
        // Vider le panier de l'utilisateur (table "panies")
        Panie::where('id', $user->id)->delete();

        // Rediriger vers la page d'accueil avec un message de succès
        return redirect()->route('index')->with('success', 'La commande a été effectuée avec succès.');
    }

}
