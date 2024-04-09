const productList = document.querySelectorAll('.item')
const searchButton = document.getElementById('ButtonSearch')
const searchInput = document.getElementById('input')

console.log(searchButton)
console.log(searchInput)

function filterProducts(category) {
	productList.forEach(item => {
		if (category === 'all' || item.dataset.category === category) {
			item.style.display = 'block'
		} else {
			item.style.display = 'none'
		}
	})
}

document.querySelectorAll('.list').forEach(link => {
	link.addEventListener('click', function (event) {
		event.preventDefault()
		const category = this.dataset.category
		filterProducts(category)
	})
})

if (searchButton) {
	searchButton.addEventListener('click', function () {
		const searchText = searchInput.value.trim().toLowerCase()
		console.log('Pressed')

		productList.forEach(item => {
			const titleElement = item.querySelector('h2')
			if (titleElement) {
				const title = titleElement.textContent.trim().toLowerCase()
				if (title.includes(searchText)) {
					item.style.display = 'block'
				} else {
					item.style.display = 'none'
				}
			}
		})
		searchInput.value = ''
	})
} else {
	console.log('searchButton is null')
}

if (searchInput) {
	searchInput.addEventListener('input', function () {
		const searchText = this.value.trim().toLowerCase()

		productList.forEach(item => {
			const titleElement = item.querySelector('h2')
			if (titleElement) {
				const title = titleElement.textContent.trim().toLowerCase()
				if (title.includes(searchText)) {
					item.style.display = 'block'
				} else {
					item.style.display = 'none'
				}
			}
		})
	})
} else {
	console.log('searchInput is null')
}


document.addEventListener('DOMContentLoaded', function () {
	const addToCartButtons = document.querySelectorAll('.add-to-cart')

	addToCartButtons.forEach(button => {
		button.addEventListener('click', function () {
			const productData = JSON.parse(this.dataset.product)
			addToCart(productData)
		})
	})

	function addToCart(product) {
		let cart = JSON.parse(localStorage.getItem('cart')) || []
		cart.push(product)
		localStorage.setItem('cart', JSON.stringify(cart))
		alert('Item added to the cart!')
		updateCartDisplay()
	}

})
