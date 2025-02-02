<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student List</title>
    
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

<div class="student-container">
    <h2>My Students</h2>
    <div class="tabs-container">
        <div class="search-bar">
            <input type="text" placeholder="Search..." oninput="filterStudents(this)">
        </div>
    </div>
    
    <div class="student-list">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Major</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>6</td>
                    <td>Keo Sovanlogdy</td>
                    <td>nich123@gmail.com</td>
                    <td>Software Development</td>
                    <td><a href="/admin/student/detail" class="btn btn-info">View</a></td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Jane Doe</td>
                    <td>janedoe@gmail.com</td>
                    <td>Web Design</td>
                    <td><a href="/admin/student/detail" class="btn btn-info">View</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
