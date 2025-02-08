<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department Courses</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 900px;
            margin: 50px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .divider {
            border-top: 3px solid #007bff;
            width: 50%;
            margin: 20px auto;
        }
        .course-card {
            background: #f0f0f0;
            border-left: 5px solid #007bff;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
            box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
        }
        .course-card h4 {
            color: #007bff;
            font-weight: bold;
        }
        .subject-list {
            list-style: none;
            padding-left: 0;
        }
        .subject-list li {
            background: #ffffff;
            padding: 8px;
            margin: 5px 0;
            border-radius: 5px;
            box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
        }
        .subject-list li i {
            color: #28a745;
            margin-right: 10px;
        }
    </style>
</head>
<body>

    <div class="container text-center">
        <h2 class="mt-3">{{ $department->name }}</h2>
        <p>{{ $department->description }}</p>
        <hr class="divider mb-4">

        <h3>Courses</h3>
        <div id="course-list">
            @foreach ($department->courses as $course)
                <div class="course-card">
                    <h4><i class="fas fa-book"></i> {{ $course->name }}</h4>
                    <p>{{ $course->description ?? 'No description available' }}</p>

                    <h5><i class="fas fa-list-ul"></i> Subjects:</h5>
                    <ul class="subject-list">
                        @foreach ($course->subjects as $subject)
                            <li><i class="fas fa-check-circle"></i> {{ $subject->name }}</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
