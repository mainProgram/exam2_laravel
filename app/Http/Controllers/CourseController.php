<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Itineraire;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::paginate(8);
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
        return back()->with('success', 'L\'course a été modifié !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return response()->json(["status" => "Course supprimé !"]);
    }
}
