document.addEventListener("DOMContentLoaded", function () {
    fetchExams();

    // Add click event listeners to tabs
    document.querySelectorAll(".task-tab").forEach(tab => {
        tab.addEventListener("click", function () {
            setActiveTab(this);
        });
    });
});

function fetchExams() {
    fetch("http://127.0.0.1:8000/api/exam", {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
            "Authorization": "Bearer YOUR_ACCESS_TOKEN"  // Replace with actual token
        }
    })
    .then(response => response.text()) // Convert response to text first for debugging
    .then(text => {
        console.log("Raw API Response:", text);
        try {
            const exams = JSON.parse(text);
            console.log("Parsed JSON:", exams);
            displayExams(exams);
        } catch (error) {
            console.error("JSON Parse Error:", error);
        }
    })
    .catch(error => {
        console.error("Error fetching exams:", error);
    });
}

function displayExams(exams) {
    const allTasksContainer = document.querySelector("#AllTasks .tasks-container");
    const dueTodayContainer = document.querySelector("#DueToday .tasks-container");
    const overdueContainer = document.querySelector("#Overdue .tasks-container");

    if (!allTasksContainer || !dueTodayContainer || !overdueContainer) {
        console.error("Error: Task containers not found");
        return;
    }

    // Clear previous tasks
    allTasksContainer.innerHTML = "";
    dueTodayContainer.innerHTML = "";
    overdueContainer.innerHTML = "";

    const today = new Date().toISOString().split('T')[0]; // Get today's date (YYYY-MM-DD)

    exams.forEach(exam => {
        const examDate = exam.start_time.split(" ")[0]; // Extract YYYY-MM-DD from start_time
        const taskHTML = `
            <div class="card">
                <h3>${exam.title}</h3>
                <p>${exam.description}</p>
                <p>Start Time: ${exam.start_time}</p>
                <p>End Time: ${exam.end_time}</p>
                <p>Type: ${exam.exam_type}</p>
                <button class="view-details"><a href="/exam/${exam.id}">View Details</a></button>
            </div>`;

        // Always add to "All Tasks"
        allTasksContainer.insertAdjacentHTML("beforeend", taskHTML);

        // Categorize tasks
        if (examDate === today) {
            dueTodayContainer.insertAdjacentHTML("beforeend", taskHTML);
        } else if (examDate < today) {
            overdueContainer.insertAdjacentHTML("beforeend", taskHTML);
        }
    });
}

// ✅ Improved function to properly toggle active tabs and show/hide content
function setActiveTab(tabElement) {
    document.querySelectorAll('.task-tab').forEach(tab => tab.classList.remove('active'));
    tabElement.classList.add('active');

    // Hide all sections
    document.querySelectorAll('.task-container').forEach(container => {
        container.style.display = "none";
    });

    // Show only the selected section
    const dataClass = tabElement.getAttribute('data-class');
    const container = document.getElementById(dataClass.replace(/\s/g, ''));
    if (container) {
        container.style.display = "block";
    }
}
