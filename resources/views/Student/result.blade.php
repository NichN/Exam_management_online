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
    <link rel="stylesheet" href="{{ asset('/css/dashboard.css') }}">


    
    
</head>

<body>
    <div class="container">
        <!-- Sidebar -->
        @extends('layouts.app')

        @section('title', 'Result')

        @section('content')
       
    <style>
        
        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        .student-info {
            display: flex; /* Use flexbox for layout */
            align-items: center; /* Center items vertically */
            margin-top: 20px; /* Space above the section */
        }

        .profile-picture {
            width: 80px; /* Adjust size as needed */
            height: 80px; /* Adjust size as needed */
            border-radius: 50%; /* Make it circular */
            margin-right: 20px; /* Space between image and text */
        }

        .student-details {
            font-size: 16px; /* Adjust font size */
        }

        .student-details p {
            margin: 5px 0; /* Space between lines */
        }

        .student-details strong {
            font-weight: bold; /* Bold for labels */
        }

        .batch-details {
            margin-top: 20px;
        }

        .batch-details p {
            margin: 5px 0;
            font-size: 16px;
        }

        .marks-section {
            margin-top: 20px;
        }

        .marks-section p {
            font-size: 16px;
            margin: 5px 0;
        }

        .file-link {
            display: inline-block;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            color: #333;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .file-link:hover {
            background-color: #f0f0f0;
        }

        .status-pass {
            background-color: #d4edda;
            color: #155724;
            padding: 5px;
            border-radius: 5px;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            
            color: black;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .back-button i {
            margin-right: 5px;
        }

        .divider {
            margin: 20px 0; /* Adjust margin as needed */
            border: none;
            border-top: 1px solid #ccc; /* Line color */
        }

        .result-section {
            margin-top: 20px; /* Space above the result section */
        }

        .result-title {
            font-weight: bold; /* Bold title */
            font-size: 24px; /* Adjust font size */
        }

        .student-score {
            display: inline-block; /* Make it a block element */
            padding: 10px; /* Add padding */
            border: 1px solid #ccc; /* Border color */
            border-radius: 5px; /* Rounded corners */
            margin-top: 5px; /* Space above the score */
            font-size: 18px; /* Adjust font size */
        }

        .testing-info {
            display: flex; /* Use flexbox for layout */
            /* Space between items */
            align-items: center; /* Center items vertically */
            margin-top: 10px; /* Reduced space above the section */
        }

        .batch-info {
            display: inline-block; /* Make it a block element */
            padding: 5px 10px; /* Add padding */
            border: 1px solid #ccc; /* Border color */
            border-radius: 5px; /* Rounded corners */
             /* Reduced space to the right */
        }

        .date-time {
            display: flex; /* Use flexbox for layout */
            align-items: center; /* Center items vertically */
            color: #888; /* Gray color for text */
        }

        .date-time i {
            margin-right: 5px; /* Space between icon and text */
        }

        .date-time p {
            margin: 0; /* Remove default margin */
            margin-right: 10px; /* Space between date/time elements */
        }
    </style>
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
                <i class="fas fa-clock"></i> <p style="margin: 0;">12:40 PM</p>
                <i class="fas fa-calendar-alt"></i> <p style="margin: 0;">03 Jan 2023</p>
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
