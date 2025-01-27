<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Profile</title>
    <link rel="stylesheet" href="{{ asset('/css/student_pf.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
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

    <script>
        const saveButton = document.getElementById('save-button');
        
        saveButton.addEventListener('click', function() {
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;

            const token = localStorage.getItem('authToken');
            const userId = {{ auth()->user()->id }};

            const data = {
                name: name,
                email: email,
                phone: phone
            };
            fetch('http://127.0.0.1:8000/api/profile-update', {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Profile updated successfully!');
                    console.log('Updated data:', data.data);
                } else {
                    alert('Failed to update profile.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>
