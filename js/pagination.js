let block_page = document.querySelectorAll(".wrap-books");
let page = document.querySelectorAll(".pagination-control span");


for (let i = 1; i < block_page.length; i++){
    block_page[i].classList.add("none");
}

page[0].classList.add("act");

for (let i = 0; i < page.length; i++){
    page[i].addEventListener("click", function(){
        for(let j = 0; j < page.length; j++){
            page[j].classList.remove("act");
            block_page[j].classList.add("none");
        }
        page[i].classList.add("act");
        block_page[i].classList.remove("none");
    })
}