<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    public function create()
    {
        return view('fireshop.addadmine');
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
    public function admin_index(User $user): RedirectResponse
    {
        if (!Gate::allows('access-admin', $user)) {
            return redirect(route('dashboard'));
        }
        return redirect(route('admine'));
    }
}
