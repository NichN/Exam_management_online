<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Profile</title>
    <link rel="stylesheet" href="styles.css" />
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('/css/student_result.css') }}">
</head>

<body>
    <div class="container">
        @extends('layouts.app')
        @section('title', 'Result')

        @section('content') 
        <!-- Main Content -->
        <div class="main-content">
            <!-- Profile Section -->
            <div class="profile-section">
                <div class="profile-info">
                    <img src="image/Profile.png" alt="Student Profile" />
                </div>
                <div>
                    <h2>Srey Nich</h2>
                    <p>ID: B20220061</p>
                </div>
                <div class="course-info">
                    <span class="icon"><i class="fas fa-university"></i>Norton
                        University</span>
                    <div>Computer Study</div>
                    <div>Year 4, Semester 1</div>
                    <div>Software Development</div>
                    <div>2024 - 2025</div>
                </div>
                <div class="form-group">
                    <label for="name-khmer">Name Khmer</label>
                    <input type="text" id="name-khmer" placeholder="Name in Khmer" />
                </div>
                <div class="form-group">
                    <label for="name-english">Name English</label>
                    <input type="text" id="name-english" value="Srey Nich" />
                </div>
                <div class="form-group">
                    <label for="identity">Identity</label>
                    <input type="text" id="identity" value="ID: B20220061" readonly />
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" value="nichh@gmail.com" />
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" value="0837344643747" />
                </div>
                <button href="#" class="save-button">Save</button>
            </div>

            <!-- Course Information Section -->
        </div>
    </div>
    @endsection
    <script src="script.js"></script>
</body>
<style>

</style>
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

</html>