// script.js

// Optional: Add toast or confirmation features later
document.addEventListener("DOMContentLoaded", function () {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.display = 'none';
        }, 5000); // auto-dismiss after 5s
    });
});
