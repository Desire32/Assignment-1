<!--cart.html-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <link rel="stylesheet" type="text/css" href="css/header.css" />
    <link rel="stylesheet" type="text/css" href="css/footer.css" />
    <link rel="stylesheet" type="text/css" href="css/cart.css" />
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
        <div class="CartList">
            <h1>Shopping cart</h1>
            <div class="text">The items you've added to your shopping cart:</div>
            <button onclick="clearCart()">Clear Cart</button>
        </div>
        <div class="cartInfo">
            <span class="ItemWord">Item</span>
            <span class="ProductWord">Product</span>
        </div>
        <div class="container" id="cartContainer">
        </div>

        <div class="loginList">
            <p class="text">In order to check out you must log in</p>
            <p class="inputText">Email:</p>
            <input type="email" class="inputBar" id="email">
            <p class="inputText">Password:</p>
            <input type="password" class="inputBar" id="password">
            <button class="buttonSubmit" id="button">Confirm</button>
        </div>

    </main>

    <footer id="footer">
    </footer>

</body>

</html>

<script src="js/cart.js"></script>
<script src="js/burger-menu.js"></script>
<script src="js/htmlToJSFooter.js"></script>