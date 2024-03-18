<!--products.html-->

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<title>Products</title>
	<link rel="stylesheet" type="text/css" href="css/header.css" />
	<link rel="stylesheet" type="text/css" href="css/footer.css" />
	<link rel="stylesheet" type="text/css" href="css/products.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
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
		<div class="burger-menu-button">
			<div>
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
		<button class="scrollButton" id="Button">Top</button>
		<div class="productsPage">
			<div class="productsList">
				<div class="searchList">
					<input class="searchInput" id="input">
					<button class="searchButton" id="Button">Search</button>
				</div>
				<span class="productsWord"></span>
				<a class="list" href="#t-shirts">t-shirts</a>
				<a class="list" href="#hoodies">hoodies</a>
				<a class="list" href="#jumpers">jumpers</a>
			</div>

			<div class="container" id="productContainer">
			</div>
		</div>
	</main>

	<footer id="footer">
	</footer>

</body>

</html>

<script src="js/products.js"></script>
<script src="js/burger-menu.js"></script>
<script src="js/htmlToJSFooter.js"></script>