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
                @if($completedExams->count() > 0)
                    <table>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Subject</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($completedExams as $key => $exam)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $exam->title }}</td>
                                <td>{{ $exam->subject->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($exam->start_time)->format('d/M/Y H:i') }}</td>
                                <td>{{ \Carbon\Carbon::parse($exam->end_time)->format('d/M/Y H:i') }}</td>
                                <td class="status">{{ ucfirst($exam->status) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No completed exams available.</p>
                @endif
            </div>

            <div class="content" id="upcoming-exam">
                @if($upcomingExams->count() > 0)
                    <table>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Subject</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($upcomingExams as $key => $exam)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $exam->title }}</td>
                                <td>{{ $exam->subject->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($exam->start_time)->format('d/M/Y H:i') }}</td>
                                <td>{{ \Carbon\Carbon::parse($exam->end_time)->format('d/M/Y H:i') }}</td>
                                <td class="status">{{ ucfirst($exam->status) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No upcoming exams available.</p>
                @endif
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const tabs = document.querySelectorAll('.tab');
                const contents = document.querySelectorAll('.content');

                tabs.forEach(tab => {
                    tab.addEventListener('click', function () {
                        tabs.forEach(t => t.classList.remove('active'));
                        this.classList.add('active');

                        contents.forEach(content => content.classList.remove('active'));
                        const activeContent = document.getElementById(this.getAttribute('data-tab'));
                        activeContent.classList.add('active');
                    });
                });
            });
        </script>

    @endsection

</body>

</html>
