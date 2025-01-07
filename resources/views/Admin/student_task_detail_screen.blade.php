<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Student Task Details</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/student_task_detail.css') }}">
    <script src="{{ asset('/js/menu.js') }}"></script>
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

<div class="student-taskdetail-container">
    <div class="detail-header">
        <div class="header-with-back">
            <a href="/admin/student/detail" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                <h2>Back</h2>
            </a>
        </div>
    </div>    
    <hr class="divider">
    <div class="profile-details">
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
        <h3>Testing Chapter1 in Semester 1</h3>
        <div class="info">
            <p><strong>Batch:</strong> COM-24</p>
            <p><i class="fas fa-clock"></i> 12:40 PM</p>
            <p><i class="fas fa-calendar-alt"></i> 03 Jan 2023</p>
            <p class="status pass">Status: Pass</p>
        </div>
        <div class="details">
            <p><strong>Total Marks:</strong> 50</p>
            <div class="question-paper">
                <strong>Question Paper:</strong>
                <a href="#" download>Testing1 Question Paper.pdf</a>
            </div>
        </div>
        <div class="result">
            <h4>Result</h4>
            <p><strong>Student's Score:</strong></p>
            <p class="score">32/50</p>
        </div>
</div>
</body>
</html>
