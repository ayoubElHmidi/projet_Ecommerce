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
class AdminController extends Controller
{
    public function admin_index(User $user): RedirectResponse
    {
        if (!Gate::allows('access-admin', $user)) {
            return redirect(route('index'));
        }
        return redirect(route('admine'));
    }
    public function bladeAdmine(){
        $id=Auth::id();
        $user=User::find($id);
        $countUser=$user->count();
        
        return view("fireshop.admin.index",compact("countUser"));
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
        return view("fireshop.admin.editPro",compact("product","data"));
    }
    public function affichageUser(){
        $users=User::All();
        return view('fireshop.admin.users',compact('users'));
    }
    public function deleteUser(User $user){
        $user->delete();
        return redirect(route('admin'));
    }
    public function blockUser($id){
        $user = User::find($id);
        $user->is_blocked = true;
        $user->save();
        return redirect()->back();
    }
    public function unlockUser($id){
        $user = User::find($id);
        $user->is_blocked = false;
        $user->save();
        return redirect()->back();
    }
}
