<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Task</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/all_task.css') }}">
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

<div class="alltask-container">
    <div class="header-with-button">
        <h4>Create New Task</h4>
        <button class="submit-task-btn" onclick="submitTask()">Submit</button>
        <a href="/admin/alltask/quizexam">
            <button class="next-task-btn">Next</button>
        </a>
    </div>
    <div class="task-container">
        <form class="task-form">
            <div class="form-group">
                <label for="title-exam">Title Exam:</label>
                <input type="text" name="title_exam" class="title-exam">
            </div>
            <div class="form-group">
                <label for="major">Major:</label>
                <select name="major" class="major">
                    <option value="" disabled selected>Choose Major</option>
                    <option value="major">Computer Science</option>
                    <option value="major">Software Development</option>
                    <option value="major">Network</option>
                    <option value="major">Media</option>
                </select>
            </div>
            <div class="form-group">
                <label for="course">Course:</label>
                <select name="course" class="course">
                    <option value="" disabled selected>Choose Course</option>
                    <option value="course">Introduction to Programming</option>
                    <option value="course">Data Structures and Algorithms</option>
                    <option value="course">Web Development</option>
                    <option value="course">Database Management</option>
                </select>
            </div>
            <div class="form-group">
                <label for="type">Type:</label>
                <select name="type" class="type">
                    <option value="" disabled selected>Choose Type</option>
                    <option value="type1">Assignment</option>
                    <option value="type2">Quiz</option>
                    <option value="type2">Exam</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="description"></textarea>
            </div>
            <div class="form-group">
                <label for="dateline">Dateline:</label>
                <input type="date" name="dateline" class="dateline">
            </div>
            <div class="form-group">
                <label for="mark">Mark:</label>
                <input type="text" name="mark" class="mark">
            </div>
            <div class="form-group attachment-group">
                <label for="attachment">Attachment:</label>
                <div class="file-upload">
                    <input type="file" name="attachment" class="attachment">
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const typeSelect = document.querySelector(".type");
        const nextButton = document.querySelector(".next-task-btn");
        const submitButton = document.querySelector(".submit-task-btn");
        const attachmentGroup = document.querySelector(".attachment-group");

        // Function to handle changes in the task type
        typeSelect.addEventListener("change", function () {
            const selectedValue = typeSelect.value;

            if (selectedValue === "type1") { 
                // If "Assignment" is selected, show "Submit" and Attachment field, hide "Next"
                submitButton.style.display = "inline-block";
                nextButton.style.display = "none";
                attachmentGroup.style.display = "block";
            } else if (selectedValue === "type2") { 
                // If "Quiz" or "Exam" is selected, show "Next", hide "Submit" and Attachment field
                submitButton.style.display = "none";
                nextButton.style.display = "inline-block";
                attachmentGroup.style.display = "none";
            } else {
                // If no type is selected, hide both buttons and attachment field
                submitButton.style.display = "none";
                nextButton.style.display = "none";
                attachmentGroup.style.display = "none";
            }
        });

        // Initially hide both buttons and the attachment field
        submitButton.style.display = "none";
        nextButton.style.display = "none";
        attachmentGroup.style.display = "none";
    });
</script>



