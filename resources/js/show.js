const pass = document.getElementById("contra"),
      togglePassword = document.getElementById("togglePassword");

togglePassword.addEventListener("click", e => {
    const type = pass.getAttribute("type") === "password" ? "text" : "password";
    pass.setAttribute("type", type);
    
    togglePassword.classList.toggle("fa-eye");
    togglePassword.classList.toggle("fa-eye-slash");
});
