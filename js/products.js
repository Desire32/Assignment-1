document.addEventListener('DOMContentLoaded', function () {
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
      const divideParagraphs = text.split('\n');

      // ignoring third-party text and sorting text that is in brackets
      divideParagraphs.forEach(paragraph => {
        const match = paragraph.match(/\[.*\]/);
        if (match) {
          const jsonText = match[0].replace(/'/g, '"');
          const jsonData = JSON.parse(jsonText);

          const prContainer = document.getElementById('productContainer');

          const prItem = document.createElement('div');
          prItem.classList.add('item');
          prItem.id = jsonData[0].replace(/\s+/g, '-'); // Set the id based on the product name

          const prImage = document.createElement('img');
          prImage.src = jsonData[4];
          prImage.alt = jsonData[0];

          const prName = document.createElement('h2');
          prName.textContent = jsonData[0] + ' - ' + jsonData[1];

          const prDescription = document.createElement('div');
          prDescription.classList.add('description');
          prDescription.textContent = jsonData[2];

          const prPrice = document.createElement('div');
          prPrice.classList.add('price');
          prPrice.textContent = jsonData[3];

          const buy = document.createElement('button');
          buy.classList.add('button');
          buy.textContent = 'Buy';

          buy.addEventListener('click', function () {
            addToCart(jsonData);
          });

          prItem.appendChild(prImage);
          prItem.appendChild(prName);
          prItem.appendChild(prDescription);
          prItem.appendChild(prPrice);
          prItem.appendChild(buy);
          prContainer.appendChild(prItem);
        }
      });

      const tShirtsLink = document.querySelector('a[href="#t-shirts"]');
      const hoodiesLink = document.querySelector('a[href="#hoodies"]');
      const jumpersLink = document.querySelector('a[href="#jumpers"]');

      tShirtsLink.addEventListener('click', function (event) {
        event.preventDefault();
        scrollClothes('UCLan-Logo-Tshirt'); 
      });

      hoodiesLink.addEventListener('click', function (event) {
        event.preventDefault();
        scrollClothes('UCLan-Hoodie'); 
      });

      jumpersLink.addEventListener('click', function (event) {
        event.preventDefault();
        scrollClothes('UCLan-Logo-Jumper'); 
      });

      function scrollClothes(elementId) {
        const element = document.getElementById(elementId);
        if (element) {
          element.scrollIntoView({ behavior: 'smooth' });
        }
      }
    });
});
