<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Detail</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/student_detail.css') }}">
    <script src="{{ asset('/js/menu.js') }}"></script>
    <script src="{{ asset('/js/student_detail.js') }}"></script>


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
        <!-- Statistics Section
        <div class="statistics">
            <h3>Quiz</h3>
            <div class="stat-card">
                <p>Total Quizzes: <strong>15</strong></p>
                <p>Attempted: <strong>10</strong></p>
                <p class="success">Passed: 25</p>
                <p class="failure">Failed: 25</p>
                <button class="view-btn">View Details</button>
            </div>
            <h3>Exams</h3>
            <div class="stat-card">                
                <p>Total Exams: <strong>15</strong></p>
                <p>Attempted: <strong>10</strong></p>
                <p class="success">Passed: 25</p>
                <p class="failure">Failed: 25</p>
                <button class="view-btn">View Details</button>
            </div>
            <h3>Assignment</h3>
            <div class="stat-card">               
                <p>Total Assignments: <strong>15</strong></p>
                <p>Attempted: <strong>12</strong></p>
                <p class="success">Passed: 25</p>
                <p class="failure">Failed: 25</p>
                <button class="view-btn">View Details</button>
            </div>
        </div>
    </div> -->
<dive class="student-detail-container">
    <div class="student-profile">
        <!-- Profile Header -->
        <div class="profile-header">
            <div class="profile-details">
                <div class="header-with-back">
                    <a href="/admin/student" class="back-btn">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <h2>Student Profile</h2>
                </div>
                <div class="profile-card">
                    <img src="/Image/student_profile.png" alt="Profile Picture" class="profile-pic">
                    <div class="profile-info">
                        <p><strong>Nich</strong></p>
                        <p>Student ID: B02223119</p>
                        <p>Gender: Female</p>
                    </div>
                </div>
                <div class="additional-info">
                    <p><strong>Course:</strong> COM-24</p>
                    <p><strong>Class:</strong> ES1</p>
                </div>
            </div>
            <div class="spacer"></div>
            <div class="contact-card">
                <h3>Center Contact</h3>
                <p><strong>Phone:</strong> 12345 69870</p>
                <p><strong>Email:</strong> hanumangar.center@tips.in</p>
            </div>
        </div>

    <div class="task-tabs-container">
        <div class="task-tabs">
            <a class="task-tab active" onclick="setActiveTab(this)" data-class="Quiz">Quiz</a>
            <a class="task-tab" onclick="setActiveTab(this)" data-class="Exams">Exams</a>
            <a class="task-tab" onclick="setActiveTab(this)" data-class="Assignment">Assignment</a>
        </div>
    </div>

    <div id="Quiz" class="task-container active">
        <div class="tasks-container">
            <div class="card">
                <h3>Quiz Chapter1 in Semester 1</h3>
                <p><strong>Major:</strong>Web Development </p>
                <div class="details">
                    <p>
                        <i class="fas fa-calendar-alt batch-icon"></i> 2025-01-01
                        <i class="fas fa-clock batch-icon"></i> 2:00 PM - 3:30 PM
                    </p>
                </div>
                <button class="view-details">                   
                    <a href="/admin/student/task/detail">View Details</a>                
                </button>
            </div>
            <div class="card">
                <h3>Quiz Chapter1 in Semester 1</h3>
                <p><strong>Major:</strong>Web Development </p>
                <div class="details">
                    <p>
                        <i class="fas fa-calendar-alt batch-icon"></i> 2025-01-01
                        <i class="fas fa-clock batch-icon"></i> 2:00 PM - 3:30 PM
                    </p>
                </div>
                <button class="view-details">                   
                    <a href="/admin/student/task/detail">View Details</a>                
                </button>
            </div>
            <div class="card">
                <h3>Quiz Chapter1 in Semester 1</h3>
                <p><strong>Major:</strong>Web Development </p>
                <div class="details">
                    <p>
                        <i class="fas fa-calendar-alt batch-icon"></i> 2025-01-01
                        <i class="fas fa-clock batch-icon"></i> 2:00 PM - 3:30 PM
                    </p>
                </div>
                <button class="view-details">                   
                    <a href="/admin/student/task/detail">View Details</a>                
                </button>
            </div>
    </div>
    </div>
    <div id="Exams" class="task-container">
        <div class="tasks-container">
            <div class="card">
                <h3>Exam Chapter1 in Semester 1</h3>
                <p><strong>Major:</strong>Web Development </p>
                <div class="details">
                    <p>
                        <i class="fas fa-calendar-alt batch-icon"></i> 2025-01-01
                        <i class="fas fa-clock batch-icon"></i> 2:00 PM - 3:30 PM
                    </p>
                </div>
                <button class="view-details">                   
                    <a href="/admin/student/task/detail">View Details</a>                
                </button>
            </div>
            <div class="card">
                <h3>Exam Chapter1 in Semester 1</h3>
                <p><strong>Major:</strong>Web Development </p>
                <div class="details">
                    <p>
                        <i class="fas fa-calendar-alt batch-icon"></i> 2025-01-01
                        <i class="fas fa-clock batch-icon"></i> 2:00 PM - 3:30 PM
                    </p>
                </div>
                <button class="view-details">                   
                    <a href="/admin/student/task/detail">View Details</a>                
                </button>
            </div>
            <div class="card">
                <h3>Exam Chapter1 in Semester 1</h3>
                <p><strong>Major:</strong>Web Development </p>
                <div class="details">
                    <p>
                        <i class="fas fa-calendar-alt batch-icon"></i> 2025-01-01
                        <i class="fas fa-clock batch-icon"></i> 2:00 PM - 3:30 PM
                    </p>
                </div>
                <button class="view-details">                   
                    <a href="/admin/student/task/detail">View Details</a>
                </button>
            </div>
        </div>
    </div>

    <div id="Assignment" class="task-container">
        <div class="tasks-container">
            <div class="card">
                <h3>Assignment Chapter1 in Semester 1</h3>
                <p><strong>Major:</strong>Web Development </p>
                    <div class="details">
                        <p>
                            <i class="fas fa-calendar-alt batch-icon"></i> 2025-01-01
                            <i class="fas fa-clock batch-icon"></i> 2:00 PM - 3:30 PM
                        </p>
                </div>
                <button class="view-details">                   
                    <a href="/admin/student/task/detail">View Details</a>
                </button>
            </div>
        </div>
    </div>
</dive>
 </body>
 </html>