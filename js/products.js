// this file imports clothes list from the items.csv using fetch function, sorts it and shows on the products.html page, also it includes part of code for scrolling, in order to reach needed object


document.addEventListener('DOMContentLoaded', function () { // guarantees better code performance
  fetch('/Assignment1(mainone)/items.csv')
    .then(response => response.text())
    .then(text => {

      function addToCart(product) { // self-explanatory
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart.push(product);
        localStorage.setItem('cart', JSON.stringify(cart));
        alert('Product added to cart');
      }

      // here the text is sorted using paragraphs, and the text is taken only from brackets, ignoring continuous text
      const divideParagraphs = text.split('\n');

      divideParagraphs.forEach(paragraph => {
        const match = paragraph.match(/\[.*\]/);
        if (match) {
          const jsonText = match[0].replace(/'/g, '"');
          const jsonData = JSON.parse(jsonText);

          const prContainer = document.getElementById('productContainer'); // creating a container for html page, in order to push all content inside of it.

          const prItem = document.createElement('div');
          prItem.classList.add('item');
          prItem.id = jsonData[0].replace(/\s+/g, '-'); 

          const readMore = document.createElement('a');
          readMore.classList.add('read-more');
          readMore.textContent = 'Read more';
          readMore.href = 'item.html';

          readMore.addEventListener('click', function(){ // loads an object in local storage and moves it and all its data to the next page
            localStorage.setItem('selectedProduct', JSON.stringify(jsonData));
          })


// creating elements and assigning variables to them from a sorted text file

          const prImage = document.createElement('img');
          prImage.src = jsonData[4];
          prImage.alt = jsonData[0];

          const prName = document.createElement('h2');
          prName.textContent = jsonData[0] + ' - ' + jsonData[1];

          const prDescription = document.createElement('div');
          prDescription.classList.add('description');
          prDescription.textContent = jsonData[2];

          prDescription.appendChild(readMore);

          const prPrice = document.createElement('div');
          prPrice.classList.add('price');
          prPrice.textContent = jsonData[3];

          const buy = document.createElement('button');
          buy.classList.add('button');
          buy.textContent = 'Buy';

          buy.addEventListener('click', function () {
            addToCart(jsonData);
          });
// appending objects to the main container 
          prItem.appendChild(prImage);
          prItem.appendChild(prName);
          prItem.appendChild(prDescription);
          prItem.appendChild(prPrice);
          prItem.appendChild(buy);
          prContainer.appendChild(prItem);
        }
      });

      // This piece of code is responsible for displaying three variations of the name of an object, when clicked on, the page will move to where the element with that name first begins.

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
          element.scrollIntoView({ behavior: 'smooth' }); // smoother page scrolling
        }
      }
    });
});
