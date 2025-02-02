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
    <link rel="stylesheet" href="{{ asset('/css/department.css') }}"> 
    <script src="{{ asset('/js/menu.js') }}"></script>
</head>
<body>
<div class="container">
    @include('partials.admin_sidebar')
</div>
<div class="container text-center">
    <h2 style="text-align: center" class="mt-3">Department</h2>
    <hr class="divider mb-4">
    <div class="row batch-container">
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        fetch('http://127.0.0.1:8000/api/departments')
            .then(response => response.json())
            .then(data => {
                const batchContainer = document.querySelector('.batch-container');
                batchContainer.innerHTML = '';

                data.forEach(department => {
                    const batchHTML = `
                        <div class="col">
                            <a href="{{ route('major') }}">
                                <div class="card shadow-sm border-0">
                                    <div class="card-body">
                                        <i class="fas fa-laptop laptop"></i>
                                        <h5 class="card-title">${department.name.toUpperCase()}</h5>
                                        <p class="card-text">${department.description}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    `;
                    batchContainer.innerHTML += batchHTML;
                });
            })
            .catch(error => console.error('Error fetching departments:', error));
    });
</script>
</body>
</html>
