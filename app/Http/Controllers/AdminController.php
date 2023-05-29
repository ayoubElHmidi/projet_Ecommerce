<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;
use App\Models\Produit;
use App\Models\Categorie;
class AdminController extends Controller
{
    public function admin_index(User $user): RedirectResponse
    {
        if (!Gate::allows('access-admin', $user)) {
            return redirect(route('dashboard'));
        }
        return redirect(route('admine'));
    }

    public function create():view
    {
        $data=Categorie::all();
        return view('fireshop.admin.ajouteAdmin',compact("data"));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['is_admin'] = true;

        User::create($validatedData);

        return redirect()->route('admin')->with('success', 'Nouvel administrateur ajouté avec succès.');
    }
    
    public function ajouteProd():view
    {
        $data=Categorie::all();
        return view("fireshop.admin.ajouteProd",compact("data"));
    }
    public function affichagePro():view
    {
        $data=Produit::all();
        return view("fireshop.admin.produits",compact("data"));
    }
    public function edit($idPro):view
    {
        $product=Produit::query()->find($idPro);
        
        $data=Categorie::all();
        return view("fireshop.admin.ajouteProd",compact("product","data"));
    }
}
