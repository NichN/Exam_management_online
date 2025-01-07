<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('/css/student_exam.css') }}">
</head>

<body>
    <!-- filepath: /Users/sunnasy/Desktop/Co4_ES1/Advance Web/EXAM-ONLINE/resources/views/Student/department.blade.php -->
    @extends('layouts.app')

    @section('title', 'Result')

    @section('content')
    <div>
        <h1>The Latest Exams</h1>

        <div class="exam-card">
            <div class="exam-header">Business Intelligence</div>
            <div class="exam-body">
                <div class="exam-info">
                    <span><i>📌</i> Midterm</span>
                    <span><i>⏱</i> 1h 30min</span>
                    <span><i>💻</i> Computer, Software Development, Year 4</span>
                    <span><i>⭐</i> Full Score: 100/100</span>
                </div>
            </div>
            <div class="exam-footer">
                <button class="start-exam-btn" onclick="navigateToExam()">Start Exam</button>
                <div class="lecturer">Lec. Ny SreyNich</div>
            </div>
        </div>

        <div class="exam-card">
            <div class="exam-header">Software Security</div>
            <div class="exam-body">
                <div class="exam-info">
                    <span><i>📌</i> Test</span>
                    <span><i>⏱</i> 1h 30min</span>
                    <span><i>💻</i> Computer, Software Development, Year 4</span>
                    <span><i>⭐</i> Full Score: 100/100</span>
                </div>
            </div>
            <div class="exam-footer">
                <button class="start-exam-btn">Start Exam</button>
                <div class="lecturer">Lec. Ny SreyNich</div>
            </div>
        </div>

        <div class="exam-card">
            <div class="exam-header">Advance Web Development</div>
            <div class="exam-body">
                <div class="exam-info">
                    <span><i>📌</i> Final</span>
                    <span><i>⏱</i> 1h 30min</span>
                    <span><i>💻</i> Computer, Software Development, Year 4</span>
                    <span><i>⭐</i> Full Score: 100/100</span>
                </div>
            </div>
            <div class="exam-footer">
                <button class="start-exam-btn">Start Exam</button>
                <div class="lecturer">Lec. Ny SreyNich</div>
            </div>
        </div>

    </div>
    <script>
        function navigateToExam() {
            window.location.href = "{{ route('Student.exam_page') }}";
        }
    </script>
    @endsection
</body>

</html>