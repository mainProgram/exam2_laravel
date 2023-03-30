<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::check()){
            $business = User::whereHas('roles', function ($query) {
                $query->where('name', 'business');
            })->paginate(8);
            return view("pages.business.admin.index", [
                "business" => $business,
            ]);
        }
        else{
            return view("pages.business");
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.business.admin.create");
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
            'nb_employe' => ['required', 'number', 'min:2'],
            'secteur' => ['required', 'string', 'min:2'],
            'nom_entreprise' => ['required', 'string', 'min:2']
        ];
        $request->validate($validations);

        $user = User::create([
            'prenom' => $request->prenom,
            'nb_employe' => $request->nb_employe,
            'nom_entreprise' => $request->nom_entreprise,
            'secteur' => $request->secteur,
            'nom' => $request->nom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telephone' => $request->telephone,
        ]);
        $user->assignRole("business");
        return back()->with('success', 'Le compte business a été enregistré !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $business = User::find($id);
        return view("pages.business.edit", ["business" => $business]);
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
        $business = User::find($id);
        $validations = [
            'nom' => ['required', 'string', 'max:50'],
            'prenom' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
            'telephone' => ['required', 'string', 'min:9'],
            'password_confirmation' => ['required', 'string'],
        ];
        $request->validate($validations);
        $business->update($request->validated());        
        return back()->with('success', 'Le business a été modifié !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $business = User::find($id);
        $business->delete();
        return response()->json(["status" => "Business supprimé !"]);
    }
}