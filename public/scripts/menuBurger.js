let boutonOpen = document.querySelector("#bandeau .fa-bars")
let boutonClose = document.querySelector("#bandeau .fa-xmark")
let boutonClose1 = document.querySelector("#bandeau #menu-overlay")
boutonOpen.addEventListener("click", burgerShow)
boutonClose.addEventListener("click", burgerHidden)
boutonClose1.addEventListener("click", burgerHidden)

let btnburger = document.querySelector("#bandeau #menuburger")
let overlay = document.querySelector("#bandeau #menu-overlay")

function burgerShow() {
    btnburger.classList.add("active")
    overlay.classList.add("active")
}

function burgerHidden() {
    btnburger.classList.remove("active")
    overlay.classList.remove("active")
}