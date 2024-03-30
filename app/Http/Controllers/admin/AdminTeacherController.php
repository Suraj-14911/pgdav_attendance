<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class AdminTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedata=$request->validate([
            'teacher_id' => 'required|unique:teachers,teacher_id|integer',
            'name'=> 'required|string|max:300',
            'email' => 'required|unique:teachers,email|email',
            'department' => 'required|string|max:300',
            'subject_1'=> 'required|string|max:500',
            'subject_2'=> 'required|string|max:500',
            'subject_3'=> 'required|string|max:500'
        ]);

        $teacher= new Teacher();

        $teacher->teacher_id=$validatedata['teacher_id'];
        $teacher->name=$validatedata['name'];
        $teacher->email=$validatedata['email'];
        $teacher->department=$validatedata['department'];
        $teacher->subject_1=$validatedata['subject_1'];
        $teacher->subject_2=$validatedata['subject_2'];
        $teacher->subject_3=$validatedata['subject_3'];

        $teacher->save();
       
        return redirect()->route('admin.teacher.create')->with('success','Teacher Added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
