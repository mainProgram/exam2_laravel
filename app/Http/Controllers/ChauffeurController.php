<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ChauffeurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::check()){
            $chauffeurs = User::whereHas('roles', function ($query) {
                $query->where('name', 'chauffeur');
            })->paginate(8);
            return view("pages.chauffeurs.admin.index", [
                "chauffeurs" => $chauffeurs,
            ]);
        }
        else{
            return view("pages.chauffeur");
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.chauffeurs.admin.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validations = [
            'nom' => ['required', 'string', 'max:50'],
            'prenom' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
            'telephone' => ['required', 'string', 'min:9'],
            'password_confirmation' => ['required', 'string'],
            'ville' => ['required', 'string', 'max:50']
        ];
        $request->validate($validations);

        $user = User::create([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'ville' => $request->ville,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telephone' => $request->telephone,
        ]);
        $user->assignRole("chauffeur");
        return back()->with('success', 'Le chauffeur a été enregistré !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $chauffeur = User::find($id);
        return view("pages.chauffeurs.edit", ["chauffeur" => $chauffeur]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $chauffeur = User::find($id);
        $validations = [
            'nom' => ['required', 'string', 'max:50'],
            'prenom' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
            'telephone' => ['required', 'string', 'min:9'],
            'password_confirmation' => ['required', 'string'],
        ];
        $request->validate($validations);
        $chauffeur->update($request->validated());        
        return back()->with('success', 'Le chauffeur a été modifié !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $chauffeur = User::find($id);
        $chauffeur->delete();
        return response()->json(["status" => "Chauffeur supprimé !"]);
    }
}