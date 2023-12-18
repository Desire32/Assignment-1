// this code collects data from the choosen file and shows it on the other page, showing choosen object only


document.addEventListener('DOMContentLoaded', function () { // used simply to make the code work well
  
  const selectedProduct = JSON.parse(localStorage.getItem('selectedProduct')); // create a name for the item that will be included in local storage

  function addToCart(product) {  // function for adding an item in the local storage and displaying a notification to the user that the item is in the cart
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart.push(product);
    localStorage.setItem('cart', JSON.stringify(cart));
    alert('Product added to cart');
  }
  
  if (selectedProduct) { // 
    
    const productContainer = document.getElementById('productDetails');

    // assigning to the created objects in this js file values ​​from a sorted list of clothes, the values ​​of which were sorted separated by commas for assignment.
    const prImage = document.createElement('img');
    prImage.src = selectedProduct[4];
    prImage.alt = selectedProduct[0];

    const prName = document.createElement('h2');
    prName.textContent = selectedProduct[0] + ' - ' + selectedProduct[1];

    const prDescription = document.createElement('div');
    prDescription.classList.add('description');
    prDescription.textContent = selectedProduct[2];

    const prPrice = document.createElement('div');
    prPrice.classList.add('price');
    prPrice.textContent = selectedProduct[3];

    const buy = document.createElement('button');
          buy.classList.add('button');
          buy.textContent = 'Buy';

          buy.addEventListener('click', function () {
            addToCart(selectedProduct);
          });

          // appending objects to the html objects created above using js
    productContainer.appendChild(prImage);
    productContainer.appendChild(prName);
    productContainer.appendChild(prDescription); 
    productContainer.appendChild(prPrice);
    productContainer.appendChild(buy);
  } 
});
