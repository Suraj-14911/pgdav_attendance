<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $students = Student::all();
        foreach ($students as $student) {

            $exitsuser = User::where('email', $student->email)->exists();


            if (!$exitsuser) {
                User::create([
                    'name' => $student->name,
                    'student_rollno' => $student->roll_no,
                    'email' => $student->email,
                    'password' => bcrypt('password'), // Set a default password
                    'role' => 'student',
                ]);
            }
        }
    }
}
