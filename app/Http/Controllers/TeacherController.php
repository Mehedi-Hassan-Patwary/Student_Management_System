<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
       $teacher = Teacher::all();
       return view('teacher.index')->with('teacher',$teacher);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $input = $request->all();
        Teacher::create($input);
        return redirect('teacher')->with('flash_message','Teacher Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id):View
    {
        $teacher = Teacher ::find($id);
        return view('teacher.show')->with('teacher',$teacher);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id):View
    {
        $teacher = Teacher::find($id);
        return view('teacher.edit')->with('teacher',$teacher);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id):RedirectResponse
    {
        $teacher = Teacher::find($id);
        $input = $request->all();
        $teacher -> update($input);
        return redirect('teacher')->with('flash_message'.'Teacher_update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Teacher::destroy($id);
        return redirect('teacher')->with('flash_message','Teacher deleted!');
    }
}
