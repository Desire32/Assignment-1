<!--item.html-->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/header.css">
		<link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/item.css">
    <link rel="stylesheet" type="text/css" href="css/products.css">
  <title>Item</title>
</head>
<body>

  <header class="header-main">
    <div class="header-main-logo">
        <img src="png/Logo-Color.png" alt="logo Uni">
        <div class="header-main-name">Student Shop</div>
    </div>
        <nav class="header-main-nav">
            <ul class="logoList">
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="signup.php">Sign Up</a></li>
            </ul>
        </nav>
        <div class="burger-menu-button"></div>
  </header>
 
 <!--Burger menu-->	   
<nav class="burger-menu">
<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="products.php">Products</a></li>
    <li><a href="cart.php">Cart</a></li>
    <li><a href="signup.php">Sign Up</a></li>
</ul>
</nav>

<main>
  <div class="itemDetails" id="productDetails"></div>
</main>

<footer id="footer">
</footer>

</body>
</html>

<script src="js/item.js"></script>
<script src="js/burger-menu.js"></script>
<script src="js/htmlToJSFooter.js"></script>
