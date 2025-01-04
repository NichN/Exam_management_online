<div class="side-menu">
    <div class="logo">
        <img src="/Image/norton.png" alt="Logo">
    </div>
    <ul class="menu-list">
        <li class="menu-item {{ request()->is('student/dashboard') ? 'active' : '' }}">
            <a href="{{ route('Student.dashboard') }}">
                <i class="fas fa-home"></i> Dashboard
            </a>
        </li>
        <li class="menu-item {{ request()->is('student/department') ? 'active' : '' }}">
            <a href="{{ route('Student.department') }}">
                <i class="fas fa-building"></i> Department
            </a>
        </li>
        <li class="menu-item {{ request()->is('student/student') ? 'active' : '' }}">
            <a href="{{ route('Student.student') }}">
                <i class="fas fa-user-graduate"></i> Student
            </a>
        </li>
        <li class="menu-item {{ request()->is('student/all-task') ? 'active' : '' }}">
            <a href="{{ route('Student.all_task') }}">
                <i class="fas fa-tasks"></i> All Task
            </a>
        </li>
        <li class="menu-item {{ request()->is('student/my-schedule') ? 'active' : '' }}">
            <a href="{{ route('Student.my_schedule') }}">
                <i class="fas fa-clock"></i> My Schedule
            </a>
        </li>
    </ul>
    <div class="logout">
        <a href="#">
            <i class="fas fa-sign-out-alt"></i> Log out
        </a>
    </div>
</div>

<div class="container">
    <div class="header">
        <div class="header-icons">
            <div class="notification">
                <i class="fa fa-bell"></i>
                <span class="notification-badge"></span>
            </div>
            <div class="user-profile">
                <i class="fa fa-user-circle"></i>
                <span class="user-name">Sun Nasy</span>
            </div>
        </div>
    </div>
</div>