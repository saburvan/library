let reviewBtn = document.querySelector(".reviewBtn");
let modalReview = document.querySelector("#modalReview");
let crossReview = document.querySelector(".crossReview");

reviewBtn.addEventListener("click", () => {
    modalReview.classList.add("vis");
})

crossReview.addEventListener("click", () => {
    modalReview.classList.remove("vis");
})
