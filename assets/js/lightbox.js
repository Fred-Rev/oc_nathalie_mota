document.addEventListener("DOMContentLoaded", function () {

    const lightbox = document.querySelector(".lightbox");
    const lightboxImage = document.querySelector(".lightbox-image");
    const lightboxReference = document.querySelector(".lightbox-reference");
    const lightboxCategory = document.querySelector(".lightbox-category");

    const closeLightbox = document.querySelector(".lightbox-close");
    const prevButton = document.querySelector(".lightbox-prev");
    const nextButton = document.querySelector(".lightbox-next");

    if (!lightbox) return;

    let currentIndex = 0;

    function getFullscreenButtons() {
        return Array.from(document.querySelectorAll(".photo-fullscreen"));
    }

    function showPhoto(index) {
        const buttons = getFullscreenButtons();
        const button = buttons[index];

        if (!button) return;

        lightboxImage.src = button.dataset.image;
        lightboxImage.alt = button.dataset.title;

        lightboxReference.textContent = button.dataset.reference;
        lightboxCategory.textContent = button.dataset.category;

        currentIndex = index;
    }

    document.addEventListener("click", function (e) {

        const button = e.target.closest(".photo-fullscreen");

        if (!button) return;

        e.preventDefault();

        const buttons = getFullscreenButtons();
        const index = buttons.indexOf(button);

        showPhoto(index);
        lightbox.classList.remove("hidden");
    });

    closeLightbox.addEventListener("click", function () {
        lightbox.classList.add("hidden");
    });

    lightbox.addEventListener("click", function (e) {
        if (e.target === lightbox) {
            lightbox.classList.add("hidden");
        }
    });

    prevButton.addEventListener("click", function () {
        const buttons = getFullscreenButtons();

        let newIndex = currentIndex - 1;

        if (newIndex < 0) {
            newIndex = buttons.length - 1;
        }

        showPhoto(newIndex);
    });

    nextButton.addEventListener("click", function () {
        const buttons = getFullscreenButtons();

        let newIndex = currentIndex + 1;

        if (newIndex >= buttons.length) {
            newIndex = 0;
        }

        showPhoto(newIndex);
    });

});