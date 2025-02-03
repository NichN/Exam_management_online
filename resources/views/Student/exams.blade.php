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
    <link rel="stylesheet" href="{{ asset('/css/student_exam.css') }}">
</head>

<body>
    <!-- filepath: /Users/sunnasy/Desktop/Co4_ES1/Advance Web/EXAM-ONLINE/resources/views/Student/department.blade.php -->
    @extends('layouts.app')

    @section('title', 'Result')

    @section('content')
    <div>
        <h1>The Latest Exams</h1>

        @foreach($exams as $exam)
            <div class="exam-card">
                <div class="exam-header">{{ $exam->subject->name ?? 'N/A' }}</div>
                <div class="exam-body">
                    <div class="exam-info">
                        <span><i>📌</i> {{ $exam->title }}</span>
                        <span><i>⏱</i>
                            {{ \Carbon\Carbon::parse($exam->start_time)->diff(\Carbon\Carbon::parse($exam->end_time))->format('%h h %i min') }}
                        </span>
                        <span><i>⭐</i> Full Score:
                            @if($exam->questions->count() > 0)
                                @foreach($exam->questions as $question)
                                    <div>Question {{ $loop->iteration }}: {{ $question->points }} points</div>
                                @endforeach
                            @else
                                15
                            @endif
                        </span>
                    </div>
                </div>
                <div class="exam-footer">
                    <button class="start-exam-btn" onclick="navigateToExam({{ $exam->id }})">Start Exam</button>
                    <div class="lecturer">Lec. {{ $exam->teacher->name ?? 'Unknown' }}</div>
                </div>
            </div>
        @endforeach

    </div>
    <script>
        function navigateToExam(examId) {
            const examUrl = '/student/exam/' + examId;
            console.log("Redirecting to: " + examUrl); // Log the URL to the console
            window.location.href = examUrl;
        }
    </script>
    @endsection
</body>

</html>
