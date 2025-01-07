<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('/css/exam_page.css') }}">
</head>

<body>
    <div class="header">
        <div class="profile">
            <img src="https://via.placeholder.com/50" alt="Profile Picture">
            <div>
                <div>Srey Nich</div>
                <div>B20229934</div>
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

        <div class="question-card">
            <div class="question-header">
                <div>Questions 1</div>
                <div>⏱ 1h:25min</div>
            </div>
            <div class="question-body">
                <p>What is the capital city of Cambodia?</p>
                <label><input type="radio" name="q1"> Hanoi</label>
                <label><input type="radio" name="q1"> Phnom Penh</label>
                <label><input type="radio" name="q1"> Bangkok</label>
                <label><input type="radio" name="q1"> Jakarta</label>
            </div>
        </div>

        <div class="question-card">
            <div class="question-header">
                <div>Questions 2</div>
                <div>⏱ 1h:00min</div>
            </div>
            <div class="question-body">
                <p>What is the capital city of Cambodia?</p>
                <label><input type="radio" name="q2"> Hanoi</label>
                <label><input type="radio" name="q2"> Phnom Penh</label>
                <label><input type="radio" name="q2"> Bangkok</label>
                <label><input type="radio" name="q2"> Jakarta</label>
            </div>
        </div>

        <div class="question-card">
            <div class="question-header">
                <div>Questions 3</div>
                <div>⏱ 59min</div>
            </div>
            <div class="question-body">
                <p>What is the capital city of Cambodia?</p>
                <label><input type="radio" name="q3"> Hanoi</label>
                <label><input type="radio" name="q3"> Phnom Penh</label>
                <label><input type="radio" name="q3"> Bangkok</label>
                <label><input type="radio" name="q3"> Jakarta</label>
            </div>
        </div>

        <button class="submit-btn">Submit</button>
    </div>
</body>

</html>