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
    <link rel="stylesheet" href="{{ asset('/css/student_history_exam.css') }}">
</head>

<body>
    @extends('layouts.app')

    @section('title', 'Exam')

    @section('content')
    <div class="main-content">
        <h1>Exam Overview</h1>

        <div class="tabs">
            <div class="tab active" data-tab="completed-exam">Completed Exams</div>
            <div class="tab" data-tab="upcoming-exam">Upcoming Exams</div>
        </div>

        <div class="content active" id="completed-exam">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th>Duration</th>
                        <th>Points</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Software Security</td>
                        <td>21/January/2024</td>
                        <td>1h</td>
                        <td>51 pt</td>
                        <td class="status">Completed</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Software Security</td>
                        <td>21/January/2024</td>
                        <td>1h</td>
                        <td>51 pt</td>
                        <td class="status">Completed</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="content" id="upcoming-exam">
            <p>No upcoming exams available.</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tabs = document.querySelectorAll('.tab');
            const contents = document.querySelectorAll('.content');

            tabs.forEach(tab => {
                tab.addEventListener('click', function () {
                    // Remove active class from all tabs
                    tabs.forEach(t => t.classList.remove('active'));
                    // Add active class to the clicked tab
                    this.classList.add('active');

                    // Hide all content
                    contents.forEach(content => content.classList.remove('active'));
                    // Show the content corresponding to the clicked tab
                    const activeContent = document.getElementById(this.getAttribute('data-tab'));
                    activeContent.classList.add('active');
                });
            });
        });
    </script>

    @endsection

</body>

</html>