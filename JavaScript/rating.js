const stars = document.querySelectorAll(".star");
const ratingValue = document.getElementById("data-value");

let currentRating = 0;
const ratingLevel = document.querySelector(".ratingLevel");

stars.forEach((star) => {
    star.addEventListener("click", () => {
        currentRating = parseInt(star.getAttribute("data-value"));
        ratingLevel.innerHTML = `Rating: <strong>${currentRating}</strong> / 5`;
        updateStars(currentRating);
    });
    star.addEventListener("mouseover", () => {
        const hoverValue = parseInt(star.getAttribute("data-value"));
        ratingLevel.innerHTML = `Rating: <strong>${hoverValue}</strong> / 5`;
        updateStars(hoverValue);
    });
    star.addEventListener("mouseleave", () => {
        ratingLevel.innerHTML = `Rating: <strong>${currentRating}</strong> / 5`;
        updateStars(currentRating);
    })
})