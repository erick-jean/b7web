document.addEventListener("DOMContentLoaded", function () {
    const themeSwitch = document.getElementById("theme-switch");
    const body = document.body;

    // Verifica se já há um tema salvo no localStorage
    const currentTheme = localStorage.getItem("theme");

    if (currentTheme === "light") {
        body.classList.add("light-theme");
        themeSwitch.checked = true;
    }

    // Alterna o tema ao clicar no botão
    themeSwitch.addEventListener("change", function () {
        if (this.checked) {
            body.classList.add("light-theme");
            localStorage.setItem("theme", "light");
        } else {
            body.classList.remove("light-theme");
            localStorage.setItem("theme", "dark");
        }
    });
});
