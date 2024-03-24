document.addEventListener('DOMContentLoaded', function () {
	const productList = document.querySelectorAll('.item')

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
})
