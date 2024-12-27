// Get all menu items
const menuItems = document.querySelectorAll(".sidebar nav ul li");

// Add click event listener to each menu item
menuItems.forEach((item) => {
    item.addEventListener("click", function () {
        // Remove active class from all items
        menuItems.forEach((item) => item.classList.remove("active"));

        // Add active class to clicked item
        this.classList.add("active");

        // Get the clicked menu item's text
        const menuText = this.textContent.trim();

        // Handle different menu items
        switch (menuText) {
            case "Dashboard":
                console.log("Navigate to Dashboard");
                // Add your dashboard navigation logic here
                break;
            case "Department":
                console.log("Navigate to Department");
                // Add your department navigation logic here
                break;
            case "Student":
                console.log("Navigate to Student");
                // Add your student navigation logic here
                break;
            case "My Schedule":
                console.log("Navigate to Schedule");
                // Add your schedule navigation logic here
                break;
            case "All Task":
                console.log("Navigate to Tasks");
                // Add your tasks navigation logic here
                break;
        }
    });
});

// Add click event listener for the Log out link
const logoutLink = document.getElementById("logout-link");

logoutLink.addEventListener("click", function (event) {
    event.preventDefault(); // Prevent the default anchor behavior
    alert("Logging out..."); // Test alert
    console.log("Logging out...");

    // Redirect to login page or perform logout action
    // For example:
    // window.location.href = 'login.html'; // Redirect to login page
});

// Add click event listener for the Back button
const backButton = document.getElementById("back-button");

backButton.addEventListener("click", function () {
    // Logic to go back to the previous page or section
    console.log("Going back...");
    // For example, you can redirect to the dashboard
    // window.location.href = 'dashboard.html'; // Redirect to dashboard
});

// Add click event listener for the notification icon
const notificationIcon = document.getElementById("notification-icon");

notificationIcon.addEventListener("click", function () {
    alert("Notification icon clicked");
});

// Add click event listener for the user icon
const userIcon = document.getElementById("user-icon");

userIcon.addEventListener("click", function () {
    alert("User icon clicked");
});
