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
                    <img src="https://via.placeholder.com/80/000000/FFFFFF/?text=User" alt="Profile Icon">
                </div>
            </div>
        </div>


        <div class="upcomming-header">
            <h2>Exams</h2>
        </div>
        <div class="upcomming-exam-container">
            <div class="upcomming-list">
                @foreach($user->exams as $exam)
                    <div class="upcomming-item">
                        <img src="/Image/studentProfile.jpg" alt="Avatar" class="avatar">
                        <span class="name">{{ $exam->teacher->name ?? "Unknown" }}</span>
                        <span class="class">ES1</span>
                        <span class="assignment">{{ $exam->subject->name ?? 'Unknown' }}</span>
                        <span class="status submitted">{{ $exam->status ?? 'Completed' }}</span>
                        <span class="date">{{ $exam->start_time ?? 'No Date Available' }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="dashboard-overview" style="padding-top: 20px">
            <h2>All Exam Overview</h2>
        </div>
        <div class="card-grid">
            @foreach($examDetails as $details)
                <div class="card">
                    <div class="card-header">
                        <h3 class="subject-name">{{ $details['exam']->subject->name ?? 'No Subject' }}</h3>
                    </div>
                    <div class="card-body">
                        <p class="teacher"><i class="fas fa-user"></i> {{ $details['exam']->teacher->name ?? 'Unknown' }}</p>
                        <p class="duration"><i class="fas fa-clock"></i> Duration:
                            {{ \Carbon\Carbon::parse($details['exam']->end_time)->diff(\Carbon\Carbon::parse($details['exam']->start_time))->format('%h h %i min') }}
                        </p>
                        <p class="date"><i class="fas fa-calendar-alt"></i> Date:
                            {{ date('d/M/Y', strtotime($details['exam']->start_time)) }}
                        </p>
                        <p class="questions"><i class="fas fa-question-circle"></i> Questions: {{ $details['questionCount'] }}</p>
                        <p class="correct-answers"><i class="fas fa-check-circle"></i> Correct Answers: {{ $details['correctAnswers'] }}</p>
                    </div>
                    <div class="card-footer">
                        <span class="points"><i class="fas fa-star"></i> {{ $details['totalScore'] }} pt</span>
                    </div>
                </div>
            @endforeach
        </div>





    </div>
    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>

</html>
