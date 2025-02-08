<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Major</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" 
            integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" 
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/department.css') }}"> 
    <script src="{{ asset('/js/menu.js') }}"></script>
</head>
<body>
<div class="container">
    @include('partials.admin_sidebar')
</div>
<div class="container text-center">
    <h2 class="mt-3 text-center">Subject</h2>
    <hr class="divider mb-4">
    <div class="row batch-container">
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        fetch('http://127.0.0.1:8000/api/subjects')
            .then(response => response.json())
            .then(data => {
                const batchContainer = document.querySelector('.batch-container');
                batchContainer.innerHTML = '';
                data.forEach(department => {
                    if (department.courses) {
                        department.courses.forEach(course => {
                            if (course.subjects) {
                                course.subjects.forEach(subject => {
                                    const batchHTML = `
                                        <div class="col">
                                            <div class="card shadow-sm border-0">
                                                <div class="card-body">
                                                    <i class="fas fa-laptop laptop"></i>
                                                    <h5 class="card-title">${subject.name.toUpperCase()}</h5>
                                                    <button><a href="/admin/department/detail/${subject.id}">View Details <i class="fas fa-arrow-right"></i></button>
                                            </div>
                                            </div>
                                        </div>
                                    `;
                                    batchContainer.innerHTML += batchHTML;
                                });
                            }
                        });
                    }
                });
            })
            .catch(error => console.error('Error fetching departments:', error));
    });
</script>
</body>
</html>
