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
        <li class="menu-item {{ request()->is('student/subject') ? 'active' : '' }}">
            <a href="{{ route('Student.subject') }}">
                <i class="fas fa-building"></i> Suject
            </a>
        </li>
        <li class="menu-item {{ request()->is('student/exam') ? 'active' : '' }}">
            <a href="{{ route('Student.exams') }}">
                <i class="fas fa-user-graduate"></i> Exam
            </a>
        </li>
        <li class="menu-item {{ request()->is('student/history-exam') ? 'active' : '' }}">
            <a href="{{ route('Student.history_exam') }}">
                <i class="fas fa-user-graduate"></i> History Exam
            </a>
        </li>
        <li class="menu-item {{ request()->is('student/result') ? 'active' : '' }}">
            <a href="{{ route('Student.result') }}">
                <i class="fas fa-tasks"></i> Result
            </a>
        </li>
        <li class="menu-item {{ request()->is('student/student') ? 'active' : '' }}">
            <a href="{{ route('Student.student') }}">
                <i class="fas fa-clock"></i> Profile
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