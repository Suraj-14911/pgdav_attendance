<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            //

            'roll_no'=>$row['roll_no'],
            'university_rollno'=>$row['university_rollno'],
            'name'=>$row['name'],
            'email'=>$row['email'],
            'course'=>$row['course'],
            'section'=>$row['section'],
            'semester'=>$row['semester'],
            'subject_1'=>$row['subject_1'],
            'subject_2'=>$row['subject_2'],
            'subject_3'=>$row['subject_3'],
            'subject_4'=>$row['subject_4'],
            'subject_5'=>$row['subject_5'],
            'subject_6'=>$row['subject_6'],
            'subject_7'=>$row['subject_7'],
        ]);
    }
}
