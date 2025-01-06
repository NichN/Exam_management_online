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
    <div class="card">
        <div class="header">
            <div class="header-text">
                Exam Overview
            </div>
            <button class="start-btn">Start Exam</button>
        </div>
        <div class="details">
            <h3 class="midterm">Midterm</h3>
            <p><span class="icon">⏱</span> 1h 30min</p>
            <p><span class="icon">🎓</span> Computer, Software Development, Year 4</p>
            <p><span class="icon">📜</span> Full Score: 100/100</p>
        </div>
        <div class="date">23/ December/2024</div>
        <div class="footer">Lec. Ny SreyNich</div>
    </div>
    @endsection
</body>

</html>