// in the same way, data is taken from local storage and displayed on the screen





document.addEventListener('DOMContentLoaded', function () {
    function displayItemsToBuy() {
        const itemsToBuyContainer = document.querySelector('.itemsToBuy');
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
		
        itemsToBuyContainer.innerHTML = '';
        let totalPrice = 0;

        cart.forEach((item, index) => {
            const itemElement = document.createElement('div');
            itemElement.classList.add('itemCart');

            const itemDetails = document.createElement('div');
            itemDetails.classList.add('itemDetails');

            const itemName = document.createElement('h3');
            itemName.textContent = item['product_title'];

            const photoItem = document.createElement('img');
            photoItem.src = item['product_image'];

            const priceItem = document.createElement('div');
            priceItem.classList.add('price');
            priceItem.textContent = '€ ' + item['product_price'];

            totalPrice += parseFloat(item['product_price']);

            itemDetails.appendChild(photoItem);

            itemElement.appendChild(itemDetails);
            itemElement.appendChild(itemName);
            itemElement.appendChild(priceItem);
            itemsToBuyContainer.appendChild(itemElement);
        });

    }

    displayItemsToBuy();
});
