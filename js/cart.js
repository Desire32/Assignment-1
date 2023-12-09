function shoppingCart(object) {
	const cartContainer = document.getElementById('cartContainer');
    cartContainer.innerHTML = '';
	
	const cart = JSON.parse(localStorage.getItem('cart')) || [];
	
	cart.forEach(item => {

		const cartContainer = document.getElementById('cartContainer');

		const cartItem = document.createElement('div');
		cartItem.classList.add('itemCart');

		const cartName = document.createElement('h3');
		cartName.textContent = item[0] + " - " + item[1];
 
		const photoItem = document.createElement('img');
		photoItem.src = item[4];

		const priceItem = document.createElement('div');
		priceItem.classList.add('price')
		priceItem.textContent = item[3];

		cartItem.appendChild(photoItem);
		cartItem.appendChild(cartName);
		cartItem.appendChild(priceItem);
		cartContainer.appendChild(cartItem);
});
}

shoppingCart();
