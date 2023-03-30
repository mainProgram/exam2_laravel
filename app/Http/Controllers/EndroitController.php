<?php

namespace App\Http\Controllers;

use App\Models\Endroit;
use App\Http\Requests\StoreEndroitRequest;
use App\Http\Requests\UpdateEndroitRequest;

class EndroitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $endroits = Endroit::paginate(8);
        return view("pages.endroits.index", [
            "endroits" => $endroits
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.endroits.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEndroitRequest $request)
    {
        $endroit = Endroit::create($request->validated());
        return back()->with('success', 'L\'Endroit '. $endroit->nom .' a été enregistré !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Endroit $endroit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $endroit = Endroit::find($id);
        return view("pages.endroits.edit", ["endroit" => $endroit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEndroitRequest $request, Endroit $endroit)
    {
        $endroit->update($request->validated());        
        return back()->with('success', 'L\'endroit a été modifié !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Endroit $endroit)
    {
        $endroit->delete();
        return response()->json(["status" => "Endroit supprimé !"]);
    }
}
