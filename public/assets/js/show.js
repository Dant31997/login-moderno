const passwordField = document.getElementById("password");
const confirmPasswordField = document.getElementById("password_confirmation");

const togglePassword = document.getElementById("togglePassword");
const toggleConfirmPassword = document.getElementById("toggleConfirmPassword");


function toggleVisibility(inputField, icon) {
    const type = inputField.getAttribute("type") === "password" ? "text" : "password";
    inputField.setAttribute("type", type);
    icon.classList.toggle("fa-eye");
    icon.classList.toggle("fa-eye-slash");
}

togglePassword.addEventListener("click", () => toggleVisibility(passwordField, togglePassword));
toggleConfirmPassword.addEventListener("click", () => toggleVisibility(confirmPasswordField, toggleConfirmPassword));

