<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Contact;
use App\Models\Commande;
use App\Models\ProduitCommande;
use Illuminate\Support\Facades\Auth;


class ProduitCommandeController extends Controller
{
    
    public function getCommandeDetails($commandeId)
    {
        $categorie=Categorie::all();
        $contact=Contact::All();
        $resultats = ProduitCommande::join('produits', 'produits_commandes.idPro', '=', 'produits.idPro')
        ->join('commandes', 'produits_commandes.idCom', '=', 'commandes.idCom')
        ->select('produits.nomPro', 'commandes.idCom', 'produits.prixPro', 'produits_commandes.qteC', 'produits.photo')
        ->selectRaw('produits.prixPro * produits_commandes.qteC as prixTTC')
        ->where('commandes.idCom', $commandeId)
        ->get();
    
        return view("fireshop.admin.detailCommand",compact('contact','resultats','categorie'));

    }
    public function modifierEtatCommande(Request $request)
    {
        $commandeId = $request->input('commandeId');
        $nouvelEtat = $request->input('etatCommande');
    
        // Modifier l'état de la commande dans la base de données
        $commande = Commande::find($commandeId);
        $commande->etat = $nouvelEtat;
        $commande->save();
    
        return redirect()->route('admin')->with('success', 'L\'état de la commande a été modifié avec succès.');
    }
    


public function suivreCommande()
{
    // Obtenez l'ID du client connecté
    $clientId = Auth::id();
    $categorie=Categorie::all();

        $resultats = Commande::join('produits_commandes', 'commandes.idCom', '=', 'produits_commandes.idCom')
        ->join('users', 'produits_commandes.id', '=', 'users.id')
        ->join('produits', 'produits_commandes.idPro', '=', 'produits.idPro')
        ->select('users.name', 'commandes.idCom', 'commandes.etat')
        ->where('commandes.id', $clientId)
        ->groupBy('commandes.idCom', 'users.name', 'commandes.etat')
        ->get();

    return view('SuiverCommmmand', ['resultats' => $resultats , 'categories'=>$categorie]);
}

}
?>