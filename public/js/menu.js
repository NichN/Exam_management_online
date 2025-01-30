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

    typeSelect.addEventListener("change", function () {
        const selectedValue = typeSelect.value;

        // Show "Next" button only for Quiz and Exam
        nextButton.style.display = (selectedValue === "type2") ? "inline-block" : "none";

        // Hide "Submit" button if Quiz or Exam is selected, show otherwise
        submitButton.style.display = (selectedValue === "type2") ? "none" : "inline-block";

        // Show "Attachment" field only for Assignment
        attachmentGroup.style.display = (selectedValue === "type1") ? "block" : "none";
    });

    // Initially hide the Next button and Attachment field
    nextButton.style.display = "none";
    submitButton.style.display = "inline-block"; // Default is visible
    attachmentGroup.style.display = "none";
});   
