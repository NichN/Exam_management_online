<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Detail</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/student_detail.css') }}">
    <script src="{{ asset('/js/menu.js') }}"></script>
    <script src="{{ asset('/js/student_detail.js') }}"></script>
</head>
<body>
<div class="container">
    @include('partials.admin_sidebar')
</div>

<div class="student-detail-container">
    <div class="student-profile">
        <div class="profile-header">
            <div class="profile-details">
                <div class="header-with-back">
                    <a href="/admin/student" class="back-btn">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <h2>Student Profile</h2>
                </div>
                <div class="profile-card">
                    <img id="profile-picture" src="/Image/pfstudent.png" alt="Profile Picture" class="profile-pic">
                    <div class="profile-info">
                        <p id="student-name"><strong>Loading...</strong></p>
                        <p id="student-id">Student ID: Loading...</p>
                    </div>
                </div>
                <div class="additional-info">
                    <p><strong>Department:</strong> <span id="student-department">Loading...</span></p>
                    <p><strong>Class:</strong> <span id="student-class">ES1</span></p>
                </div>
            </div>
            <div class="spacer"></div>
            <div class="contact-card">
                <h3>Center Contact</h3>
                <p><strong>Email:</strong><span id="student-email">Loading...</span></p>
            </div>
        </div>

        <!-- Task Tabs UI - No API for tasks -->
        <div class="task-tabs-container">
            <div class="task-tabs">
                <a class="task-tab active" onclick="setActiveTab(this)" data-class="Quiz">Quiz</a>
                <a class="task-tab" onclick="setActiveTab(this)" data-class="Exams">Exams</a>
                <a class="task-tab" onclick="setActiveTab(this)" data-class="Assignment">Assignment</a>
            </div>
        </div>

        <!-- Task UI Containers - Static content -->
        <div id="Quiz" class="task-container active">
            <div class="tasks-container">
                <!-- Submitted quiz results will be appended here -->
            </div>
        </div>

        <div id="Exams" class="task-container">
            <div class="tasks-container">
                <div class="card">
                    <h3>Exam Chapter1 in Semester 1</h3>
                    <p><strong>Major:</strong> Web Development </p>
                    <div class="details">
                        <p>
                            <i class="fas fa-calendar-alt batch-icon"></i> 2025-01-01
                            <i class="fas fa-clock batch-icon"></i> 2:00 PM - 3:30 PM
                        </p>
                    </div>
                    <button class="view-details">
                        <a href="/admin/student/task/detail">View Details</a>
                    </button>
                </div>
            </div>
        </div>

        <div id="Assignment" class="task-container">
            <div class="tasks-container">
                <div class="card">
                    <h3>Assignment Chapter1 in Semester 1</h3>
                    <p><strong>Major:</strong> Web Development </p>
                    <div class="details">
                        <p>
                            <i class="fas fa-calendar-alt batch-icon"></i> 2025-01-01
                            <i class="fas fa-clock batch-icon"></i> 2:00 PM - 3:30 PM
                        </p>
                    </div>
                    <button class="view-details">
                        <a href="/admin/student/task/detail">View Details</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const studentId = window.location.pathname.split('/').pop(); // Get student ID from URL

        // Fetch student data from API
        fetch(`http://127.0.0.1:8000/api/students/${studentId}`)
            .then(response => response.json())
            .then(studentData => {
                document.getElementById('student-name').innerText = studentData.name;
                document.getElementById('student-email').innerText = studentData.email;
                document.getElementById('student-id').innerText = `Student ID: ${studentData.id}`;
                document.getElementById('student-department').innerText = studentData.department.name;
                document.getElementById('profile-picture').src = studentData.profile_picture || '/Image/pfstudent.png';
            })
            .catch(error => console.error('Error fetching student data:', error));

        // Fetch student quiz submissions from API
        fetch(`http://127.0.0.1:8000/api/student-submissions/${studentId}`)
            .then(response => response.json())
            .then(submissions => {
                const quizContainer = document.getElementById('Quiz').querySelector('.tasks-container');
                submissions.forEach(submission => {
                    const submissionCard = document.createElement('div');
                    submissionCard.classList.add('card');
                    
                    const question = submission.question;
                    const isCorrect = submission.is_correct ? 'Correct' : 'Incorrect';
                    const points = submission.is_correct ? question.points : '0.00';
                    
                    submissionCard.innerHTML = `
                        <h3>${question.question_text}</h3>
                        <p><strong>Your Answer:</strong> ${submission.answer}</p>
                        <p><strong>Status:</strong> ${isCorrect}</p>
                        <p><strong>Points Awarded:</strong> ${points}</p>
                    `;

                    quizContainer.appendChild(submissionCard);
                });
            })
            .catch(error => console.error('Error fetching submissions:', error));
    });
</script>

</body>
</html>
