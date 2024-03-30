<?php

namespace App\Http\Controllers\admin;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;

class AdminStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'roll_no' => 'required|unique:students,roll_no|integer',
            'university_rollno' => 'required|unique:students,university_rollno|integer',
            'name' => 'required|string|max:300',
            'email' => 'required|unique:students,email|email',
            'course' => 'required|string|max:300',
            'section' => 'required|string|max:3',
            'subject_1' => 'nullable|string|max:500',
            'subject_2' => 'nullable|string|max:500',
            'subject_3' => 'nullable|string|max:500',
            'subject_4' => 'nullable|string|max:500',
            'subject_5' => 'nullable|string|max:500',
            'subject_6' => 'nullable|string|max:500',
            'subject_7' => 'nullable|string|max:500',
        ]);

        // Create a new student instance
        $student = new Student();
        $student->roll_no = $validatedData['roll_no'];
        $student->university_rollno=$validatedData['university_rollno'];
        $student->name = $validatedData['name'];
        $student->email = $validatedData['email'];
        $student->course = $validatedData['course'];
        $student->section = $validatedData['section'];
        $student->subject_1 = $validatedData['subject_1'];
        $student->subject_2 = $validatedData['subject_2'];
        $student->subject_3 = $validatedData['subject_3'];
        $student->subject_4 = $validatedData['subject_4'];
        $student->subject_5 = $validatedData['subject_5'];
        $student->subject_6 = $validatedData['subject_6'];
        $student->subject_7 = $validatedData['subject_7'];

        // Save the student to the database
        $student->save();

        // Redirect with success message
        return redirect()->route('admin.student.create')->with('success', 'Student created successfully!');

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

    public function showimportform(){
        return view('admin.student.importstudent');
    }

    public function importstudent(Request $request){
        Excel::import(new StudentImport,$request->file('csv_file'));
        return redirect()->back()->with('success','Tht student data has been successfully uploaded');
    }
}
