<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/student.css') }}">
    
    <script src="{{ asset('/js/menu.js') }}"></script>
    <script src="{{ asset('/js/student.js') }}"></script>
</head>
<body>
<div class="container">
        @include('partials.admin_sidebar')
</div>
<!-- <div class="side-menu">
    <div class="logo">
    <img src="/Image/norton.png" alt="Logo">
    </div>
    <ul class="menu-list">
    <li class="menu-item" onclick="setActive(this)">
        <a href="/admin/dashboard">
            <i class="fas fa-home"></i> Dashboard
        </a>        
    </li>
    <li class="menu-item" onclick="setActive(this)">
        <a href="/admin/department">
            <i class="fas fa-building"></i> Department
        </a> 
    </li>
    <li class="menu-item" onclick="setActive(this)">
        <a href="/admin/student">
            <i class="fas fa-user-graduate"></i> Student
        </a>    
    </li>
    <li class="menu-item" onclick="setActive(this)">
        <a href="/admin/alltask">
            <i class="fas fa-tasks"></i> All Task
        </a>    
    </li>
    <li class="menu-item" onclick="setActive(this)">
        <a href="/admin/myschedule">
            <i class="fas fa-clock"></i> My Schedule
        </a>
    </li>
</ul>

<div class="logout">
        <i class="fas fa-sign-out-alt"></i> Log out
    </div>
</div> -->

<!-- <div class="container">
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
</div> -->

 <div class="container">
        <h2>My Student</h2>
        <div class="tabs-container">
            <div class="tabs">
                <a class="tab active" onclick="setActiveTab(this)" data-class="All">All</a>
                <a class="tab" onclick="setActiveTab(this)" data-class="ES1">ES1</a>
                <a class="tab" onclick="setActiveTab(this)" data-class="ES2">ES2</a>
            </div>
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search..." oninput="filterStudents(this)">
            </div>
        </div>
    </div>

    <div class="student-list-container">
        <div class="student-container" id="ES1">
            <div class="student-header">
                <h4 class="class">ES1</h4>
                <a href="#" class="view-all">View All</a>
            </div>
            <div class="student-list">
                <div class="student-item">
                    <img src="/Image/avatar.png" alt="Avatar" class="avatar">
                    <span class="name">Keo Sovanlogdy</span>
                    <span class="class">ES1</span>
                    <span class="id">B20223119</span>
                    <span class="year">COM_24</span>
                    <button class="view-btn">
                        <a href="/admin/student/detail">View</a>
                    </button>
                </div>
                <div class="student-item">
                    <img src="/Image/avatar.png" alt="Avatar" class="avatar">
                    <span class="name">Keo Sovanlogdy</span>
                    <span class="class">ES1</span>
                    <span class="id">B20223119</span>
                    <span class="year">COM_24</span>
                    <button class="view-btn">                        
                        <a href="/admin/student/detail">View</a>
                    </button>
                </div>
                <div class="student-item">
                    <img src="/Image/avatar.png" alt="Avatar" class="avatar">
                    <span class="name">Keo Sovanlogdy</span>
                    <span class="class">ES1</span>
                    <span class="id">B20223119</span>
                    <span class="year">COM_24</span>
                    <button class="view-btn">                        
                        <a href="/admin/student/detail">View</a>
                    </button>                </div>
                <div class="student-item">
                    <img src="/Image/avatar.png" alt="Avatar" class="avatar">
                    <span class="name">Keo Sovanlogdy</span>
                    <span class="class">ES1</span>
                    <span class="id">B20223119</span>
                    <span class="year">COM_24</span>
                    <button class="view-btn">                        
                        <a href="/admin/student/detail">View</a>
                    </button>                </div>
                <div class="student-item">
                    <img src="/Image/avatar.png" alt="Avatar" class="avatar">
                    <span class="name">Keo Sovanlogdy</span>
                    <span class="class">ES1</span>
                    <span class="id">B20223119</span>
                    <span class="year">COM_24</span>
                    <button class="view-btn">                        
                        <a href="/admin/student/detail">View</a>
                    </button>                </div>
             </div>
        </div>

        <div class="student-container hidden" id="ES2">
            <div class="student-header">
                <h4 class="class">ES2</h4>
                <a href="#" class="view-all">View All</a>
            </div>
            <div class="student-list">
                <div class="student-item">
                    <img src="/Image/avatar.png" alt="Avatar" class="avatar">
                    <span class="name">Keo Sovanlogdy</span>
                    <span class="class">ES2</span>
                    <span class="id">B20223120</span>
                    <span class="year">COM_24</span>
                    <button class="view-btn">                        
                        <a href="/admin/student/detail">View</a>
                    </button>                </div>
                <div class="student-item">
                    <img src="/Image/avatar.png" alt="Avatar" class="avatar">
                    <span class="name">Keo Sovanlogdy</span>
                    <span class="class">ES2</span>
                    <span class="id">B20223120</span>
                    <span class="year">COM_24</span>
                    <button class="view-btn">                        
                        <a href="/admin/student/detail">View</a>
                    </button>                </div>
                <div class="student-item">
                    <img src="/Image/avatar.png" alt="Avatar" class="avatar">
                    <span class="name">Keo Sovanlogdy</span>
                    <span class="class">ES2</span>
                    <span class="id">B20223120</span>
                    <span class="year">COM_24</span>
                    <button class="view-btn">                        
                        <a href="/admin/student/detail">View</a>
                    </button>
                </div>
                <div class="student-item">
                    <img src="/Image/avatar.png" alt="Avatar" class="avatar">
                    <span class="name">Keo Sovanlogdy</span>
                    <span class="class">ES2</span>
                    <span class="id">B20223120</span>
                    <span class="year">COM_24</span>
                    <button class="view-btn">                        
                        <a href="/admin/student/detail">View</a>
                    </button>                </div>
                <div class="student-item">
                    <img src="/Image/avatar.png" alt="Avatar" class="avatar">
                    <span class="name">Keo Sovanlogdy</span>
                    <span class="class">ES2</span>
                    <span class="id">B20223120</span>
                    <span class="year">COM_24</span>
                    <button class="view-btn">                        
                        <a href="/admin/student/detail">View</a>
                    </button>                </div>
            </div>
        </div>
    </div>

 </body>
 </html>