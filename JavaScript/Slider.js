const slides = document.querySelectorAll(".Slide");
let slideIndex = 0;

// Show first image when page loads
slides[slideIndex].classList.add("displaySlide");

function showSlide() {
    // Hide current slide
    slides[slideIndex].classList.remove("displaySlide");

    // Move to next slide
    slideIndex++;

    // If last image, go back to first
    if (slideIndex >= slides.length) {
        slideIndex = 0;
    }

    // Show new slide
    slides[slideIndex].classList.add("displaySlide");
}

// Auto change every 3 seconds
setInterval(showSlide, 5000);
