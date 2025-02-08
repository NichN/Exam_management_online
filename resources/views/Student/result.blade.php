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
    <link rel="stylesheet" href="{{ asset('/css/student_result.css') }}">
</head>

<body>
    <div class="container">
        @extends('layouts.app')

        @section('title', 'Result')

        @section('content')


        <a href="#" class="back-button">
            <i class="fas fa-arrow-left"></i> Back
        </a>

        <hr class="divider">
        <div class="container">


            <div class="student-info">
                <img src="{{ asset('/image/norton_logo.png') }}" alt="Profile Picture" class="profile-picture">
                <div class="student-details">
                    <p><strong>Ny Sreynich</strong></p>
                    <p>Student ID: <strong>B20223119</strong></p>
                    <p>Gender: <strong>Female</strong></p>

                </div>

            </div>

            <div>
                <p>Course: <strong>COM-24</strong></p>
                <p>Class: <strong>ES1</strong></p>
            </div>

            <div class="testing-info">
                <div>
                    <p><strong>Testing Chapter1 in Semester 1</strong></p>
                    <span class="batch-info">Batch COM-24</span>
                </div>
                <div class="date-time">
                    <i class="fas fa-clock"></i>
                    <p style="margin: 0;">12:40 PM</p>
                    <i class="fas fa-calendar-alt"></i>
                    <p style="margin: 0;">03 Jan 2023</p>
                    <span class="status-pass">Status: Pass</span>
                </div>
            </div>

            <div class="marks-section">
                <p>Total Marks: 50</p>
                <p>
                    <a href="#" class="file-link">Testing1 Question Paper.pdf</a>
                </p>
            </div>

            <div class="result-section">
                <p class="result-title">Result</p>
                <p>Student's Score</p>
                <div class="student-score">32/50</div>
            </div>
        </div>
        @endsection
        <script src="script.js"></script>
</body>

</html>