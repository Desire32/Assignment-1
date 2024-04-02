
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

