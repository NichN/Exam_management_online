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
            <input type="text" id="searchInput" placeholder="Search..." oninput="filterStudents()">
        </div>
    </div>
    
    <div class="student-list">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="studentTableBody">
            </tbody>
        </table>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        fetchStudents();
    });
    function fetchStudents() {
        let tableBody = document.getElementById('studentTableBody');
        fetch("http://127.0.0.1:8000/api/students")
        .then(response => response.json())
        .then(data => {
        data.forEach(user => {
            let row = `<tr>
                <td>${user.id}</td>
                <td>${user.name}</td>
                <td>${user.email}</td>
                <td>${user.department ? user.department.name : 'No Department'}</td>
                <td><a href="/admin/user/detail/${user.id}" class="btn btn-info">View</a></td>
            </tr>`;
            tableBody.innerHTML += row;
        });
    })
            .catch(error => console.error("Error fetching students:", error));
    }

    function filterStudents() {
        let input = document.getElementById("searchInput").value.toLowerCase();
        let rows = document.querySelectorAll("#studentTableBody tr");

        rows.forEach(row => {
            let name = row.cells[1].innerText.toLowerCase();
            let email = row.cells[2].innerText.toLowerCase();

            if (name.includes(input) || email.includes(input)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }
</script>

</body>
</html>
