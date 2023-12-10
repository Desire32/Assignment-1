function shoppingCart(object) {
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

			itemDetails.appendChild(photoItem);
    itemDetails.appendChild(cartDescription);

			cartItem.appendChild(cartIndex);
			cartItem.appendChild(itemDetails);
			cartItem.appendChild(cartName);
			cartItem.appendChild(priceItem);
			cartContainer.appendChild(cartItem);
	});
}

shoppingCart();
