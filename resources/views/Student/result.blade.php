<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Result</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('/css/dashboard.css') }}">


    <style>
        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background-color: #87ceeb;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .logo img {
            width: 100%;
            max-width: 200px;
            margin-bottom: 30px;
        }

        .sidebar nav ul {
            list-style: none;
        }

        .sidebar nav ul li {
            margin-bottom: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .sidebar nav ul li:hover {
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 5px;
        }

        .sidebar nav ul li a {
            color: #333;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 10px;
            width: 100%;
        }

        .sidebar nav ul li.active {
            background-color: #ffffff;
            border-radius: 5px;
        }

        .sidebar nav ul li.active a {
            color: #4169e1;
            font-weight: bold;
        }

        .sidebar nav ul li i {
            margin-right: 10px;
        }

        .logout {
            margin-top: auto;
        }

        .logout a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .logout a:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        /* Main Content Styles */
        .main-content {
            flex: 1;
            padding: 20px;
            background-color: #f5f5f5;
        }

        /* Header Styles */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .back-button {
            display: flex;
            align-items: center;
            cursor: pointer;
            font-size: 18px;
            color: #4169e1;
            background: none;
            border: none;
            padding: 10px;
            margin-bottom: 20px;
            transition: color 0.3s;
        }

        .back-button:hover {
            color: #1e90ff;
        }

        .back-button i {
            margin-right: 10px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        /* Profile Section Styles */
        .profile-section {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .profile-info {
            display: flex;
            gap: 20px;
        }

        .profile-info img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }

        .info {
            font-size: 16px;
        }

        .info h2 {
            font-size: 24px;
            color: #333;
        }

        .contact-info {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Statistics Section Styles */
        .statistics {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .stat-card {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .stat-card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .stat-card h3 {
            margin-bottom: 15px;
        }

        .results {
            margin: 15px 0;
        }

        .passed {
            color: green;
            margin-right: 15px;
        }

        .failed {
            color: red;
        }

        .view-details {
            background-color: #4169e1;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .view-details:hover {
            background-color: #3157d1;
        }

        /* Add custom styles here to match the new design */
        .profile-section {
            display: flex;
            flex-direction: column;
            align-items: left;
            background-color: #f0f8ff;
            /* Light blue background */
            padding: 20px;
            border-radius: 10px;
        }

        .profile-info {
            text-align: left;
        }

        .profile-info img {
            border-radius: 50%;
            /* Circular profile picture */
            width: 150px;
            /* Adjust size as needed */
            height: 150px;
            /* Adjust size as needed */
        }

        .form-group {
            margin: 10px 0;
            width: 100%;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .save-button {
            background-color: #43c4f9;
            /* Green background */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .course-info {
            display: flex;
            align-items: left;
            justify-content: space-around;
            width: 100%;
            margin-top: 20px;
            border-top: 1px solid #ccc;

            padding-top: 10px;
        }

        .course-info div {
            text-align: center;
        }

        .software-icon i {
            color: #4caf50;
            /* Change icon color */
            font-size: 24px;
            /* Adjust size */
            margin-right: 8px;
            /* Add space between icon and text */
        }

        .info {
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.6;
        }

        .contens_ {
            text-align: left;
            border-top: 1px solid #ccc;

            padding-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Sidebar -->
        @extends('layouts.app')

        @section('title', 'Result')

        @section('content')


        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <!-- <header>
                <button class="back-button" id="back-button">
                    <i class="fas fa-arrow-left"></i>
                    <span>Back</span>
                </button>
                <div class="user-profile">
                    <i class="fas fa-bell" id="notification-icon"></i>
                    <i class="fas fa-user" id="user-icon"></i>
                    <span>Sun Nasy</span>
                </div>
            </header> -->

            <!-- Profile Section -->
            <div class="profile-section">
                <div class="profile-info">
                    <img src="image/Profile.png" alt="Student Profile" />
                    <div style="margin-top: 40px; text-align: left">
                        <h2>Ny Srey Nich</h2>
                        <p>Student ID: B202223119</p>
                        <p>Gender: Female</p>
                    </div>
                </div>
                <div class="course-info"></div>
                <div>
                    <p2>Course: Com-24</p2><br>
                    <p2>Class:Es1</p2>
                </div>
            </div>


        </div>

        @endsection
        <script src="script.js"></script>
</body>

</html>
<script>
    // Get all menu items
    const menuItems = document.querySelectorAll(".sidebar nav ul li");

    // Add click event listener to each menu item
    menuItems.forEach((item) => {
        item.addEventListener("click", function () {
            // Remove active class from all items
            menuItems.forEach((item) => item.classList.remove("active"));

            // Add active class to clicked item
            this.classList.add("active");

            // Get the clicked menu item's text
            const menuText = this.textContent.trim();

            // Handle different menu items
            switch (menuText) {
                case "Dashboard":
                    console.log("Navigate to Dashboard");
                    // Add your dashboard navigation logic here
                    break;
                case "Department":
                    console.log("Navigate to Department");
                    // Add your department navigation logic here
                    break;
                case "Student":
                    console.log("Navigate to Student");
                    // Add your student navigation logic here
                    break;
                case "My Schedule":
                    console.log("Navigate to Schedule");
                    // Add your schedule navigation logic here
                    break;
                case "All Task":
                    console.log("Navigate to Tasks");
                    // Add your tasks navigation logic here
                    break;
            }
        });
    });

    // Add click event listener for the Log out link
    const logoutLink = document.getElementById("logout-link");

    logoutLink.addEventListener("click", function (event) {
        event.preventDefault(); // Prevent the default anchor behavior
        alert("Logging out..."); // Test alert
        console.log("Logging out...");

        // Redirect to login page or perform logout action
        // For example:
        // window.location.href = 'login.html'; // Redirect to login page
    });

    // Add click event listener for the Back button
    const backButton = document.getElementById("back-button");

    backButton.addEventListener("click", function () {
        // Logic to go back to the previous page or section
        console.log("Going back...");
        // For example, you can redirect to the dashboard
        // window.location.href = 'dashboard.html'; // Redirect to dashboard
    });

    // Add click event listener for the notification icon
    const notificationIcon = document.getElementById("notification-icon");

    notificationIcon.addEventListener("click", function () {
        alert("Notification icon clicked");
    });

    // Add click event listener for the user icon
    const userIcon = document.getElementById("user-icon");

    userIcon.addEventListener("click", function () {
        alert("User icon clicked");
    });

</script>