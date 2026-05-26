document.addEventListener("DOMContentLoaded", function () {

    const modal = document.getElementById("contact-modal");

    const burger = document.getElementById("burger-toggle");
    const menu = document.querySelector(".main-nav");

    const loadMoreButton = document.getElementById("load-more-photos");
    const photoList = document.getElementById("photo-list");

    const categoryFilter = document.getElementById("filter-category");
    const formatFilter = document.getElementById("filter-format");
    const sortFilter = document.getElementById("filter-sort");

    // Charger plus
    if (loadMoreButton && photoList) {
        loadMoreButton.addEventListener("click", function () {

            let page = parseInt(loadMoreButton.dataset.page);
            page++;

            const formData = new FormData();
            formData.append("action", "load_more_photos");
            formData.append("page", page);

            if (categoryFilter) {
                formData.append("category", categoryFilter.value);
            }

            if (formatFilter) {
                formData.append("format", formatFilter.value);
            }

            if (sortFilter) {
                formData.append("sort", sortFilter.value);
            }

            fetch(nathalie_ajax.ajax_url, {
                method: "POST",
                body: formData
            })
            .then(response => response.text())
            .then(data => {

                if (data.trim() !== "") {
                    photoList.insertAdjacentHTML("beforeend", data);
                    loadMoreButton.dataset.page = page;
                } else {
                    loadMoreButton.style.display = "none";
                }

            });

        });
    }

    // Filtres
    function loadFilteredPhotos() {

        if (!photoList || !loadMoreButton) return;

        const formData = new FormData();

        formData.append("action", "load_more_photos");
        formData.append("page", 1);

        if (categoryFilter) {
            formData.append("category", categoryFilter.value);
        }

        if (formatFilter) {
            formData.append("format", formatFilter.value);
        }

        if (sortFilter) {
            formData.append("sort", sortFilter.value);
        }

        fetch(nathalie_ajax.ajax_url, {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            photoList.innerHTML = data;
            loadMoreButton.dataset.page = 1;
            loadMoreButton.style.display = "block";
        });
    }

    if (categoryFilter) {
        categoryFilter.addEventListener("change", loadFilteredPhotos);
    }

    if (formatFilter) {
        formatFilter.addEventListener("change", loadFilteredPhotos);
    }

    if (sortFilter) {
        sortFilter.addEventListener("change", loadFilteredPhotos);
    }

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