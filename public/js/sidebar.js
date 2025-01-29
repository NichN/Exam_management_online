document.addEventListener('DOMContentLoaded', function () {
    const sidebarLinks = document.querySelectorAll('.side-menu a');

    sidebarLinks.forEach(link => {
        link.addEventListener('click', function () {
            // Remove active class from all links
            sidebarLinks.forEach(link => link.classList.remove('active'));

            // Add active class to the clicked link
            this.classList.add('active');
        });
    });
});