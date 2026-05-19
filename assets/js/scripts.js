document.addEventListener("DOMContentLoaded", function () {

    const modal = document.getElementById("contact-modal");

    const burger = document.getElementById("burger-toggle");
    const menu = document.querySelector(".main-nav");

    // Gestion modale + préremplissage référence photo
    document.addEventListener("click", function (e) {

        const trigger = e.target.closest(".menu-contact, .photo-contact-button");

        if (trigger) {
            e.preventDefault();

            if (modal) {
                modal.classList.remove("hidden");
            }

            const ref = trigger.getAttribute("data-ref");
            const refInput = document.querySelector('input[name="photo-reference"]');

            if (refInput && ref) {
                refInput.value = ref;
            }
        }

        if (e.target.id === "close-modal") {
            if (modal) {
                modal.classList.add("hidden");
            }
        }

    });

    // Burger menu
    if (burger && menu) {
        burger.addEventListener("click", function () {

            menu.classList.toggle("active");

            if (menu.classList.contains("active")) {
                burger.innerHTML = "✕";
            } else {
                burger.innerHTML = "☰";
            }

        });
    }

});