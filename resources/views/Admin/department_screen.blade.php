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
</head>
<body>
<div class="side-menu">
    <div class="logo">
    <img src="/Image/norton.png" alt="Logo">
    </div>
    <ul class="menu-list">
        <li class="menu-item active">
            <a href="/admin/dashboard">
                <i class="fas fa-home"></i> Dashboard
            </a>        
        </li>
        <li class="menu-item">
            <a href="/admin/department">
                <i class="fas fa-building"></i> Department
            </a> 
        </li>
        <li class="menu-item">
            <i class="fas fa-user-graduate"></i> Student
        </li>
        <li class="menu-item">
            <i class="fas fa-tasks"></i> All Task
        </li>
        <li class="menu-item">
            <i class="fas fa-clock"></i> My Schedule
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


</body>
</html>
