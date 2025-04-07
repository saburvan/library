let tab = Array.from(document.querySelectorAll(".tab"));
let tabCont = document.querySelectorAll(".tab-container");

for (let i = 0; i < tab.length; i++) {
    tab[i].addEventListener('click', () => {
        for (let g = 0; g < tab.length; g++) {
            tab[g].classList.remove("tab_active");
        }
        for (let j = 0; j < tabCont.length; j++) {
            tabCont[j].classList.add("none");
        }
        tabCont[i].classList.remove("none");
        tab[i].classList.add("tab_active");
    })

}
