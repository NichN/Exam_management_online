<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Student Dashboard</title>
        <link rel="stylesheet" href="{{ asset('/css/student_style.css') }}">
        <!-- Font Awesome for icons -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        />
    </head>
    <body>
        <div class="container">
            <!-- Sidebar -->
            <div class="sidebar">
                <div class="logo">
                    <img src="image/logoNorton.png" alt="Norton University" />
                </div>
                <nav>
                    <ul>
                        <li id="dashboard-link">
                            <a href="#"
                                ><i class="fas fa-home"></i> Dashboard</a
                            >
                        </li>
                        <li id="department-link" class="active">
                            <a href="#"
                                ><i class="fas fa-building"></i> Department</a
                            >
                        </li>
                        <li id="student-link">
                            <a href="#"
                                ><i class="fas fa-user-graduate"></i> Student</a
                            >
                        </li>
                        <li id="schedule-link">
                            <a href="#"
                                ><i class="fas fa-calendar"></i> My Schedule</a
                            >
                        </li>
                        <li id="task-link">
                            <a href="#"
                                ><i class="fas fa-tasks"></i> All Task</a
                            >
                        </li>
                    </ul>
                </nav>
                <div class="logout">
                    <a href="#" id="logout-link"
                        ><i class="fas fa-sign-out-alt"></i> Log out</a
                    >
                </div>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <!-- Header -->
                <header>
                    <button class="back-button" id="back-button">
                        <i class="fas fa-arrow-left"></i>
                        <span>Student Profile</span>
                    </button>
                    <div class="user-profile">
                        <i class="fas fa-bell" id="notification-icon"></i>
                        <i class="fas fa-user" id="user-icon"></i>
                        <span>Sun Nasy</span>
                    </div>
                </header>

                <!-- Profile Section -->
                <div class="profile-section">
                    <div class="profile-info">
                        <img src="<?php echo asset('/Image/pf.png'); ?>" alt="Student Profile"/>
                        <div class="info">
                            <h2>Nich</h2>
                            <p>Student ID: B20223119</p>
                            <p>Gender: Female</p>
                            <p>Course: COM-24</p>
                            <p>Class: ES1</p>
                        </div>
                    </div>
                    <div class="contact-info">
                        <h3>Center Contact</h3>
                        <p><i class="fas fa-phone"></i> 12345 65870</p>
                        <p>
                            <i class="fas fa-envelope"></i>
                            hanumannagar.center@tips.in
                        </p>
                    </div>
                </div>

                <!-- Statistics Section -->
                <div class="statistics">
                    <div class="stat-card">
                        <h3>Quiz</h3>
                        <p>Total Quizzes: 15</p>
                        <p>Attempted: 10</p>
                        <div class="results">
                            <span class="passed">Passed: 25</span>
                            <span class="failed">Failed: 25</span>
                        </div>
                        <button class="view-details">View Details</button>
                    </div>

                    <div class="stat-card">
                        <h3>Exams</h3>
                        <p>Total Exams: 15</p>
                        <p>Attempted: 10</p>
                        <div class="results">
                            <span class="passed">Passed: 25</span>
                            <span class="failed">Failed: 25</span>
                        </div>
                        <button class="view-details">View Details</button>
                    </div>

                    <div class="stat-card">
                        <h3>Assignment</h3>
                        <p>Total Assignment: 15</p>
                        <p>Attempted: 12</p>
                        <div class="results">
                            <span class="passed">Passed: 25</span>
                            <span class="failed">Failed: 25</span>
                        </div>
                        <button class="view-details">View Details</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="../../../public/js/script.js"></script>
    </body>
</html>
