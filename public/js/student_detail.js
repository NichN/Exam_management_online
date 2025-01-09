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