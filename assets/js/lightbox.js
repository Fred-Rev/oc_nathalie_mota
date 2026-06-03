document.addEventListener("DOMContentLoaded", function () {

    const lightbox = document.querySelector(".lightbox");
    const lightboxImage = document.querySelector(".lightbox-image");
    const lightboxReference = document.querySelector(".lightbox-reference");
    const lightboxCategory = document.querySelector(".lightbox-category");

    const closeLightbox = document.querySelector(".lightbox-close");

    const prevButton = document.querySelector(".lightbox-prev");
    const nextButton = document.querySelector(".lightbox-next");

    const fullscreenButtons = document.querySelectorAll(".photo-fullscreen");

    if (!lightbox) return;

    let currentIndex = 0;

    // Fonction affichage photo
    function showPhoto(index) {

        const button = fullscreenButtons[index];

        lightboxImage.src = button.dataset.image;
        lightboxImage.alt = button.dataset.title;

        lightboxReference.textContent = button.dataset.reference;
        lightboxCategory.textContent = button.dataset.category;

        currentIndex = index;
    }

    // Ouverture lightbox
    fullscreenButtons.forEach((button, index) => {

        button.addEventListener("click", function (e) {

            e.preventDefault();

            showPhoto(index);

            lightbox.classList.remove("hidden");

        });

    });

    // Fermeture
    closeLightbox.addEventListener("click", function () {

        lightbox.classList.add("hidden");

    });

    // Clic overlay
    lightbox.addEventListener("click", function (e) {

        if (e.target === lightbox) {
            lightbox.classList.add("hidden");
        }

    });

    // Photo précédente
    prevButton.addEventListener("click", function () {

        let newIndex = currentIndex - 1;

        if (newIndex < 0) {
            newIndex = fullscreenButtons.length - 1;
        }

        showPhoto(newIndex);

    });

    // Photo suivante
    nextButton.addEventListener("click", function () {

        let newIndex = currentIndex + 1;

        if (newIndex >= fullscreenButtons.length) {
            newIndex = 0;
        }

        showPhoto(newIndex);

    });

});