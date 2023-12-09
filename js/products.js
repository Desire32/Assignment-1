fetch('/Assignment1(mainone)/items.csv')
  .then(response => response.text())
  .then(text => {

		function addToCart(product) {
			let cart = JSON.parse(localStorage.getItem('cart')) || [];
			cart.push(product);
			localStorage.setItem('cart', JSON.stringify(cart));
			alert('Product added to cart');
		}

// dividing text into paragraphs for sorting
const divideParagraphs = text.split('\n')

// ignoring third-party text and sorting text that is in brackets
divideParagraphs.forEach(paragraph => {
	const match = paragraph.match(/\[.*\]/)
	if (match) {
		const jsonText = match[0].replace(/'/g, '"')
		const jsonData = JSON.parse(jsonText)

		const prContainer = document.getElementById('productContainer')

		const prItem = document.createElement('div')
		prItem.classList.add('item')

		const prImage = document.createElement('img')
		prImage.src = jsonData[4]
		prImage.alt = jsonData[0] // maybe trash

		const prName = document.createElement('h2')
		prName.textContent = jsonData[0] + ' - ' + jsonData[1]

		const prDescription = document.createElement('div')
		prDescription.classList.add('description')
		prDescription.textContent = jsonData[2]

		const prPrice = document.createElement('div')
		prPrice.classList.add('price')
		prPrice.textContent = jsonData[3]

		const buy = document.createElement('button')
		buy.classList.add('button')
		buy.textContent = 'Buy'

		buy.addEventListener('click', function() {
			addToCart(jsonData);
			});

		prItem.appendChild(prImage)
		prItem.appendChild(prName)
		prItem.appendChild(prDescription)
		prItem.appendChild(prPrice)
		prItem.appendChild(buy)
		prContainer.appendChild(prItem)
	}

});

})





