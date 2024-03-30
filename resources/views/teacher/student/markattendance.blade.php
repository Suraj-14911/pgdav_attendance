@extends('teacher.layouts.master')

@section('content')

<div class="container">
    <h1>Attendance Management</h1>

    <!-- Mark Attendance Form -->
    <form action="{{ route('attendance.mark') }}" method="POST">
        @csrf
        <label for="date">Select Date for Marking Attendance:</label>
        <input type="date" id="date" name="date" required>

        <table>
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Attendance</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through students -->
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td><input type="checkbox" name="students[]" value="{{ $student->id }}"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <input type="submit" value="Mark Attendance">
    </form>

    <!-- Update Attendance Form -->
    <form action="{{ route('attendance.update') }}" method="POST">
        @csrf
        <label for="update_date">Select Date for Updating Attendance:</label>
        <input type="date" id="update_date" name="update_date" required>

        <table>
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Attendance Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through attendance records -->
                @foreach ($attendanceRecords as $record)
                    <tr>
                        <td>{{ $record->student_id }}</td>
                        <td>{{ $record->student->name }}</td>
                        <td>
                            <select name="attendance_status[]">
                                <option value="present" {{ $record->status == 'present' ? 'selected' : '' }}>Present</option>
                                <option value="absent" {{ $record->status == 'absent' ? 'selected' : '' }}>Absent</option>
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <input type="submit" value="Update Attendance">
    </form>

    <!-- Date Selection Form -->
    <form action="{{ route('attendance.show') }}" method="GET">
        <label for="show_date">Select Date to View Attendance:</label>
        <input type="date" id="show_date" name="show_date" required>
        <input type="submit" value="Show Attendance">
    </form>

    @if (session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif
</div>

@endsection
