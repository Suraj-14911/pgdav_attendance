<?php

namespace App\Http\Controllers\teacher;

use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttendanceController extends Controller
{
    //

    public function markAttendanceForm(){
        return view('teacher.student.markattendance');
    }

    public function markAttendance(Request $request)
    {
        // Validate the form data
        $request->validate([
            'date' => 'required|date',
            'students' => 'required|array',
            'students.*' => 'exists:students,id',
        ]);

        // Get the teacher's ID (you may need to adjust this based on your authentication logic)
        $teacherId = auth()->user()->id;

        // Mark attendance for selected students
        foreach ($request->input('students') as $studentId) {
            Attendance::create([
                'student_id' => $studentId,
                'teacher_id' => $teacherId,
                'date' => $request->input('date'),
                'status' => 'present', // You may adjust this based on the form input
            ]);
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Attendance marked successfully.');
    }

    // public function updateAttendance(Request $request)
    // {
    //     // Validate the form data
    //     $request->validate([
    //         'update_date' => 'required|date',
    //         'attendance_status' => 'required|array',
    //         'attendance_status.*' => 'in:present,absent',
    //     ]);

    //     // Get the teacher's ID (you may need to adjust this based on your authentication logic)
    //     $teacherId = auth()->user()->id;

    //     // Update attendance for selected students
    //     foreach ($request->input('attendance_status') as $key => $status) {
    //         $attendanceRecord = Attendance::findOrFail($key);
    //         $attendanceRecord->status = $status;
    //         $attendanceRecord->save();
    //     }

    //     // Redirect back with a success message
    //     return redirect()->back()->with('success', 'Attendance updated successfully.');
    // }

    // public function showAttendance(Request $request)
    // {
    //     // Retrieve attendance records for the selected date
    //     $date = $request->input('show_date');
    //     $attendanceRecords = Attendance::where('date', $date)->get();

    //     // You can pass $attendanceRecords to the view for display

    //     // For example:
    //     return view('attendance.show', compact('attendanceRecords'));
    // }
}
