// Получение поля поиска и кнопки отправки
let submitBtn = document.querySelector(".sbm");
let inputSearch = document.querySelector("#srch");

// Деактивация кнопки отправки по умолчанию
submitBtn.disabled = true;
submitBtn.style.backgroundColor = "#4f5861";

// Если введено 3 и более символа, то разблокируется кнопка поиска
inputSearch.addEventListener("input", function () {
  if (inputSearch.value.length >= 3) {
    submitBtn.disabled = false;
    submitBtn.style.backgroundColor = "rgb(176, 176, 101)";
    submitBtn.style.transition = "0.4s";
  } else {
    submitBtn.disabled = true;
    submitBtn.style.backgroundColor = "#4f5861";
  }
})



