// according to a similar scenario, it takes data from the page,and reproduces objects in the cart on a separate page, the number of objects depends on the objects selected by the user
/*
function clearCart() { // function to fully clear the cart
  localStorage.removeItem('cart');
  shoppingCart(); 
}

function removeItem(index) { // remove the item from the shopping cart 
	const cart = JSON.parse(localStorage.getItem('cart')) || [];

	if (index >= 0 && index < cart.length) {
		cart.splice(index, 1); 
		localStorage.setItem('cart', JSON.stringify(cart));
		shoppingCart();  // running the function again after we deleted an object
	}
}

function shoppingCart(object) { // the same procedure for creating values ​​and assigning variables to them as in products.js
	const cartContainer = document.getElementById('cartContainer');
	cartContainer.innerHTML = '';

	const cart = JSON.parse(localStorage.getItem('cart')) || [];

	cart.forEach((item, index) => {

			const cartItem = document.createElement('div');
			cartItem.classList.add('itemCart');

			const itemDetails = document.createElement('div'); 
    itemDetails.classList.add('itemDetails');

			const cartDescription = document.createElement('div');
			cartDescription.classList.add('description');
			cartDescription.textContent = item[1];

			const cartName = document.createElement('h3');
			cartName.textContent = item[0];

			const cartIndex = document.createElement('div');
			cartIndex.classList.add('index');
			cartIndex.textContent = `${index}`;

			const photoItem = document.createElement('img');
			photoItem.src = item[4];

			const priceItem = document.createElement('div');
			priceItem.classList.add('price')
			priceItem.textContent = item[3];

			const removeButton = document.createElement('button');
      removeButton.textContent = 'Remove';
      removeButton.addEventListener('click', () => removeItem(index));

			// this is done so that some objects are displayed in a line(flex), in our case it is necessary that the picture and its description should be one on top of the other, basically a div in another div.
			itemDetails.appendChild(photoItem);
    itemDetails.appendChild(cartDescription);

		// appending objects to the main container
			cartItem.appendChild(cartIndex);
			cartItem.appendChild(itemDetails);
			cartItem.appendChild(cartName);
			cartItem.appendChild(priceItem);
			cartItem.appendChild(removeButton);
			cartContainer.appendChild(cartItem);
	});
}
// initialisation of the cart function
shoppingCart();*/

document.addEventListener('DOMContentLoaded', function () {
	function shoppingCart() {
		const cartContainer = document.getElementById('cartContainer')
		cartContainer.innerHTML = ''

		const cart = JSON.parse(localStorage.getItem('cart')) || []

		cart.forEach((item, index) => {
			const cartItem = document.createElement('div')
			cartItem.classList.add('itemCart')

			const itemDetails = document.createElement('div')
			itemDetails.classList.add('itemDetails')

			const cartDescription = document.createElement('div')
			cartDescription.classList.add('description')
			cartDescription.textContent = item['product_desc']

			const cartName = document.createElement('h3')
			cartName.textContent = item['product_title']

			const cartIndex = document.createElement('div')
			cartIndex.classList.add('index')
			cartIndex.textContent = `${index}`

			const photoItem = document.createElement('img')
			photoItem.src = item['product_image']

			const priceItem = document.createElement('div')
			priceItem.classList.add('price')
			priceItem.textContent = item['product_price']

			const removeButton = document.createElement('button')
			removeButton.textContent = 'Remove'
			removeButton.addEventListener('click', () => removeItem(index))

			itemDetails.appendChild(photoItem)
			itemDetails.appendChild(cartDescription)

			cartItem.appendChild(cartIndex)
			cartItem.appendChild(itemDetails)
			cartItem.appendChild(cartName)
			cartItem.appendChild(priceItem)
			cartItem.appendChild(removeButton)
			cartContainer.appendChild(cartItem)
		})
	}

	function removeItem(index) {
		const cart = JSON.parse(localStorage.getItem('cart')) || []

		if (index >= 0 && index < cart.length) {
			cart.splice(index, 1)
			localStorage.setItem('cart', JSON.stringify(cart))
			shoppingCart()
		}
	}

	function clearCart() {
		localStorage.removeItem('cart')
		shoppingCart()
	}

	shoppingCart() 
})