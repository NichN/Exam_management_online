<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('/css/dashboard.css') }}">
    <script src="{{ asset('/js/menu.js') }}"></script>
</head>
<body>
<div class="side-menu">
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

    <div class="cards-container">
        <!-- Card 1 -->
        <div class="total-students">
             <div class="icon-container" style="background-color: #2e7d32;">
                <i class="fas fa-home"></i>
            </div>
            <div class="details">
                <div>
                    <span class="title">Total</span>
                    <span class="subtitle">Student</span>
                </div>
                <div class="number">120</div>
                <div class="semester">Semester1, Year4</div>
            </div>
        </div>

        <div class="total-students">
            <div class="icon-container" style="background-color: #e57373;">
                <i class="fas fa-home"></i>
            </div>
            <div class="details">
                <div>
                    <span class="title">Class</span>
                    <span class="subtitle">ES1</span>
                </div>
                <div class="semester">Semester1, Year4</div>
            </div>
        </div>

            <!-- Card 3 -->
        <div class="total-students">
            <div class="icon-container" style="background-color: #e57373;">
                <i class="fas fa-home"></i>
            </div>
            <div class="details">
                <div>
                    <span class="title">Class</span>
                    <span class="subtitle">ES2</span>
                </div>
                <div class="semester">Semester1, Year4</div>
            </div>
        </div>

            <!-- Card 4 -->
        <div class="total-students">
            <div class="icon-container" style="background-color: #3949ab;">
                <i class="fas fa-calendar"></i>
            </div>
            <div class="details">
                <div>
                    <span class="title">Homework</span>
                    <span class="subtitle">Due Today</span>
                </div>
                <div class="number">2</div>
            </div>
        </div>

            <!-- Card 5 -->
        <div class="total-students">
            <div class="icon-container" style="background-color: #3949ab;">
                <i class="fas fa-calendar"></i>
            </div>
            <div class="details">
                <div>
                    <span class="title">Homework</span>
                    <span class="subtitle">Overdue</span>
                </div>
                <div class="number">3</div>
            </div>
        </div>

            <!-- Card 6 -->
        <div class="total-students">
            <div class="icon-container" style="background-color: #3949ab;">
                <i class="fas fa-clipboard"></i>
            </div>
            <div class="details">
                <div>
                    <span class="title">Homework</span>
                    <span class="subtitle">Total</span>
                </div>
                <div class="number">10</div>
            </div>
        </div>
    </div>
    <div class="homework-container">
    <div class="homework-header">
        <h2>Submitted Homework</h2>
        <a href="#" class="view-all">View All</a>
    </div>
    <div class="homework-list">
        <div class="homework-item">
            <img src="/Image/avatar.png" alt="Avatar" class="avatar">
            <span class="name">Keo Sovanlogdy</span>
            <span class="class">ES1</span>
            <span class="assignment">Name Assignment</span>
            <span class="status submitted">Submitted</span>
            <span class="date">22-11-2024</span>
            <button class="view-btn">View</button>
        </div>
        <div class="homework-item">
        <img src="/Image/avatar.png" alt="Avatar" class="avatar">
        <span class="name">Keo Sovanlogdy</span>
            <span class="class">ES2</span>
            <span class="assignment">Name Assignment</span>
            <span class="status submitted">Submitted</span>
            <span class="date">22-11-2024</span>
            <button class="view-btn">View</button>
        </div>
        <div class="homework-item">
            <img src="/Image/avatar.png" alt="Avatar" class="avatar">
            <span class="name">Keo Sovanlogdy</span>
            <span class="class">ES1</span>
            <span class="assignment">Name Assignment</span>
            <span class="status submitted">Submitted</span>
            <span class="date">22-11-2024</span>
            <button class="view-btn">View</button>
        </div>
        <div class="homework-item">
        <img src="/Image/avatar.png" alt="Avatar" class="avatar">
        <span class="name">Keo Sovanlogdy</span>
            <span class="class">ES2</span>
            <span class="assignment">Name Assignment</span>
            <span class="status submitted">Submitted</span>
            <span class="date">22-11-2024</span>
            <button class="view-btn">View</button>
        </div>
    </div>
</div>

</body>
</html>
