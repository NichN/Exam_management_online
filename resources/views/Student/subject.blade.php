<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('/css/student_subject.css') }}">
</head>

<body>
    @extends('layouts.app')

    @section('title', 'My Subject')

    @section('content')

    <h1>All Subjects</h1>

    <!-- Card 1 -->
    <div class="card-row">
        <!-- Card 1 -->
        <div class="card highlight">
            <div class="card-left">
                <div class="icon" style="background-color: #b39ddb;">
                    <img src="https://img.icons8.com/ios-filled/50/000000/source-code.png" alt="Icon">
                </div>
                <div class="details">
                    <h2>Advance Web Development</h2>
                    <p>Lecturer: Lavy Sao</p>
                    <div class="info">
                        <span><img src="https://img.icons8.com/ios-filled/50/000000/clock.png" alt="Clock">48
                            hours</span>
                        <span><img src="https://img.icons8.com/ios-filled/50/000000/classroom.png" alt="Lessons">16
                            Lessons</span>
                        <span><img src="https://img.icons8.com/ios-filled/50/000000/document.png"
                                alt="Documents">2</span>
                    </div>
                </div>
            </div>
            <div class="status incompleted">Incompleted</div>
        </div>

        <!-- Card 2 -->
        <div class="card highlight">
            <div class="card-left">
                <div class="icon" style="background-color: #81c784;">
                    <img src="https://img.icons8.com/ios-filled/50/000000/bar-chart.png" alt="Icon">
                </div>
                <div class="details">
                    <h2>Business Intelligence</h2>
                    <p>Lecturer: Sok Dy</p>
                    <div class="info">
                        <span><img src="https://img.icons8.com/ios-filled/50/000000/clock.png" alt="Clock">48
                            hours</span>
                        <span><img src="https://img.icons8.com/ios-filled/50/000000/classroom.png" alt="Lessons">16
                            Lessons</span>
                        <span><img src="https://img.icons8.com/ios-filled/50/000000/document.png"
                                alt="Documents">2</span>
                    </div>
                </div>
            </div>
            <div class="status completed">Completed</div>
        </div>

        <!-- Card 3 -->
        <div class="card highlight">
            <div class="card-left">
                <div class="icon" style="background-color: #e57373;">
                    <img src="https://img.icons8.com/ios-filled/50/000000/security-shield.png" alt="Icon">
                </div>
                <div class="details">
                    <h2>Business Intelligence</h2>
                    <p>Lecturer: Sok Dy</p>
                    <div class="info">
                        <span><img src="https://img.icons8.com/ios-filled/50/000000/clock.png" alt="Clock">48
                            hours</span>
                        <span><img src="https://img.icons8.com/ios-filled/50/000000/classroom.png" alt="Lessons">16
                            Lessons</span>
                        <span><img src="https://img.icons8.com/ios-filled/50/000000/document.png"
                                alt="Documents">2</span>
                    </div>
                </div>
            </div>
            <div class="status completed">Completed</div>
        </div>
    </div>
    @endsection
</body>

</html>