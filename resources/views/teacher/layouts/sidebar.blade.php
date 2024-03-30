

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">{{ Auth::user()->name }}</a>
        </div>
        <ul class="sidebar-menu ">
            <li class="dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>MAIN</span></a>
                <ul class="dropdown-menu">
            </li>
            <li><a class="nav-link" href="{{ route('teacher.dashboard') }}">DASHBOARD</a></li>
            <li><a class="nav-link" href="{{ route('teacher.classtaken') }}">Classes Taken</a></li>
            <li><a class="nav-link" href="{{ route('teacher.enrolledstudent') }}">Student List</a></li>
            <li><a class="nav-link" href="{{ route('teacher.attendancemark.form') }}">Mark Attendance</a></li>
        </ul>

    </aside>
</div>
