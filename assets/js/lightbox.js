document.addEventListener("DOMContentLoaded", function () {

    const lightbox = document.querySelector(".lightbox");
    const lightboxImage = document.querySelector(".lightbox-image");
    const lightboxReference = document.querySelector(".lightbox-reference");
    const lightboxCategory = document.querySelector(".lightbox-category");
    const closeLightbox = document.querySelector(".lightbox-close");

    if (!lightbox) return;

    document.addEventListener("click", function (e) {

        const fullscreenButton = e.target.closest(".photo-fullscreen");

        // OUVERTURE LIGHTBOX
        if (fullscreenButton) {

            e.preventDefault();

            lightboxImage.src = fullscreenButton.dataset.image;
            lightboxImage.alt = fullscreenButton.dataset.title;

            lightboxReference.textContent = fullscreenButton.dataset.reference;
            lightboxCategory.textContent = fullscreenButton.dataset.category;

            lightbox.classList.remove("hidden");
        }

        // FERMETURE LIGHTBOX
        if (
            e.target === closeLightbox ||
            e.target === lightbox
        ) {
            lightbox.classList.add("hidden");
        }

    });

});