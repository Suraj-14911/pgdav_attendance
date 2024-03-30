<?php

namespace App\Http\Controllers\teacher;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    //
    public function dashboard()
    {
        $subjects = $this->subjects();
        return view('teacher.dashboard', ['subjects' => $subjects]);
    }

    public function profile()
    {
        return view('teacher.profile');
    }

    public function subjects()
    {
        $userid = Auth::user()->teacher_id;

        $teacher = Teacher::where('teacher_id', $userid)->first();
        if ($teacher) {
            // Retrieve the subjects of the teacher
            $subjects = [
                $teacher->subject_1,
                $teacher->subject_2,
                $teacher->subject_3,
                $teacher->subject_4
                // Add more subjects if needed (subject_5, subject_6, ...)
            ];

            // Remove null or empty subjects
            $subjects = array_filter($subjects);

            // Remove duplicate subjects and re-index the array
            $subjects = array_values(array_unique($subjects));

            return $subjects;
        } else {
            return [];
        }
    }


    // Mark Attendance

    // public function markAttendance($teacherId, $subject, $date, $studentRollNo, $status)
    // {
    //     // Find the teacher
    //     $teacher = Teacher::findOrFail($teacherId);

    //     // Check if the teacher teaches the specified subject
    //     if ($teacher->{$subject} !== $subject) {
    //         // Subject not taught by the teacher
    //         return response()->json(['error' => 'Teacher does not teach this subject'], 400);
    //     }

    //     // Find the student by roll number
    //     $student = Student::where('roll_no', $studentRollNo)->first();

    //     if (!$student) {
    //         // Student not found
    //         return response()->json(['error' => 'Student not found'], 404);
    //     }

    //     // Create or update attendance record
    //     $attendance = Attendance::updateOrCreate(
    //         [
    //             'teacher_id' => $teacherId,
    //             'student_id' => $student->id,
    //             'subject' => $subject,
    //             'date' => $date,
    //         ],
    //         ['status' => $status]
    //     );

    //     return response()->json($attendance, 200);
    // }

    // total class count in a particular subjeact


    public function getTotalClassesBySubjectForLoggedInTeacher()
    {
        // Get the currently logged-in teacher's ID
        $teacherId = Auth::user()->teacher_id;

        $teacher = Teacher::where('teacher_id', $teacherId)->firstOrFail();
        // Find the teacher
        // $teacher = Teacher::findOrFail();

        // Initialize an array to store the total classes for each subject
        $totalClassesBySubject = [];

        // Loop through each subject column in the teacher table
        for ($i = 1; $i <= 4; $i++) {
            $subject = $teacher["subject_$i"];

            // If the subject is not empty
            if (!empty($subject)) {
                // Count the number of unique dates for the subject
                $totalClasses = Attendance::where('teacher_id', $teacherId)
                    ->where('subject', $subject)
                    ->distinct('date')
                    ->count('date');

                // Store the total classes count for the subject
                $totalClassesBySubject[$subject] = $totalClasses;
            }
        }

        return $totalClassesBySubject;
    }


    // Mark attendance by logedin teacher

    // public function markAttendanceForLoggedInTeacher(Request $request)
    // {
    //     // Validate the incoming request data
    //     $validatedData = $request->validate([
    //         'subject' => 'required|string',
    //         'date' => 'required|date',
    //         'studentRollNo' => 'required|string',
    //         'status' => 'required|string|in:present,absent,late',
    //     ]);

    //     // Get the currently logged-in teacher's ID
    //     $teacherId = Auth::id();

    //     // Find the teacher
    //     $teacher = Teacher::findOrFail($teacherId);

    //     // Check if the teacher teaches the specified subject
    //     if (!in_array($validatedData['subject'], [$teacher->subject_1, $teacher->subject_2, $teacher->subject_3, $teacher->subject_4])) {
    //         // Subject not taught by the teacher
    //         return response()->json(['error' => 'Teacher does not teach this subject'], 400);
    //     }

    //     // Find the student by roll number
    //     $student = Student::where('roll_no', $validatedData['studentRollNo'])->first();

    //     if (!$student) {
    //         // Student not found
    //         return response()->json(['error' => 'Student not found'], 404);
    //     }

    //     // Create or update attendance record
    //     $attendance = Attendance::updateOrCreate(
    //         [
    //             'teacher_id' => $teacherId,
    //             'student_id' => $student->id,
    //             'subject' => $validatedData['subject'],
    //             'date' => $validatedData['date'],
    //         ],
    //         ['status' => $validatedData['status']]
    //     );

    //     return response()->json($attendance, 200);
    // }


    public function totalclasstaken()
    {
        $result = $this->getTotalClassesBySubjectForLoggedInTeacher();
        return view('teacher.subject.totalclass', ['class' => $result]);
    }




    public function getStudentsBySubject(Request $request)
    {
        // Get the currently logged-in teacher's ID
        $teacherId = Auth::user()->teacher_id;

        // Get the four subjects taught by the logged-in teacher
        // $teacher = Teacher::findOrFail($teacherId);
        $teacher = Teacher::where('teacher_id', $teacherId)->firstOrFail();

        $teacherSubjects = [
            $teacher->subject_1,
            $teacher->subject_2,
            $teacher->subject_3,
            $teacher->subject_4
        ];

        // Check if a subject is selected in the form
        $selectedSubject = $request->input('subject');

        // Fetch students based on the selected subject
        $students = [];
        if ($selectedSubject) {
            $students = Student::where("subject_1", $selectedSubject)
                ->orWhere("subject_2", $selectedSubject)
                ->orWhere("subject_3", $selectedSubject)
                ->orWhere("subject_4", $selectedSubject)
                ->orWhere("subject_5", $selectedSubject)
                ->orWhere("subject_6", $selectedSubject)
                ->orWhere("subject_7", $selectedSubject)
                ->get();
        }

        foreach ($students as $student) {
            $attendanceRecords = Attendance::where('student_rollno', $student->roll_no)
                ->where('subject', $selectedSubject)
                ->get();

            $totalClasses = $attendanceRecords->count();
            $attendedClasses = $attendanceRecords->where('status', 'present')->count();

            if ($totalClasses > 0) {
                // Calculate attendance percentage
                $attendancePercentage = ($attendedClasses / $totalClasses) * 100;
            } else {
                // If no classes held, set attendance percentage to 0
                $attendancePercentage = 0;
            }

            $student->attendancePercentage = $attendancePercentage;
        }




        $teacherSubjects=array_filter($teacherSubjects);
        $teacherSubjects = array_values(array_unique($teacherSubjects));


        return view('teacher.student.studentlist', [
            'teacherSubjects' => $teacherSubjects,
            'selectedSubject' => $selectedSubject,
            'students' => $students
        ]);
    }
}
