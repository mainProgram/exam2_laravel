<?php

namespace App\Http\Controllers;

use App\Models\Itineraire;
use App\Http\Requests\StoreItineraireRequest;
use App\Http\Requests\UpdateItineraireRequest;
use App\Models\Endroit;

class ItineraireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itineraires = Itineraire::paginate(8);
        return view("pages.itineraires.index", [
            "itineraires" => $itineraires,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.itineraires.create", [
            "endroits" =>  Endroit::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItineraireRequest $request)
    {
        $itineraire = Itineraire::create($request->validated());
        return back()->with('success', 'L\'Itineraire a été enregistré !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Itineraire $itineraire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $itineraire = Itineraire::find($id);
        return view("pages.itineraires.edit", ["itineraire" => $itineraire]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItineraireRequest $request, Itineraire $itineraire)
    {
        $itineraire->update($request->validated());        
        return back()->with('success', 'L\'itineraire a été modifié !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Itineraire $itineraire)
    {
        $itineraire->delete();
        return response()->json(["status" => "Itineraire supprimé !"]);
    }
}
