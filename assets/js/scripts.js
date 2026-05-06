document.addEventListener("DOMContentLoaded", function () {

    const modal = document.getElementById("contact-modal");
    const closeBtn = document.getElementById("close-modal");

    const burger = document.getElementById("burger-toggle");
    const menu = document.querySelector(".menu");

    // gestion modale (menu contact)
    document.addEventListener("click", function (e) {

        if (e.target.closest('.menu-contact')) {
            e.preventDefault();
            if (modal) modal.classList.remove("hidden");
        }

        if (e.target.id === "close-modal") {
            if (modal) modal.classList.add("hidden");
        }

    });

    // burger menu
    if (burger && menu) {
        burger.addEventListener("click", function () {
            menu.classList.toggle("active");
        });
    }

});