document.addEventListener("DOMContentLoaded", function () {

    const customSelects = document.querySelectorAll(".custom-select");

    customSelects.forEach(function (customSelect) {

        const trigger = customSelect.querySelector(".custom-select-trigger");
        const options = customSelect.querySelectorAll(".custom-options button");
        const realSelectId = customSelect.dataset.select;
        const realSelect = document.getElementById(realSelectId);

        trigger.addEventListener("click", function () {

            customSelects.forEach(function (select) {
                if (select !== customSelect) {
                    select.classList.remove("open");
                }
            });

            customSelect.classList.toggle("open");
        });

        options.forEach(function (option) {

            option.addEventListener("click", function () {

                const value = option.dataset.value;
                const label = option.textContent;

                realSelect.value = value;
                trigger.textContent = label;

                options.forEach(function (btn) {
                    btn.classList.remove("active");
                });

                option.classList.add("active");

                customSelect.classList.remove("open");

                realSelect.dispatchEvent(new Event("change"));
            });

        });

    });

    document.addEventListener("click", function (e) {

        if (!e.target.closest(".custom-select")) {
            customSelects.forEach(function (customSelect) {
                customSelect.classList.remove("open");
            });
        }

    });

});