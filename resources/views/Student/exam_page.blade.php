<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/exam_page.css') }}">
    <style>
        /* Custom Modal Styles */
        .modal-content {
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            border: none;
        }

        .modal-header {
            background-color: #4CAF50;
            color: white;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            padding: 15px 20px;
        }

        .modal-header .modal-title {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .modal-header .btn-close {
            filter: invert(1);
        }

        .modal-body {
            padding: 20px;
            font-size: 1.1rem;
            color: #333;
        }

        .modal-footer {
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
            padding: 15px 20px;
            background-color: #f8f9fa;
        }

        .modal-footer .btn {
            border-radius: 8px;
            padding: 8px 20px;
            font-size: 1rem;
        }

        .modal-footer .btn-secondary {
            background-color: #6c757d;
            border: none;
            color: white;
        }

        .modal-footer .btn-secondary:hover {
            background-color: #5a6268;
        }

        #resultMessage {
            font-size: 1.2rem;
            font-weight: bold;
            color: #4CAF50;
            text-align: center;
            margin: 0;
        }

        .submit-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
<div class="header">
    <div class="profile">
        <img src="https://via.placeholder.com/50" alt="Profile Picture">
        <div>
            <div>{{ auth()->user()->name }}</div>
            <div>{{ auth()->user()->id }}</div>
        </div>
    </div>
    <div class="university">
        <div>Questions (Software Security)</div>
        <img src="https://via.placeholder.com/60" alt="University Logo">
    </div>
</div>

<div class="content">
    <h2>Questions (Software Security)</h2>
    <p>Duration: 1h 30min</p>

    @foreach($exam->questions as $index => $question)
        <div class="question-card">
            <div class="question-header">
                <div>Question {{ $index + 1 }}</div>
                <div>⏱ {{ \Carbon\Carbon::parse($question->created_at)->diffInMinutes(\Carbon\Carbon::now()) }} min</div>
            </div>
            <div class="question-body">
                <p>{{ $question->question_text }}</p>

                @if($question->question_type === 'MCQ')
                    @php
                        $options = json_decode($question->options, true);
                    @endphp
                    @foreach($options as $key => $option)
                        <label><input type="radio" name="q{{ $loop->parent->index + 1 }}"> {{ $option }}</label><br>
                    @endforeach
                @endif
            </div>
        </div>
    @endforeach

    <!-- Submit Button -->
    <button class="submit-btn" data-bs-toggle="modal" data-bs-target="#resultModal" onclick="submitExam()">Submit</button>
</div>

<!-- Modal -->
<div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resultModalLabel">Exam Result</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="resultMessage"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function submitExam() {
        let totalScore = 0;
        let totalQuestions = {{ $exam->questions->count() }};
        let totalPoints = 0;

        @foreach($exam->questions as $question)
        const selectedAnswer = document.querySelector('input[name="q{{ $loop->index + 1 }}"]:checked');
        if (selectedAnswer) {
            const userAnswer = selectedAnswer.value;

            // Check if the selected answer is correct
            if (userAnswer === "{{ $question->correct_answer }}") {
                totalScore += {{ $question->points }};
            }
        }
        totalPoints += {{ $question->points }};
        @endforeach

        // Show result in the modal
        const resultMessage = "Your total score is: " + totalScore + "/" + totalPoints;
        document.getElementById('resultMessage').textContent = resultMessage;
    }
</script>
</body>

</html>
