document.addEventListener('DOMContentLoaded', function () {
  
  const selectedProduct = JSON.parse(localStorage.getItem('selectedProduct'));
  
  if (selectedProduct) {
    
    const productContainer = document.getElementById('productDetails');

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

    productContainer.appendChild(prImage);
    productContainer.appendChild(prName);
    productContainer.appendChild(prDescription);
    productContainer.appendChild(prPrice);
  } 
});
