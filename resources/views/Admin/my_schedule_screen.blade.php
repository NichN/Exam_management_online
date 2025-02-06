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
 <div class="myschedule-container">
    <div class="header-with-button">
        <h2>Schedule Task</h2>
        <button class="add-task-btn" onclick="addNewTask()">
            <a href="/admin/alltask">+ Add New Task</a>
        </button>
    </div>
    <hr class="divider">
    <div class="task-tabs-container">
        <div class="task-tabs">
            <a class="task-tab active" onclick="setActiveTab(this)" data-class="AllTasks">All Tasks</a>
            <a class="task-tab" onclick="setActiveTab(this)" data-class="DueToday">Due Today</a>
            <a class="task-tab" onclick="setActiveTab(this)" data-class="Overdue">Overdue</a>
        </div>
    </div>

    <div id="AllTasks" class="task-container active">
    <div class="tasks-container" id="tasks-list">

    </div>
</div>


    <div id="DueToday" class="task-container">
        <div class="tasks-container">

        </div>
    </div>

    <div id="Overdue" class="task-container">
        <div class="tasks-container">

        </div>
    </div>
</div>
</body>
</html>
