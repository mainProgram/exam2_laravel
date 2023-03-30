<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Itineraire;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::findOrFail(Auth::user()->id);
        if($user->hasRole("admin"))
        {
            $courses = Course::paginate(8);
        }
        else if($user->hasRole("passager")){
            $courses = $user->mes_courses_passager()->paginate(8);
        }
        else if($user->hasRole("chauffeur")){
            $courses = $user->mes_courses_chauffeur()->paginate(8);
        }
        return view("pages.courses.index", [
            "courses" => $courses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $passagers = User::whereHas('roles', function ($query) {
            $query->where('name', 'passager');
        })->get();

        $chauffeurs = User::whereHas('roles', function ($query) {
            $query->where('name', 'chauffeur');
        })->get();

        return view("pages.courses.create", [
            "itineraires" =>  Itineraire::all(),
            "chauffeurs" =>  $chauffeurs,
            "passagers" =>  $passagers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $course = Course::create($request->validated());
        return back()->with('success', 'La course a été enregistrée !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $course = Course::find($id);
        return view("pages.courses.edit", ["course" => $course]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->validated());        
        return back()->with('success', 'La course a été modifiée !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function change(UpdateCourseRequest $request, $id, $etat)
    {
        $course = Course::find($id);
        if($etat == "termine")
        {
            $course->etat = "termine";
            $course->heure_arrivee = now()->format('h:i');
            $course->update($request->validated());        
            return back()->with('success', 'La course est terminée !');
        }
        else if($etat == "annule")
        {
            $course->etat = "annule";
            $course->update($request->validated());        
            return back()->with('danger', 'La course a été annulée !');
        }
    }
    public function destroy(Course $course)
    {
       
    }
}
