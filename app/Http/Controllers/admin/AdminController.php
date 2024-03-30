<?php

namespace App\Http\Controllers\admin;

use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\User;

class AdminController extends Controller
{
    //
    public function dashboard(){

        $result1=$this->countstudent();
        $result2=$this->totalClassTaken();
        $result3=$this->totalteacher();
        $result4=$this->totaluser();
        return view('admin.dashboard',[
            'studentcount'=>$result1,
            'classcount'=>$result2,
            'teachercount'=>$result3,
            'usercount'=>$result4
        ]);
    }

    public function profile(){
        return view('admin.profile');
    }

    public function countstudent(){
        $count = Student::count();
        return $count;
    }

    public function totalClassTaken()
    {
        $totalClasses = Attendance::count();

        return $totalClasses;                                                                                                         
    }
    public function totalteacher(){
        $totalteacher = Teacher::count();
        return $totalteacher;
    }

    public function totaluser(){

        $totaluser = User::count();
        return $totaluser;
    }

}
