<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('/css/dashboard.css') }}">
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
                <h3>{{ auth()->user()->name }}</h3>
                <p>ID: {{ auth()->user()->id }}</p>
                <p>Department: {{ auth()->user()->department->name ?? 'Not Assigned' }}</p>
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
            <h2>Upcomming Exams</h2>
            <a href="#" class="view-all">View All</a>
        </div>
        <div class="upcomming-exam-container">

            <div class="upcomming-list">
                @foreach($user->exams as $exam) <!-- Loop through all exams of the user -->
                <div class="upcomming-item">
                    <img src="/Image/avatar.png" alt="Avatar" class="avatar">
                    <span class="name">{{ $exam->teacher->name ?? "Unknown" }}</span> <!-- Fixed -->
                    <span class="class">ES1</span>
                    <span class="assignment">{{ $exam->subject->name ?? 'Unknown' }}</span>
                    <span class="status submitted">{{ $exam->status ?? 'Completed' }}</span>
                    <span class="date">{{ $exam->start_time ?? 'No Date Available' }}</span>
                    <button class="view-btn">View</button>
                </div>
                @endforeach
            </div>



        </div>
        <div class="upcomming-header">
            <h2>Dashboard Overview</h2>
        </div>
        <div class="card-grid">

            <div class="card">
                <div class="card-header" style="background-image: url('/image/ProfileSample.png');">
                    <span>{{ $exam->subject->name ?? 'No Subject' }}</span>
                </div>
                <div class="card-body">
                    <p><img src="https://via.placeholder.com/40" class="profile" alt="Profile">
                        {{ $exam->teacher->name ?? 'Unknown' }}
                    </p>
                    <p>⏰ <span>Duration:
                            {{ \Carbon\Carbon::parse(time: $exam->end_time)->diff(\Carbon\Carbon::parse($exam->start_time))->format('%h h %i min') }}</span>
                    </p>
                    </p>
                    <p>📅 <span>Date Time: {{ date('d/M/Y', strtotime($exam->start_time)) }}</span></p>
                    <p>❓ <span>Questions: {{ $questionCount }}</span></p>
                    <p>✔️ <span>Correct Answers: {{ $correctAnswers }}</span></p>
                </div>
                <div class="card-footer">
                    <span class="points">{{ $totalScore }} pt</span>
                </div>
            </div>


        </div>




    </div>
    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>

</html>
