const dropdownBtns = document.querySelectorAll(".dropdown-btn");

dropdownBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
        btn.nextElementSibling.classList.toggle("show");
        btn.classList.toggle("rotate");
    })
})

// đóng sidebar
const sidebar = document.querySelector("#sidebar");
const toggleSidebar = document.querySelector(".toggle-sidebar-btn");

toggleSidebar.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    toggleSidebar.classList.toggle("rotate");
})