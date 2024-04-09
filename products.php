
<?php

session_start();


$connect = mysqli_connect("vesta.uclan.ac.uk", "nmarkov","njdAnzfb", "nmarkov");

$result = mysqli_query($connect, "SELECT * FROM tbl_products");

$css = file_get_contents('css/products.css');

echo "<style>$css</style>";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_cart'])) {
    $_SESSION['cart'] = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Products</title>
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
                <?php if(isset($_SESSION["logged-in"]) && $_SESSION["logged-in"] == true) echo '<li><a href="logout.php">Logout</a></li>'; else echo '<li><a href="signup.php">Sign up</a></li>'; ?>
            </ul>
        </nav>
        <div class="burger-menu-button"></div>
    </header>

    <nav class="burger-menu">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="cart.php">Cart</a></li>
            <?php if(isset($_SESSION["logged-in"]) && $_SESSION["logged-in"] == true) echo '<li><a href="logout.php">Logout</a></li>'; else echo '<li><a href="signup.php">Sign up</a></li>'; ?>
        </ul>
    </nav>

	<main>

		<button class="scrollButton">Top</button>
		<div class="productsPage">
			<div class="productsList">
				<div class="searchList">
					<input class="searchInput" id="input" />
					<button class="searchButton" id="ButtonSearch">Search</button>
				</div>
				<span class="productsWord"></span>
				<a class="list" data-category="UCLan Logo Tshirt" href="#t-shirts">T-shirts</a>
                <a class="list" data-category="UCLan Hoodie" href="#hoodies">Hoodies</a>
                <a class="list" data-category="UCLan Logo Jumper" href="#jumpers">Jumpers</a>
                <a class="list" data-category="all" href="#all">All</a>
			</div>

			<div class='container'>
			
			
<?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <div class='item' data-category='<?php echo $row["product_type"]; ?>'>
        <img src='<?php echo $row["product_image"]; ?>' alt='Product Image'>
        <h2><?php echo $row["product_title"]; ?></h2>
        <p class='price'>€<?php echo $row["product_price"]; ?></p>
        <div class='description'><?php echo $row["product_desc"]; ?></div>
        <form method="POST" action="">
            <input type="hidden" name="add_to_cart" value="<?php echo $row["product_id"]; ?>">
            <button type="submit" class='add-to-cart buttonBuy' data-product='<?php echo htmlspecialchars(json_encode($row), ENT_QUOTES, 'UTF-8'); ?>'>Add to Cart</button>
			<a class='read-more' href='item.php?id=<?php echo $row["product_id"]; ?>'>Read more</a>
        </form>
    </div>
<?php } ?>


</div>
		</div>
	</main>

	<footer id="footer">
	</footer>

	<script>
	let button = document.querySelector('.scrollButton');
    if (button) {
        button.addEventListener('click', function () {
            window.scrollTo({
                top: 0,
                behavior: 'smooth',
            })
        })
    } else {
        console.log('ButtonTop not found')
    }
	</script>

</body>

</html>

<script src="js/burger-menu.js"></script>
<script src="js/htmlToJSFooter.js"></script>
<script src="js/products.js"></script>
