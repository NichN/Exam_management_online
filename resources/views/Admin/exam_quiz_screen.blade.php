<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Task</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/all_task.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/exam_quiz_style.css') }}">
    <script src="{{ asset('/js/menu.js') }}"></script>
    <script src="{{ asset('/js/exam_quiz.js') }}"></script>
</head>
<body>
<div class="container">
        @include('partials.admin_sidebar')
</div>

<div class="alltask-container">
    <div class="header-with-button">
            <a href="/admin/alltask" class="back-btn">
                <i class="fas fa-arrow-left"></i>
            </a>
        <h4>Create New Task</h4>
        <button class="submit-task-btn" onclick="submitTask()">Submit</button>
    </div>
    <div class="task-container">
        <div class="header-task">
            <div class="form-group">
                <textarea name="title" id="title" class="title" placeholder="Untitled form">Untitled form</textarea>
            </div>
            <div class="form-group">
                <textarea name="description" id="description" class="description" placeholder="form decription"></textarea>
            </div>
        </div>
        </div>
        <div class="task-container" id="task-container">
    <div class="main-task">
        <div class="form-group">
            <textarea name="question" id="question" class="question" placeholder="Untitled question"></textarea>
            <!-- Question Type Selection -->
            <div class="form-group">
                <select id="question-type" class="question-type" onchange="changeQuestionType(this)">
                    <option value="multiple-choice">Multiple Choice</option>
                    <option value="paragraph">Paragraph</option>
                </select>
            </div>
        </div>

        <!-- Dynamic Question Input -->
        <div id="question-input" class="question-input">
            <!-- Default is Multiple Choice -->
            <div class="multiple-choice-options">
                <div class="option">
                    <input type="text" class="option-input" placeholder="Option 1">
                    <button class="remove-option-btn" onclick="removeOption(this)">X</button>
                </div>
                <div class="option">
                    <input type="text" class="option-input" placeholder="Option 2">
                    <button class="remove-option-btn" onclick="removeOption(this)">X</button>
                </div>
                <button class="add-option-btn" onclick="addOption(this)">Add Option</button>
            </div>
        </div>
    </div>
</div>
<div class="add-question">
<!-- Button to Add New Question -->
<button class="add-question-btn" onclick="addQuestion()">Add Question</button>
</div>

</div>
</body>


</html>