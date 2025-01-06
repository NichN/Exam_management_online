const tabs = document.querySelectorAll('.tab');
const contents = document.querySelectorAll('.content');

tabs.forEach(tab => {
    tab.addEventListener('click', () => {
        // Remove active class from all tabs and contents
        tabs.forEach(t => t.classList.remove('active'));
        contents.forEach(content => content.classList.remove('active'));

        // Add active class to the clicked tab
        tab.classList.add('active');

        // Show the associated content
        const target = tab.getAttribute('data-tab');
        document.getElementById(target).classList.add('active');
    });
});