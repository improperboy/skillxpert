document.addEventListener('DOMContentLoaded', function() {
    // Panel switching
    const container = document.querySelector('.container');
    const signUpButton = document.getElementById('signup-button');
    const loginButton = document.getElementById('login-button');

    signUpButton.addEventListener('click', () => {
        container.classList.add('right-panel-active');
    });

    loginButton.addEventListener('click', () => {
        container.classList.remove('right-panel-active');
    });

    // Theme switching
    const themeSwitch = document.querySelector('.theme-switch-input');
    
    themeSwitch.addEventListener('change', function() {
        if(this.checked) {
            document.body.classList.add('dark-mode');
            localStorage.setItem('theme', 'dark');
        } else {
            document.body.classList.remove('dark-mode');
            localStorage.setItem('theme', 'light');
        }
    });

    // Check for saved theme preference
    const currentTheme = localStorage.getItem('theme') ? localStorage.getItem('theme') : null;
    
    if (currentTheme === 'dark') {
        document.body.classList.add('dark-mode');
        themeSwitch.checked = true;
    }

    // Form submission (prevent default for demo)
    const loginForm = document.getElementById('login-form');
    const signupForm = document.getElementById('signup-form');

    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Add login animation
        const button = this.querySelector('.form-btn');
        button.innerHTML = '<span class="spinner"></span> Logging in...';
        button.style.pointerEvents = 'none';
        button.style.opacity = '0.7';
        
        // Simulate API call
        setTimeout(() => {
            alert('Login unsuccessful!');
            button.innerHTML = 'Login';
            button.style.pointerEvents = 'auto';
            button.style.opacity = '1';
        }, 2000);
    });

    signupForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Add signup animation
        const button = this.querySelector('.form-btn');
        button.innerHTML = '<span class="spinner"></span> Creating account...';
        button.style.pointerEvents = 'none';
        button.style.opacity = '0.7';
        
        // Simulate API call
        setTimeout(() => {
            alert('Account not created');
            button.innerHTML = 'Sign Up';
            button.style.pointerEvents = 'auto';
            button.style.opacity = '1';
        }, 2000);
    });

    // Add input animations
    const inputs = document.querySelectorAll('.form-input');
    
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentNode.classList.add('focused');
        });
        
        input.addEventListener('blur', function() {
            if (this.value === '') {
                this.parentNode.classList.remove('focused');
            }
        });
    });
});


// for backened
document.addEventListener("DOMContentLoaded", function () {
    // Signup Form Submission
    document.getElementById("signup-form").addEventListener("submit", function (event) {
        event.preventDefault();
        let formData = new FormData(this);

        fetch("signup.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById("signup-response").innerText = data.message;
            if (data.status === "success") {
                setTimeout(() => window.location.href = "user_dashboard.php", 1000);
            }
        });
    });

    // Login Form Submission
    document.getElementById("login-form").addEventListener("submit", function (event) {
        event.preventDefault();
        let formData = new FormData(this);

        fetch("login.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById("login-response").innerText = data.message;
            if (data.status === "success") {
                setTimeout(() => window.location.href = data.redirect, 1000);
            }
        });
    });
});
