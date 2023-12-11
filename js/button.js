let buttonPressed = document.getElementById('Button');

buttonPressed.addEventListener('click', function() {
  
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
});