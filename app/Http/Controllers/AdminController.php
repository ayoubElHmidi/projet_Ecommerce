<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;
use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Contact;
class AdminController extends Controller
{
    public function admin_index(User $user): RedirectResponse
    {
        if (!Gate::allows('access-admin', $user)) {
            return redirect(route('index'));
        }
        return redirect(route('admine'));
    }
    //dashboard admin
    public function bladeAdmine(){
        $contact=Contact::All();
        $id=Auth::id();
        $user=User::find($id);
        $countUser=$user->count();
        $categorie=Categorie::all();
        return view("fireshop.admin.index",compact("countUser",'categorie','contact'));
    }
    //dashboard ajoute admin
    public function create():view
    {
        $contact=Contact::All();
        $categorie=Categorie::all();
        return view('fireshop.admin.ajouteAdmin',compact("categorie",'contact'));
    }
    //methode ajoute admin
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
    //dashboard produits
    public function affichagePro():view
    {
        $contact=Contact::All();
        $categorie=Categorie::all();
        $produit=Produit::all();
        return view("fireshop.admin.produits",compact("produit",'categorie','contact'));
    }
    //dashboard ajoute produit
    public function ajouteProd():view
    {
        $contact=Contact::All();
        $categorie=Categorie::all();
        return view("fireshop.admin.ajouteProd",compact('categorie','contact'));
    }
    //dashboard modifier produit
    public function edit($idPro):view
    {
        $contact=Contact::All();
        $product=Produit::query()->find($idPro);
        $categorie=Categorie::all();
        return view("fireshop.admin.editPro",compact("product","categorie",'contact'));
    }
    //dashboard users
    public function affichageUser(){
        $contact=Contact::All();
        $categorie=Categorie::All();
        $users=User::All();
        return view('fireshop.admin.users',compact('users','categorie','contact'));
    }
    //methode delete user
    public function deleteUser(User $user){
        $user->delete();
        return redirect(route('admin'));
    }
    //methode block user
    public function blockUser($id){
        $user = User::find($id);
        $user->is_blocked = true;
        $user->save();
        return redirect()->back();
    }
    //methode deblock user
    public function unlockUser($id){
        $user = User::find($id);
        $user->is_blocked = false;
        $user->save();
        return redirect()->back();
    }
    //methode filtre produit par categorie
    public function filtreProParCat($idCat){
        $contact=Contact::All();
        $categorie=Categorie::All();
        $produit=Produit::query()->where('idCat',$idCat)->get();
        
        return view('fireshop.admin.produits',compact('produit','categorie','contact'));
    }
    //dashboard detail produit
    public function detaiAdmin($idPro){
        $contact=Contact::All();
        $produit=Produit::find($idPro);
        $categorie=Categorie::All();
        return view('fireshop.admin.detail',compact('produit','categorie','contact'));
    }
    //
    public function editQte(Request $req,Produit $produit){
        $qte=$req->input('qte');
        $produit->qtePro=$qte;
        $produit->save();
        return redirect(route('admin'));
    }
}
