<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Categorie;
use App\Models\Contact;

class CategorieController extends Controller
{
    //dashboard ajoute categorie
    public function ajouteCat(){
        $contact=Contact::All();
        $categorie=Categorie::all();
        return view("fireshop.admin.ajouteCat",compact('categorie','contact'));
    }
    public function addCat(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'nomCat' => 'required|string|max:255',
            'descriptionCat' => 'required|string|max:10000',
            'photoCat' => 'image',
        ]);
    
        
        $imgpath = $request->file('photoCat')->storeAs('public/categorie', $request->file('photoCat')->getClientOriginalName());
        $imgpath = str_replace("public", "storage", $imgpath);

        
        Categorie::create([
            "nomCat" => $request->nomCat,
            "descriptionCat" => $request->descriptionCat,
            "photoCat" => $imgpath,
        ]);
    
        return redirect()->route('admin');
    }
    //methode delete user
    public function deleteCat(Categorie $Categorie){
        $Categorie->delete();
        return redirect(route('admin'));
    }
}
