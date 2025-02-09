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
    <link rel="stylesheet" href="{{ asset('/css/student_history_exam.css') }}">
</head>

<body>
@extends('layouts.app')

@section('title', 'Exam History')

@section('content')
    <div class="main-container">
        <div class="tab-container">
            <button class="tab-btn active" onclick="showTab('completed-exam')">
                <i class="fas fa-check-circle"></i> Completed Exams
            </button>
            <button class="tab-btn" onclick="showTab('upcoming-exam')">
                <i class="fas fa-calendar-alt"></i> Upcoming Exams
            </button>
        </div>

        <!-- Completed Exams -->
        <div class="content active" id="completed-exam">
            @if($completedExams->count() > 0)
                <table class="exam-table">
                    <thead>
                    <tr>
                        <th>No. </th>
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
                            <td>{{ $exam->subject->name ?? 'N/A' }}</td>
                            <td>{{ \Carbon\Carbon::parse($exam->start_time)->format('d/M/Y H:i') }}</td>
                            <td>{{ \Carbon\Carbon::parse($exam->end_time)->format('d/M/Y H:i') }}</td>
                            <td><span class="status completed">{{ ucfirst($exam->status) }}</span></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="no-data">
                    <i class="fas fa-exclamation-circle"></i> No completed exams available.
                </div>
            @endif
        </div>

        <!-- Upcoming Exams -->
        <div class="content" id="upcoming-exam">
            @if($upcomingExams->count() > 0)
                <table class="exam-table">
                    <thead>
                    <tr>
                        <th>No. </th>
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
                            <td>{{ $exam->subject->name ?? 'N/A' }}</td>
                            <td>{{ \Carbon\Carbon::parse($exam->start_time)->format('d/M/Y H:i') }}</td>
                            <td>{{ \Carbon\Carbon::parse($exam->end_time)->format('d/M/Y H:i') }}</td>
                            <td><span class="status upcoming">{{ ucfirst($exam->status) }}</span></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="no-data">
                    <i class="fas fa-calendar-times"></i> No upcoming exams available.
                </div>
            @endif
        </div>
    </div>

    <script>
        function showTab(tabId) {
            document.querySelectorAll('.content').forEach(content => content.classList.remove('active'));
            document.getElementById(tabId).classList.add('active');

            document.querySelectorAll('.tab-btn').forEach(tab => tab.classList.remove('active'));
            document.querySelector(`[onclick="showTab('${tabId}')"]`).classList.add('active');
        }
    </script>

    <style>

    </style>
@endsection



</body>

</html>
