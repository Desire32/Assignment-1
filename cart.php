<?php
session_start();

$connect = mysqli_connect("vesta.uclan.ac.uk", "nmarkov", "njdAnzfb", "nmarkov");

$css = file_get_contents('css/cart.css');



echo "<style>$css</style>";

if (isset($_SESSION['cart']) && $_SESSION['cart'] === true) {
    $_SESSION['cart'] = true;
} else {
    $_SESSION['cart'] = false;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (isset($_POST['productIds'])) {
        $productIds = json_decode($_POST['productIds'], true);
        $_SESSION['productIds'] = $productIds;
    }

	
    if (isset($_POST['email_data']) && isset($_POST['pass'])) {
        $email = mysqli_real_escape_string($connect, $_POST['email_data']);
        $password = $_POST['pass'];

        $query = "SELECT * FROM tbl_users WHERE user_email = '$email'";
        $result = mysqli_query($connect, $query);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);
                if (password_verify($password, $user['user_pass'])) {
                    $_SESSION['username'] = $user['user_full_name']; 
					$_SESSION['user_id'] = $user['user_id'];
                    $_SESSION["logged-in"] = true; 
                    $_SESSION["form-sent"] = true;
					header('Location: ' . $_SERVER['REQUEST_URI']);
                     exit();
                } else {
                    echo '<script>alert("Incorrect password.");</script>';
					$_SESSION["form-sent"] = false;
                }
            } else {
                echo '<script>alert("No user found with this email address.");</script>';
            }
        } else {
            echo '<script>alert("Error executing query. Please try again.");</script>';
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['clear_cart'])) {
    $_SESSION['cart'] = false;
	header('Location: ' . $_SERVER['REQUEST_URI']);
    exit();
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
        <div class="CartList">
            <h1>Shopping cart</h1>
            <div class="text"><?php echo ($_SESSION['username'] ?? " "); ?> The items you've added to the shopping cart: </div>

            <form method="POST" action="">
                <input type="hidden" name="clear_cart" value="1">
                <button type="submit" id="clearButton" class="clearButton">Clear Cart</button>
            </form>
        </div>
        <div class="cartInfo">
            <span class="ItemWord">Item</span>
            <span class="ProductWord">Product</span>
        </div>
        <div class="container" id="cartContainer">
        </div>
		
		<?php
    if(isset($_SESSION["logged-in"]) && $_SESSION["logged-in"] == true && $_SESSION['cart'] == true): 
    ?>
        <form class="loginList" id="loginForm" method="POST" action="checkout.php">
		     <input type="hidden" id="productIds" name="productIds">
            <button id="checkoutButton" class="checkoutButton">Checkout</button>
        </form>
    <?php endif; ?>

        <form class="loginList" id="loginForm" method="POST" action="cart.php" <?php if(isset($_SESSION["logged-in"]) && $_SESSION["logged-in"] == true) echo 'style="display: none;"'; ?>>
            <p class="text">In order to check out you must log in</p>
            <p class="inputText">Email:</p>
            <input type="email" class="inputBar" id="email" name="email_data" required>
            <p class="inputText">Password:</p>
            <input type="password" class="inputBar" id="password" name="pass" required>
            <button class="buttonSubmit" id="buttonLogin" type="submit">Confirm</button>
        </form>
    </main>

    <footer id="footer">
    </footer>
	
	<script>
    document.addEventListener('DOMContentLoaded', function () {
        <?php if(isset($_SESSION["form-sent"]) && $_SESSION["form-sent"] === true): ?>
            alert('Logged in successfully!');
            <?php unset($_SESSION["form-sent"]); ?>
        <?php endif; ?>
});

</script>
    <script src="js/burger-menu.js"></script>
    <script src="js/htmlToJSFooter.js"></script>
    <script src="js/cart.js"></script>
</body>
</html>
