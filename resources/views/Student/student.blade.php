<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Profile</title>
    <link rel="stylesheet" href="{{ asset('/css/student_pf.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/student_result.css') }}">
</head>
<body>
    <div class="container">
        @extends('layouts.app')
        @section('title', 'Result')
        @section('content')
        <div class="main-content">
            <!-- Profile Section -->
            <div class="profile-section">
                <div>
                    <h2>{{ auth()->user()->name }}</h2> 
                    <p>ID: {{ auth()->user()->id }}</p> 
                </div>
                <div class="course-info">
                    <span class="icon"><i class="fas fa-university"></i> Norton University</span>
                    <div>Computer Study</div>
                    <div>Year 4, Semester 1</div>
                    <div>Software Development</div>
                    <div>2024 - 2025</div>
                </div>
                <div class="form-group">
                    <label for="name-english">Name English</label>
                    <input type="text" id="name" value="{{ auth()->user()->name }}" />
                </div>
                <div class="form-group">
                    <label for="identity">Identity</label>
                    <input type="text" id="identity" value="ID: {{ auth()->user()->id }}" readonly />
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" value="{{ auth()->user()->email }}" />
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" value="{{ auth()->user()->phone ?? '' }}" />
                </div>
                <button id="save-button" class="save-button">Save</button>
            </div>
        </div>
        @endsection
    </div>
    @endsection
    <script src="script.js"></script>
</body>
</html>
