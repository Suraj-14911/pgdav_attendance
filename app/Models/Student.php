<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public $incrementing = false;


    protected $fillable = [
        'roll_no',
        'university_rollno',
        'name',
        'email',
        'course',
        'section',
        'semester',
        'subject_1',
        'subject_2',
        'subject_3',
        'subject_4',
        'subject_5',
        'subject_6',
        'subject_7'
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
