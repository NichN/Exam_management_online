<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset(path: '/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/student_dashboard.css') }}">

</head>

<body>
    <div class="container">
        @include('partials.student_sidebar')
        <div class="id-card">
            <div class="card-left">
                <img src="{{ asset('/image/norton_logo.png') }}" alt="University Logo">
            </div>
            <div class="card-center">
                <h3>Keo Sonvanlongdy</h3>
                <p>ID: B20220052</p>
                <p>Department: Software Development</p>
                <p>Semester 1, Year 4</p>
            </div>
            <div class="card-right">
                <div class="profile-icon">
                    <img src="https://via.placeholder.com/40/000000/FFFFFF/?text=User" alt="Profile Icon">
                </div>
            </div>
        </div>
        <div class="card-row">
            <div class="total-students">
                <div class="icon-container" style="background-color: #e57373;">
                    <i class="fas fa-home"></i>
                </div>
                <div class="details">
                    <div>
                        <span class="title">Class</span>
                        <span class="subtitle">ES1</span>
                    </div>
                    <div class="semester">Semester1, Year4</div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="total-students">
                <div class="icon-container" style="background-color: #e57373;">
                    <i class="fas fa-home"></i>
                </div>
                <div class="details">
                    <div>
                        <span class="title">Class</span>
                        <span class="subtitle">ES2</span>
                    </div>
                    <div class="semester">Semester1, Year4</div>
                </div>
            </div>
        </div>
        <div class="upcomming-header">
            <h2>Submitted Homework</h2>
            <a href="#" class="view-all">View All</a>
        </div>
        <div class="upcomming-exam-container">
            <div class="upcomming-list">
                <div class="upcomming-item">
                    <img src="/Image/avatar.png" alt="Avatar" class="avatar">
                    <span class="name">Keo Sovanlogdy</span>
                    <span class="class">ES1</span>
                    <span class="assignment">Name Assignment</span>
                    <span class="status submitted">Submitted</span>
                    <span class="date">22-11-2024</span>
                    <button class="view-btn">View</button>
                </div>
                <div class="upcomming-item">
                    <img src="/Image/avatar.png" alt="Avatar" class="avatar">
                    <span class="name">Keo Sovanlogdy</span>
                    <span class="class">ES2</span>
                    <span class="assignment">Name Assignment</span>
                    <span class="status submitted">Submitted</span>
                    <span class="date">22-11-2024</span>
                    <button class="view-btn">View</button>
                </div>
                <div class="upcomming-item">
                    <img src="/Image/avatar.png" alt="Avatar" class="avatar">
                    <span class="name">Keo Sovanlogdy</span>
                    <span class="class">ES1</span>
                    <span class="assignment">Name Assignment</span>
                    <span class="status submitted">Submitted</span>
                    <span class="date">22-11-2024</span>
                    <button class="view-btn">View</button>
                </div>
                <div class="upcomming-item">
                    <img src="/Image/avatar.png" alt="Avatar" class="avatar">
                    <span class="name">Keo Sovanlogdy</span>
                    <span class="class">ES2</span>
                    <span class="assignment">Name Assignment</span>
                    <span class="status submitted">Submitted</span>
                    <span class="date">22-11-2024</span>
                    <button class="view-btn">View</button>
                </div>
            </div>
        </div>
        <div class="upcomming-header">
            <h2>Dashboard Overview</h2>
        </div>
        <div class="card-grid">
            <!-- Card 1 -->
            <div class="card">
                <div class="card-header" style="background-image: url('/image/ProfileSample.png');">
                    <span>Web Development</span>
                </div>
                <div class="card-body">
                    <p><img src="https://via.placeholder.com/40" class="profile" alt="Profile"> Keo Sovanlongdy</p>
                    <p>⏰ <span>Duration: 1h 30min</span></p>
                    <p>📅 <span>Date Time: 24/Dec/2024</span></p>
                    <p>❓ <span>Question: 12</span></p>
                    <p>✔️ <span>Corrected: 12</span></p>
                </div>
                <div class="card-footer">
                    <span class="points">100 pt</span>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="card">
                <div class="card-header" style="background-image: url('/image/ProfileSample.png');">
                    <span>Web Development</span>
                </div>
                <div class="card-body">
                    <p><img src="https://via.placeholder.com/40" class="profile" alt="Profile"> Keo Sovanlongdy</p>
                    <p>⏰ <span>Duration: 1h 30min</span></p>
                    <p>📅 <span>Date Time: 24/Dec/2024</span></p>
                    <p>❓ <span>Question: 12</span></p>
                    <p>✔️ <span>Corrected: 12</span></p>
                </div>
                <div class="card-footer">
                    <span class="points">100 pt</span>
                </div>
            </div>
            <div class="card">
                <div class="card-header" style="background-image: url('/image/ProfileSample.png');">
                    <span>Web Development</span>
                </div>
                <div class="card-body">
                    <p><img src="https://via.placeholder.com/40" class="profile" alt="Profile"> Keo Sovanlongdy</p>
                    <p>⏰ <span>Duration: 1h 30min</span></p>
                    <p>📅 <span>Date Time: 24/Dec/2024</span></p>
                    <p>❓ <span>Question: 12</span></p>
                    <p>✔️ <span>Corrected: 12</span></p>
                </div>
                <div class="card-footer">
                    <span class="points">100 pt</span>
                </div>
            </div>
            <div class="card">
                <div class="card-header" style="background-image: url('/image/ProfileSample.png');">
                    <span>Web Development</span>
                </div>
                <div class="card-body">
                    <p><img src="https://via.placeholder.com/40" class="profile" alt="Profile"> Keo Sovanlongdy</p>
                    <p>⏰ <span>Duration: 1h 30min</span></p>
                    <p>📅 <span>Date Time: 24/Dec/2024</span></p>
                    <p>❓ <span>Question: 12</span></p>
                    <p>✔️ <span>Corrected: 12</span></p>
                </div>
                <div class="card-footer">
                    <span class="points">100 pt</span>
                </div>
            </div>

            <!-- Repeat similar structure for other cards -->
        </div>




    </div>
    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>

</html>