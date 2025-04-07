// Регистрация
let modalReg = document.querySelector("#modalReg");
let crossReg = document.querySelector(".crossReg");

let regBtn = document.querySelector("#regBtn");

regBtn.addEventListener("click", () =>{
    modalReg.classList.add("vis");
})

crossReg.addEventListener("click", () =>{
    modalReg.classList.remove("vis");
})

// Авторизация
let modalAuth = document.querySelector("#modalAuth");
let crossAuth = document.querySelector(".crossAuth");

let authBtn = document.querySelector("#authBtn");

authBtn.addEventListener("click", () =>{
    modalAuth.classList.add("vis");
})

crossAuth.addEventListener("click", () =>{
    modalAuth.classList.remove("vis");
})

// Увеличение книги
let modalBook = document.querySelector("#modalBook");
let crossBook = document.querySelector(".crossBook");

let bookCard = document.querySelector(".preview-book");

bookCard.addEventListener("click", ()=> {
    modalBook.classList.add("vis");
})

crossBook.addEventListener("click", () =>{
    modalBook.classList.remove("vis");
})


