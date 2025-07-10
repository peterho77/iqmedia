const dropdownBtns = document.querySelectorAll(".dropdown-btn");

dropdownBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
        btn.nextElementSibling.classList.toggle("show");
        btn.classList.toggle("rotate");
    });
});

// đóng thanh sidebar
const sidebar = document.querySelector("#sidebar");
const toggleSidebar = document.querySelector(".toggle-sidebar-btn");

toggleSidebar.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    dropdownBtns.forEach((btn) => {
        btn.nextElementSibling.classList.remove("show");
    });
    toggleSidebar.classList.toggle("rotate");
    sidebar.previousElementSibling.classList.toggle("visually-hidden");
});

// nhấn nút menu mở thanh sidebar
const mobileToggleNav = document.querySelector(".mobile-toggle-nav");

mobileToggleNav.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    sidebar.previousElementSibling.classList.toggle("visually-hidden");
});
