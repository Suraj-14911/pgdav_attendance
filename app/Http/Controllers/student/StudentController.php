<?php

namespace App\Http\Controllers\student;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    //
    public function dashboard(){
        return view('student.dashboard');
    }

    public function profile(){
        return view('student.profile');
    }

}
