document.addEventListener("DOMContentLoaded", function() {
    const passwordInput = document.getElementById("password");
    const repeatPasswordInput = document.getElementById("repeat_password");
    const repeatPasswordError = document.getElementById("repeat_password-error");

    repeatPasswordInput.addEventListener("input", function() {
        if (passwordInput.value !== this.value) {
            repeatPasswordError.textContent = "Password tidak cocok.";
        } else {
            repeatPasswordError.textContent = "";
        }
    });
});