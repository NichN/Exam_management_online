function setActive(selectedItem) {
    const menuItems = document.querySelectorAll('.menu-item');

    menuItems.forEach(item => {
            item.classList.remove('active');
    });

    selectedItem.classList.add('active');
}
    document.addEventListener('DOMContentLoaded', () => {
    const menuItems = document.querySelectorAll('.menu-item');

    const activeIndex = localStorage.getItem('activeMenuItemIndex');
    if (activeIndex !== null) {
        menuItems[activeIndex].classList.add('active');
    }
    menuItems.forEach((item, index) => {
        item.addEventListener('click', () => {
            menuItems.forEach(i => i.classList.remove('active'));
            item.classList.add('active');

            localStorage.setItem('activeMenuItemIndex', index);
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const typeSelect = document.querySelector(".type");
    const nextButton = document.querySelector(".next-task-btn");
    const submitButton = document.querySelector(".submit-task-btn");
    const attachmentGroup = document.querySelector(".attachment-group");

    document.addEventListener("DOMContentLoaded", function () {
        const menuElement = document.querySelector("#menu");
        if (menuElement) {
            menuElement.style.display = "block"; // Modify the style safely
        } else {
            console.warn("Menu element not found!");
        }
    });
    // Initially hide the Next button and Attachment field
    nextButton.style.display = "none";
    submitButton.style.display = "inline-block"; // Default is visible
    attachmentGroup.style.display = "none";
});   
