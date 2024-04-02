// code that reproduces so-called "burger-menu" on each of the pages, allowing you to click and select from a menu when the screen is reduced

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