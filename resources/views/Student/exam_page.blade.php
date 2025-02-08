<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .content {
            max-width: 900px;
            /* Increased width */
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .question-card {
            width: 100%;
            /* Full width inside content */
            background: #ffffff;
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 10px;
            border: 1px solid #ddd;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
            text-align: left;
            /* Align text to start */
        }

        .submit-btn {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #45a049;
        }

        /* Improved Modal Styling */
        .modal-content {
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    border: none;
    text-align: center;
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
    width: 100%;
    text-align: center;
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
    padding: 10px 20px;
    font-size: 1rem;
    font-weight: bold;
}

.progress {
    border-radius: 20px;
    overflow: hidden;
    background-color: #e0e0e0;
}

.progress-bar {
    background-color: #4CAF50;
    font-weight: bold;
    font-size: 1rem;
}

    </style>
</head>

<body>
    <div class="content">
        <h2>({{ request('subject') ?? 'Unknown Subject' }})</h2>
        <p>Duration: 1h 30min</p>

        @foreach($exam->questions as $index => $question)
            <div class="question-card" data-question-id="{{ $question->id }}" data-correct="{{ $question->correct_answer }}"
                data-points="{{ $question->points }}">
                <div class="question-header">
                    <strong>Question {{ $index + 1 }}</strong>
                </div>
                <div class="question-body">
                    <p>{{ $question->question_text }}</p>

                    @if($question->question_type === 'MCQ')
                                @php
        $options = json_decode($question->options, true);
                                @endphp
                                @foreach($options as $key => $option)
                                    <label>
                                        <input type="radio" name="q{{ $question->id }}" value="{{ $option }}">
                                        {{ $option }}
                                    </label><br>
                                @endforeach
                    @endif
                </div>
            </div>
        @endforeach

        <button class="submit-btn" onclick="submitExam()">Submit</button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-4 text-center">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold w-100" id="resultModalLabel">Exam Result</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
    
                <div class="modal-body">
                    <!-- Animated Icon -->
                    <img id="resultIcon" src="" alt="Result Icon" style="width: 120px; margin-bottom: 15px;">
    
                    <!-- Score Message -->
                    <h3 id="resultTitle" class="fw-bold"></h3>
                    <p id="resultMessage" class="fs-5"></p>
    
                    <!-- Score Progress Bar -->
                    <div class="progress mt-3" style="height: 25px;">
                        <div id="scoreProgress" class="progress-bar progress-bar-striped progress-bar-animated"
                            role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                </div>
    
                <div class="modal-footer border-0 d-flex justify-content-center">
                    <button type="button" class="btn btn-primary px-4 py-2 fw-bold"
                        onclick="window.location.href='/student/dashboard'">
                        Back to Index
                    </button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function submitExam() {
            let answers = {};

            // Collect selected answers
            document.querySelectorAll('.question-card').forEach((question) => {
                let questionId = question.getAttribute('data-question-id');
                let selectedAnswer = question.querySelector('input[type="radio"]:checked');

                if (selectedAnswer) {
                    answers[questionId] = selectedAnswer.value;
                }
            });

            console.log("Submitting answers:", answers);

            // Send answers to backend
            fetch('/exam/{{ $exam->id }}/submit', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ answers: answers })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.score !== undefined && data.total !== undefined) {
                        let percentage = (data.score / data.total) * 100;
                        let resultIcon = document.getElementById('resultIcon');
                        let resultTitle = document.getElementById('resultTitle');
                        let resultMessage = document.getElementById('resultMessage');
                        let scoreProgress = document.getElementById('scoreProgress');

                        if (percentage >= 70) {
                            resultIcon.src = "https://media.giphy.com/media/3o7aD2saalBwwftBIY/giphy.gif"; // Success GIF
                            resultTitle.innerText = "Congratulations! 🎉";
                            resultMessage.innerText = `You passed with a great score of ${data.score} / ${data.total}`;
                            scoreProgress.style.backgroundColor = "#4CAF50";
                        } else {
                            resultIcon.src = "https://media.giphy.com/media/3o6Zt481isNVuQI1l6/giphy.gif"; // Failure GIF
                            resultTitle.innerText = "Keep Trying! 😢";
                            resultMessage.innerText = `You scored ${data.score} / ${data.total}. Try again!`;
                            scoreProgress.style.backgroundColor = "#d9534f";
                        }

                        scoreProgress.style.width = percentage + "%";
                        scoreProgress.setAttribute("aria-valuenow", percentage);

                        // Show the modal
                        new bootstrap.Modal(document.getElementById('resultModal')).show();
                    } else {
                        console.error("Invalid response:", data);
                    }
                })
                .catch(error => {
                    console.error("AJAX request failed:", error);
                    alert('Something went wrong. Please try again.');
                });
        }



    </script>

</body>

</html>