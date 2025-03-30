document.addEventListener("DOMContentLoaded", function() {
    const menuToggle = document.querySelector(".menu-toggle");
    const navLinks = document.querySelector(".nav-links");

    menuToggle.addEventListener("click", () => {
        navLinks.classList.toggle("active");
        menuToggle.classList.toggle("active");
    });
});
// We only need to clone testimonials for a seamless loop

document.addEventListener('DOMContentLoaded', function() {
    // Clone the testimonials to create a seamless loop
    const leftToRightSlider = document.querySelector('.row-left-to-right .testimonial-slider');
    const rightToLeftSlider = document.querySelector('.row-right-to-left .testimonial-slider');
    
    // Clone the testimonials in the first row for a seamless loop
    const leftToRightTestimonials = leftToRightSlider.querySelectorAll('.testimonial');
    leftToRightTestimonials.forEach(testimonial => {
        const clone = testimonial.cloneNode(true);
        leftToRightSlider.appendChild(clone);
    });
    
    // Clone the testimonials in the second row for a seamless loop
    const rightToLeftTestimonials = rightToLeftSlider.querySelectorAll('.testimonial');
    rightToLeftTestimonials.forEach(testimonial => {
        const clone = testimonial.cloneNode(true);
        rightToLeftSlider.appendChild(clone);
    });
});
const counters = document.querySelectorAll(".counter");

const speed = 100; // Speed of the counter

counters.forEach(counter => {
    const updateCount = () => {
        const target = +counter.getAttribute("data-target");
        const count = +counter.innerText;
        const increment = target / speed;

        if (count < target) {
            counter.innerText = Math.ceil(count + increment);
            setTimeout(updateCount, 30);
        } else {
            counter.innerText = target;
        }
    };

    // Run only when the section is visible
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                updateCount();
                observer.unobserve(counter);
            }
        });
    });

    observer.observe(counter);
});
const timelineItems = document.querySelectorAll(".timeline-item");

const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add("show");
        }
    });
}, { threshold: 0.5 });

timelineItems.forEach(item => observer.observe(item));


// Select all FAQ questions
const faqItems = document.querySelectorAll(".faq-item");
faqItems.forEach(item => {
    item.addEventListener("click", () => {
        const answer = item.querySelector(".faq-answer");
        answer.style.display = (answer.style.display === "block") ? "none" : "block";
    });
});

// Load More Functionality
const loadMoreBtn = document.getElementById("loadMoreBtn");
const hiddenFaqs = document.querySelectorAll(".faq-item.hidden");
let isExpanded = false;

loadMoreBtn.addEventListener("click", () => {
    hiddenFaqs.forEach(faq => {
        faq.style.display = isExpanded ? "none" : "block";
    });
    loadMoreBtn.innerText = isExpanded ? "Load More" : "Show Less";
    isExpanded = !isExpanded;
});
// Hide preloader and show main content when page fully loads
window.addEventListener("load", function () {
    const preloader = document.getElementById("preloader");
    const mainContent = document.getElementById("main-content");

    // Add fade-out effect
    preloader.style.opacity = "0";
    setTimeout(() => {
        preloader.style.display = "none";
        mainContent.style.display = "block";
    }, 500); // Delay to ensure smooth transition
});
