<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('/css/dashboard.css') }}">
</head>

<body>
    <div class="container">
        @include('partials.student_sidebar')
        <div class="main-containter">
            <h1>Hello it is dashboard screen</h1>

        </div>
    </div>
    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>

</html>