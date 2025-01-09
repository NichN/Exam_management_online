function setActiveTab(tab) {
    document.querySelectorAll('.tab').forEach(tab => tab.classList.remove('active'));
    tab.classList.add('active');

    const selectedClass = tab.getAttribute('data-class');
    document.querySelectorAll('.student-container').forEach(container => {
        if (selectedClass === 'All') {
            container.style.display = 'block';
        } else if (container.id === selectedClass) {
            container.style.display = 'block';
        } else {
            container.style.display = 'none';
        }
    });
}


function filterStudents(className, tabElement) {
    document.querySelectorAll('.tab').forEach(tab => tab.classList.remove('active'));

    tabElement.classList.add('active');

    document.querySelectorAll('.student-container').forEach(container => {
        if (container.getAttribute('data-class') === className) {
            container.style.display = 'block';
        } else {
            container.style.display = 'none';
        }
    });
}
        