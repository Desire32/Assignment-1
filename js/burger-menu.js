
// burger menu responsible for displaying the list for mobile devices

document.addEventListener('DOMContentLoaded', function () {
    let burgerOpen = document.querySelector(".burger-menu-button");
    let burgerMenu = document.querySelector(".burger-menu");
    let isBurgerOpen = false;

    burgerOpen.addEventListener('click', function () {
        if (!isBurgerOpen) {
            burgerMenu.style.display = 'block'
            isBurgerOpen = true
            burgerOpen.style.backgroundPosition = 'center 50px'
        } else {
            burgerMenu.style.display = 'none'
            isBurgerOpen = false
            burgerOpen.style.backgroundPosition = 'center'
        }
    })
})