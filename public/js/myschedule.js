function setActiveTab(tab) {
    document.querySelectorAll('.task-tab').forEach(tabElement => {
        tabElement.classList.remove('active');
    });
    tab.classList.add('active');
    const selectedClass = tab.getAttribute('data-class');
    document.querySelectorAll('.task-container').forEach(container => {
        container.classList.remove('active');
        if (container.id === selectedClass) {
            container.classList.add('active');
        }
    });
}

function addTaskToContainer(containerId, taskHTML) {
    document.querySelector(`#${containerId} .tasks-container`).insertAdjacentHTML('beforeend', taskHTML);
}

function syncAllTasks() {
    const allTasksContainer = document.querySelector("#All\\ Tasks .tasks-container");
    allTasksContainer.innerHTML = ""; // Clear existing tasks
    console.log("Cleared All Tasks container.");

    ["DueToday", "Overdue"].forEach(sectionId => {
        console.log(`Processing section: ${sectionId}`);
        const sectionTasksContainer = document.querySelector(`#${sectionId} .tasks-container`);

        if (sectionTasksContainer) {
            const tasks = sectionTasksContainer.children; // Get all tasks
            console.log(`Found ${tasks.length} tasks in section: ${sectionId}`);

            Array.from(tasks).forEach(task => {
                const clonedTask = task.cloneNode(true);
                allTasksContainer.appendChild(clonedTask);
                console.log(`Task cloned and added to All Tasks: ${clonedTask.outerHTML}`);
            });
        } else {
            console.log(`No task container found for section: ${sectionId}`);
        }
    });

    console.log("All tasks synced successfully.");
}

// function addNewTask() {
//     const taskName = prompt("Enter the name of the new task:");
//     const dueDate = prompt("Enter the due date (YYYY-MM-DD):");
//     const dueTime = prompt("Enter the due time (HH:MM):");
//     const today = new Date().toISOString().split('T')[0]; // Get today's date in YYYY-MM-DD format

//     if (taskName && dueDate && dueTime) {
//         const taskHTML = `
//             <div class="card">
//                 <h3>${taskName}</h3>
//                 <p><strong>Major:</strong> General</p>
//                 <div class="details">
//                     <p><i class="fas fa-calendar-alt batch-icon"></i> ${dueDate}</p>
//                     <p><i class="fas fa-clock batch-icon"></i> ${dueTime}</p>
//                 </div>
//                 <button class="view-details">View Details</button>
//             </div>`;

//         // Add to "All Tasks" by default
//         addTaskToContainer("All Tasks", taskHTML);

//         // Determine if it's "Due Today" or "Overdue"
//         if (dueDate === today) {
//             addTaskToContainer("Due Today", taskHTML);
//         } else if (dueDate < today) {
//             addTaskToContainer("Overdue", taskHTML);
//         }

//         // Sync all tasks again
//         syncAllTasks();
//     }
// }

// On page load: Sync tasks from "Due Today" and "Overdue" into "All Tasks"
window.onload = function () {
    syncAllTasks();
};