<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Department Batch Details</title>
    
    <!-- Bootstrap & FontAwesome -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/department.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/batch_detail.css') }}">
    
    <!-- Custom JS -->
    <script src="{{ asset('/js/menu.js') }}"></script>
</head>
<body>
<div class="container">
    @include('partials.admin_sidebar')
</div>

<div class="batch-detail-container">
    <div class="batch-header">
        <div class="header-with-back">
            <a href="/admin/department" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                <h2>Back</h2>
            </a>
        </div>
    </div>    

    <hr class="divider">

    <!-- Department and Major Info -->
    <div class="course-container">
        <h3>Department: <span id="department-name">Loading...</span></h3>
    </div>
    <div class="major-container">
        <h3>Major: <span id="major-description">Loading...</span></h3>
    </div>    

    <!-- Semester Details -->
    <div class="semester-container">
        <h3>Semester 1</h3>
        <ul>
            <li>Introduction to Web</li>
            <li>HTML, CSS</li>
            <li>Introduction to Bootstrap</li>
            <li>Figma</li>
        </ul>
    </div>
    <div class="semester-container">
        <h3>Semester 2</h3>
        <ul>
            <li>JavaScript Language</li>
            <li>PHP Language</li>
            <li>Introduction to Tailwind CSS</li>
            <li>MySQL</li>
        </ul>
    </div>

    <!-- Batch Details -->
    <div class="batch-container">
        <h3>Batch Details</h3>
        <ul>
            <li>Start Date: <span>22/04/2024</span></li>
            <li>End Date: <span>22/04/2024</span></li>
            <li>Total: <span>2 Semesters</span></li>
        </ul>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", async function () {
    try {
        const response = await fetch('http://127.0.0.1:8000/api/departments');
        const data = await response.json();

        console.log("API Response:", data); 

        if (Array.isArray(data) && data.length > 0) {
            document.getElementById("department-name").textContent = data[0].name.toUpperCase();
            document.getElementById("major-description").textContent = data[0].description;
        } else if (data.name) {
            document.getElementById("department-name").textContent = data.name.toUpperCase();
            document.getElementById("major-description").textContent = data.description;
        } else {
            console.error("Invalid data structure:", data);
            document.getElementById("department-name").textContent = "Not Available";
            document.getElementById("major-description").textContent = "Not Available";
        }

    } catch (error) {
        console.error("Error fetching department details:", error);
        document.getElementById("department-name").textContent = "Error Loading";
        document.getElementById("major-description").textContent = "Error Loading";
    }
});

</script>
</body>
</html>
