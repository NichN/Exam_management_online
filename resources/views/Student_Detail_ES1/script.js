document.addEventListener("DOMContentLoaded", function () {
    // Get all navigation items
    const navItems = document.querySelectorAll(".nav-item");

    // Add click handler to each nav item
    navItems.forEach((item) => {
        item.addEventListener("click", function (e) {
            // Remove active class from all items
            navItems.forEach((nav) => nav.classList.remove("active"));

            // Add active class to clicked item
            this.classList.add("active");

            // Store active state in localStorage
            localStorage.setItem("activeNav", this.textContent.trim());

            // You can add navigation logic here
            // For example:
            const route = this.textContent
                .trim()
                .toLowerCase()
                .replace(" ", "-");
            // window.location.href = `/${route}`;
        });
    });

    // Restore active state on page load
    const activeNav = localStorage.getItem("activeNav");
    if (activeNav) {
        navItems.forEach((item) => {
            if (item.textContent.trim() === activeNav) {
                item.classList.add("active");
            }
        });
    }
});


