document.addEventListener("DOMContentLoaded", function () {

    const buttons = document.querySelectorAll(".confirm-action");

    buttons.forEach(btn => {
        btn.addEventListener("click", function (e) {
            if (!confirm("Voulez-vous vraiment continuer ?")) {
                e.preventDefault();
            }
        });
    });

});
