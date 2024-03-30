<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\teacher\AttendanceController;
use App\Http\Controllers\admin\AdminStudentController;
use App\Http\Controllers\admin\AdminTeacherController;
use App\Http\Controllers\admin\AdminUserController;
use App\Http\Controllers\admin\StudentImportExportController;
use App\Http\Controllers\student\StudentController;
use App\Http\Controllers\teacher\TeacherController;

Route::get('/', function () {
    return view('home');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Admin Routes
Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    // Add Student
    Route::get('admin/student/create', [AdminStudentController::class, 'index'])->name('admin.student.create');
    Route::post('admin/student', [AdminStudentController::class, 'store'])->name('admin.student.store');
    // Add Student end

    Route::get('admin/teacher/create', [AdminTeacherController::class, 'index'])->name('admin.teacher.create');
    Route::post('admin/teacher', [AdminTeacherController::class, 'store'])->name('admin.teacher.store');

    Route::get('admin/user/create', [AdminUserController::class, 'index'])->name('admin.user.create');
    Route::post('admin/user', [AdminUserController::class, 'store'])->name('admin.user.store');

    Route::get('admin/studentimport', [AdminStudentController::class, 'showimportform'])->name('admin.student.importform');
    Route::post('admin/studentimport', [AdminStudentController::class, 'importstudent'])->name('admin.student.import');
});

// Student Routes
Route::group(['middleware' => ['auth', 'student']], function () {

    Route::get('student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::get('student/profile', [StudentController::class, 'profile'])->name('student.profile');
});

// Teacher Routes
Route::group(['middleware' => ['auth', 'teacher']], function () {

    Route::get('teacher/dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
    Route::get('teacher/profile', [TeacherController::class, 'profile'])->name('teacher.profile');
    Route::get('teacher/classtaken', [TeacherController::class, 'totalclasstaken'])->name('teacher.classtaken');
    Route::get('teacher/studentlist', [TeacherController::class, 'getStudentsBySubject'])->name('teacher.enrolledstudent');

    // Attendance Routes
    Route::get('teacher/attendance/mark', [AttendanceController::class, 'markAttendanceForm'])->name('teacher.attendancemark.form');

    // Route for handling the submission of marking attendance
    Route::post('teacher/attendance/mark', [AttendanceController::class, 'markAttendance'])->name('attendance.mark');

    // Route for displaying the form to update attendance
    Route::get('teacher/attendance/update', [AttendanceController::class, 'showUpdateAttendanceForm'])->name('attendance.update.form');

    // Route for handling the submission of updating attendance
    Route::post('teacher/attendance/update', [AttendanceController::class, 'updateAttendance'])->name('attendance.update');

    // Route for displaying the form to view attendance records
    Route::get('teacher/attendance/show', [AttendanceController::class, 'showAttendanceForm'])->name('attendance.show.form');
});
