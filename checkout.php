<?php
session_start();

$connect = mysqli_connect("vesta.uclan.ac.uk", "nmarkov", "njdAnzfb", "nmarkov");

$css = file_get_contents('css/checkout.css');
echo "<style>$css</style>";

// If the user is not logged in, redirect them to the error page
if ($_SESSION["logged-in"] == false) {
    header("Location: error.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION['user_id'];
    // Get the product IDs from the POST data or the session, or set it to null if it doesn't exist
    $productIds = isset($_POST['productIds']) ? $_POST['productIds'] : (isset($_SESSION['productIds']) ? $_SESSION['productIds'] : null);
    
    if ($productIds !== null) {
        $productIdsArray = json_decode($productIds);
        echo "<script>alert(" . json_encode($productIds) . ");</script>";

        // Prepare a SQL query to insert the order into the database
        $query = "INSERT INTO tbl_orders(user_id, product_ids) VALUES (?, ?)";
        $stmt = mysqli_prepare($connect, $query);
        $productIdsString = implode(',', $productIdsArray);
        mysqli_stmt_bind_param($stmt, "is", $userId, $productIdsString);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
			$_SESSION['order_success'] = true;
			header('Location: checkout.php');
        exit();
        } else {
            echo "<script>alert('Error creating order');</script>";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
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
	<div class="itemsContainer">
	<p class="itemsHeader">List of ordered items: </p>
	<div class="itemsToBuy"></div>
	<div class="thankLetter">
    <h1>Thank you for your purchase!</h1>
    <a href="products.php" class="button">Comeback to shopping</a>
	<a href="index.php" class="button">Home page</a></div>
	</div>
	
    </main>

    <footer id="footer">
    </footer>
	
	<script>
<?php if (isset($_SESSION['order_success']) && $_SESSION['order_success']): ?>
    alert('Purchase has been made successfully!');
    <?php unset($_SESSION['order_success']);?>
<?php endif; ?>
</script>

    <script src="js/burger-menu.js"></script>
    <script src="js/htmlToJSFooter.js"></script>
	<script src="js/checkout.js"></script>

</body>
</html>
