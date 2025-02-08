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

    <link rel="stylesheet" href="{{ asset('/css/student_subject.css') }}">
</head>

<body>
    @extends('layouts.app')

    @section('title', 'My Subject')

    @section('content')

    <h1 style="padding-left: 70px; padding-bottom: 20px">All Subjects</h1>

    <div class="card-row">
        <div class="card highlight">
            <div class="card-left">
                <div class="icon" style="background-color: #b39ddb;">
                    <img src="https://img.icons8.com/ios-filled/50/000000/source-code.png" alt="Icon">
                </div>
                <div class="details">
                    <h2>Advance Web Development</h2>
                    <p>Lecturer: Lavy Sao</p>
                </div>
            </div>
            <div class="status incompleted">Incompleted</div>
        </div>
    </div>
    @endsection
</body>

</html>
