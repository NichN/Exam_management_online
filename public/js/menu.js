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

