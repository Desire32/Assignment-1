
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/cart.css">
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
            <button id="clearButton">Clear Cart</button>
        </div>
        <div class="cartInfo">
            <span class="ItemWord">Item</span>
            <span class="ProductWord">Product</span>
        </div>
        <div class="container" id="cartContainer">
        </div>

        <form class="loginList" id="loginForm" method="POST" action="cart.php">
            <p class="text">In order to check out you must log in</p>
            <p class="inputText">Email:</p>
            <input type="email" class="inputBar" id="email" name="email_data">
            <p class="inputText">Password:</p>
            <input type="password" class="inputBar" id="password" name="pass">
            <button class="buttonSubmit" id="buttonLogin" type="submit">Confirm</button>
        </form>
    </main>

    <footer id="footer">
    </footer>

    <script src="js/burger-menu.js"></script>
    <script src="js/htmlToJSFooter.js"></script>
    <script src="js/cart.js"></script>
</body>

</html>


<?php

$connect = mysqli_connect("vesta.uclan.ac.uk", "nmarkov", "njdAnzfb", "nmarkov");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email_data']) && isset($_POST['pass'])) {
        $email = mysqli_real_escape_string($connect, $_POST['email_data']);
        $password = $_POST['pass'];

        $query = "SELECT * FROM tbl_users WHERE user_email = '$email'";
        $result = mysqli_query($connect, $query);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);
                if (password_verify($password, $user['user_pass'])) {
                    echo '<script>alert("Login successful!");</script>';
                } else {
                    echo '<script>alert("Incorrect password.");</script>';
                }
            } else {
                echo '<script>alert("No user found with this email address.");</script>';
            }
        } else {
            echo '<script>alert("Error executing query. Please try again.");</script>';
            echo "Error: " . $query . "<br>" . mysqli_error($connect); 
        }
    }
}
?>
