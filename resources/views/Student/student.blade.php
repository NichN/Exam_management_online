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
                    <label for="name">Name</label>
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
                <button id="saved-button" class="save-button">Save</button>
            </div>
        </div>
        @endsection
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('saved-button').addEventListener('click', async function() {
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const token = localStorage.getItem('authToken');

        if (!token) {
            alert('You are not logged in!');
            return;
        }
        const data = { name, email };

        try {
            const response = await fetch('http://127.0.0.1:8000/api/profile-update', {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`,
                },
                body: JSON.stringify(data),
            });

            const responseData = await response.json();

            if (response.ok) {
                alert('Profile updated successfully!');
                document.getElementById('name').value = responseData.name;
                document.getElementById('email').value = responseData.email;
            } else {
                alert(responseData.message || 'Failed to update profile.');
            }
        } catch (error) {
            console.error('Error updating profile:', error);
            alert('An error occurred. Please try again.');
        }
    });
});
</script>
</html>
