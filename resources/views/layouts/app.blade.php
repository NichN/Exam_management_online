<!-- filepath: /Users/sunnasy/Desktop/Co4_ES1/Advance Web/EXAM-ONLINE/resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('/css/dashboard.css') }}">
</head>

<body>
    <div class="container">
        <!-- Sidebar -->
        @include('partials.student_sidebar')
        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>

</html>