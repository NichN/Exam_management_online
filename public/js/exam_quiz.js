// Add a new question
    function addQuestion() {
        const taskContainer = document.getElementById("task-container");

        // Create a new question element
        const newQuestion = document.createElement("div");
        newQuestion.className = "main-task";
        newQuestion.innerHTML = `
            <div class="form-group">
                <textarea name="question" class="question" placeholder="Untitled question"></textarea>
                <div class="form-group">
                    <select class="question-type" onchange="changeQuestionType(this)">
                        <option value="multiple-choice">Multiple Choice</option>
                        <option value="paragraph">Paragraph</option>
                    </select>
                </div>
            </div>
            <div class="question-input">
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
        `;
        taskContainer.appendChild(newQuestion);
    }

    // Add a new option
    function addOption(button) {
        const optionsContainer = button.parentElement;
        const newOption = document.createElement("div");
        newOption.className = "option";
        newOption.innerHTML = `
            <input type="text" class="option-input" placeholder="New Option">
            <button class="remove-option-btn" onclick="removeOption(this)">X</button>
        `;
        optionsContainer.insertBefore(newOption, button);
    }

    // Remove an option
    function removeOption(button) {
        button.parentElement.remove();
    }

    // Change question type dynamically
    function changeQuestionType(select) {
        const questionInput = select.parentElement.parentElement.nextElementSibling;
        if (select.value === "paragraph") {
            questionInput.innerHTML = `
                <textarea class="paragraph-input" placeholder="Write your answer here..."></textarea>
            `;
        } else {
            questionInput.innerHTML = `
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
            `;
        }
    }