<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeacherUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $teachers = Teacher::all();
        foreach ($teachers as $teacher) {
            $exituser = User::where('email', $teacher->email)->exists();
            if (!$exituser) {
                User::create([
                    'name' => $teacher->name,
                    'teacher_id' => $teacher->teacher_id,
                    'email' => $teacher->email,
                    'password' => bcrypt('password'), // Set a default password
                    'role' => 'teacher',
                ]);
            }
        }
    }
}
