@extends('teacher.layouts.master')

@section('content')

<style>
    .table-container {
        overflow-x: auto;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
    th {
        background-color: #f2f2f2;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #ddd;
    }
</style>
    <section class="section">
        <div class="section-header">
            <h1>Student Lists:</h1>
        </div>
        <form method="GET" href="{{ route('teacher.enrolledstudent') }}" class="needs-validation" novalidate="">
            <div class="card-header">
                <h4>Select Subject:</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <select name="subject" class="form-control" id="subject">
                            <option value="">Select a Subject</option>
                            @foreach ($teacherSubjects as $subject)
                                <option value="{{ $subject }}">{{ $subject }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-primary">Get Students</button>
            </div>
        </form>


        <h2>Students Enrolled in {{ $selectedSubject }}</h2>

        <div class="table-container">
            @if ($students && $students->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Roll No</th>
                        <th>University Roll No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Section</th>
                        <th>Attendance Percentage</th>
                        {{-- <th>Subject 1</th>
                        <th>Subject 2</th>
                        <th>Subject 3</th>
                        <th>Subject 4</th>
                        <th>Subject 5</th>
                        <th>Subject 6</th>
                        <th>Subject 7</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->roll_no }}</td>
                        <td>{{ $student->university_rollno }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->course }}</td>
                        <td>{{ $student->section }}</td>
                        <td>{{ $student->attendancePercentage}}
                        {{-- <td>{{ $student->subject_1 }}</td>
                        <td>{{ $student->subject_2 }}</td>
                        <td>{{ $student->subject_3 }}</td>
                        <td>{{ $student->subject_4 }}</td>
                        <td>{{ $student->subject_5 }}</td>
                        <td>{{ $student->subject_6 }}</td>
                        <td>{{ $student->subject_7 }}</td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p>No students found for the selected subject.</p>
            @endif
        </div>

    </section>


@endsection
