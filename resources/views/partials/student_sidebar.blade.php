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
                <i class="fas fa-building"></i> Subject
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
        <a href="#" id="logout-btn">
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
<script>
    if(localStorage.getItem('authToken')){
        console.log('User is logged in');
    }
    else {
        console.log('User is not logged in');
    }

    document.getElementById('logout-btn').addEventListener('click', function (e) {
        e.preventDefault(); 
        localStorage.removeItem('authToken');
        
        const token = localStorage.getItem('authToken');
        if (token) {
            fetch('http://127.0.0.1:8000/api/logout', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`,
                },
            })
            .then(response => response.json())
            .then(data => {
                console.log('Logged out:', data);
                alert('You have successfully logged out!');
            })
            .catch(error => {
                console.error('Error logging out:', error);
            });
        } else {
            console.error('No token found for logout!');
        }
        window.location.href = '/login';
    });
</script>
