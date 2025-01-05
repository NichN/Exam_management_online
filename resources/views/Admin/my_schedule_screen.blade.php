<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Schedule</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/myschedule.css') }}">
    <script src="{{ asset('/js/menu.js') }}"></script>
    <script src="{{ asset('/js/myschedule.js') }}"></script>
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
    <div class="header-with-button">
        <h2>Schedule Task</h2>
        <button class="add-task-btn" onclick="addNewTask()">+ Add New Task</button>
    </div>
    <hr class="divider">
    <div class="task-tabs-container">
        <div class="task-tabs">
            <a class="task-tab active" onclick="setActiveTab(this)" data-class="All Tasks">All Tasks</a>
            <a class="task-tab" onclick="setActiveTab(this)" data-class="DueToday">Due Today</a>
            <a class="task-tab" onclick="setActiveTab(this)" data-class="Overdue">Overdue</a>
        </div>
    </div>

    <div id="All Tasks" class="task-container active">
        <div class="tasks-container">
            <!-- Tasks dynamically included here -->
        </div>
    </div>
    <div id="DueToday" class="task-container">
        <div class="tasks-container">
            <!-- Example Due Today Task -->
            <div class="card">
                <h3>Testing Chapter1 in Semester 1</h3>
                <p><strong>Major:</strong>Web Development </p>
                <div class="details">
                    <p>
                        <i class="fas fa-calendar-alt batch-icon"></i> 2025-01-01
                        <i class="fas fa-clock batch-icon"></i> 2:00 PM - 3:30 PM
                    </p>
                </div>
                <button class="view-details">View Details</button>
            </div>
            <div class="card">
                <h3>Testing Chapter1 in Semester 1</h3>
                <p><strong>Major:</strong>Web Development </p>
                <div class="details">
                    <p>
                        <i class="fas fa-calendar-alt batch-icon"></i> 2025-01-01
                        <i class="fas fa-clock batch-icon"></i> 2:00 PM - 3:30 PM
                    </p>
                </div>
                <button class="view-details">View Details</button>
            </div>
            <div class="card">
                <h3>Testing Chapter1 in Semester 1</h3>
                <p><strong>Major:</strong>Web Development </p>
                <div class="details">
                    <p>
                        <i class="fas fa-calendar-alt batch-icon"></i> 2025-01-01
                        <i class="fas fa-clock batch-icon"></i> 2:00 PM - 3:30 PM
                    </p>
                </div>
                <button class="view-details">View Details</button>
            </div>
        </div>
    </div>

    <div id="Overdue" class="task-container">
        <div class="tasks-container">
            <!-- Example Overdue task -->
            <div class="card">
                <h3>Testing Chapter1 in Semester 1</h3>
                <p><strong>Major:</strong>Web Development </p>
                    <div class="details">
                        <p>
                            <i class="fas fa-calendar-alt batch-icon"></i> 2025-01-01
                            <i class="fas fa-clock batch-icon"></i> 2:00 PM - 3:30 PM
                        </p>
                </div>
                <button class="view-details">View Details</button>
            </div>
            <div class="card">
                <h3>Testing Chapter1 in Semester 1</h3>
                    <p><strong>Major:</strong>Web Development </p>
                    <div class="details">
                        <p>
                            <i class="fas fa-calendar-alt batch-icon"></i> 2025-01-01
                            <i class="fas fa-clock batch-icon"></i> 2:00 PM - 3:30 PM
                        </p>
                    </div>
                    <button class="view-details">View Details</button>
            </div>
                <div class="card">
                    <h3>Testing Chapter1 in Semester 1</h3>
                    <p><strong>Major:</strong>Web Development </p>
                    <div class="details">
                        <p>
                            <i class="fas fa-calendar-alt batch-icon"></i> 2025-01-01
                            <i class="fas fa-clock batch-icon"></i> 2:00 PM - 3:30 PM
                        </p>
                    </div>
                    <button class="view-details">View Details</button>
                </div>
        </div>
    </div>
</div>
</body>
</html>
