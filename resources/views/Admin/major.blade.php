<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Department</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" 
            integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" 
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/major.css') }}"> 
    <script src="{{ asset('/js/menu.js') }}"></script>
    <style>
        .department-box {
            cursor: pointer;
            border: 1px solid #ddd;
            padding: 20px;
            text-align: center;
            margin: 10px 0;
            transition: background-color 0.3s;
        }
        .department-box:hover {
            background-color: #f1f1f1;
        }
        .subjects-container {
            display: none;
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-top: none;
        }
        .subject-box {
            border: 1px solid #ddd;
            padding: 15px;
            margin: 10px 0;
        }
        .subject-box h6 {
            font-size: 1.1em;
            margin-bottom: 0;
        }
        .row {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        @include('partials.admin_sidebar')
    </div>
<div class="container">
    <h2 style="text-align: center" class="mt-3">Subject</h2>
    <hr class="divider mb-4">
    <div class="row batch-container">
        <!-- Department Box 1 -->
        <div class="col">
            <a href="{{ route('major') }}">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <i class="fas fa-laptop laptop"></i>
                        <h5 class="card-title">Web Development</h5>
                        <p class="card-text">Software Development</p>
                        <button><a href="/admin/department/detail/">
                            View Details <i class="fas fa-arrow-right"></i></button>
                        </a>
                    </div>
                </div>
            </a>
        </div>

        <!-- Department Box 2 -->
        <div class="col">
            <a href="{{ route('major') }}">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <i class="fas fa-laptop laptop"></i>
                        <h5 class="card-title">Web Development</h5>
                        <p class="card-text">Software Development</p>
                        <button><a href="/admin/department/detail/">
                            View Details <i class="fas fa-arrow-right"></i></button>
                        </a>
                    </div>
                </div>
            </a>
        </div>

        <!-- Department Box 3 -->
        <div class="col">
            <a href="{{ route('major') }}">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <i class="fas fa-laptop laptop"></i>
                        <h5 class="card-title">Web Development</h5>
                        <p class="card-text">Software Development</p>
                        <button><a href="/admin/department/detail/">
                            View Details <i class="fas fa-arrow-right"></i></button>
                        </a>
                    </div>
                </div>
            </a>
        </div>
</div>
</body>
</html>
