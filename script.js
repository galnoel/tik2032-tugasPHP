// script.js

// Smooth scrolling when clicking on navigation links
function smoothScrolling() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1); // Remove the '#' from the href
            const targetSection = document.getElementById(targetId);
            if (targetSection) {
                // Scroll to the top of the target section smoothly
                targetSection.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
}

// Call the function when the page is loaded
window.onload = function() {
    smoothScrolling();
}

var lastScrollTop = 0;
var navbar = document.querySelector('.navbar');

window.addEventListener('scroll', function() {
    var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    if (scrollTop > lastScrollTop) {
        // Scrolling down
        navbar.classList.add('hidden');
    } else {
        // Scrolling up
        navbar.classList.remove('hidden');
    }
    lastScrollTop = scrollTop;
});
