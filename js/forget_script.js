document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("forgot-password-form").addEventListener("submit", function (event) {
        event.preventDefault();
        let formData = new FormData(this);

        fetch("forgot_password.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById("forgot-password-response").innerText = data.message;
        });
    });
});
