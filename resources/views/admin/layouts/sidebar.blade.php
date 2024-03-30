

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">{{ Auth::user()->name }}</a>
        </div>
        {{-- <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div> --}}
        <ul class="sidebar-menu ">
            <li class="dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>MAIN</span></a>
                <ul class="dropdown-menu">
            </li>

            <li><a class="nav-link" href="{{ route('admin.dashboard') }}">DASHBOARD</a></li>
            <li><a class="nav-link" href="{{ route('admin.user.create') }}">ADD USER</a></li>
            <li><a class="nav-link" href="{{ route('admin.student.create') }}">ADD STUDENT</a></li>
            <li><a class="nav-link" href="{{ route('admin.student.importform') }}">UPLOAD STUDENT DATA</a></li>
            <li><a class="nav-link" href="{{ route('admin.teacher.create') }}">ADD TEACHER</a></li>
            <li><a class="nav-link" href="{{ route('admin.dashboard') }}">UPLOAD TEACHER LIST</a></li>
        </ul>

    </aside>
</div>
