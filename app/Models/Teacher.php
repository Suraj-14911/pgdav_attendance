<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    public $incrementing = false;

    protected $fillable=[
        'teacher_id',
        'name',
        'email',
        'department',
        'subject_1',
        'subject_2',
        'subject_3'
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

}
