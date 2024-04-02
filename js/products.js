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


// a button that appears on the page "products", allowing you to return to the very top of the page

let buttonPressed = document.getElementById('ButtonTop')

buttonPressed.addEventListener('click', function() {
  
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
});

