<?php

session_start();

$connect = mysqli_connect("vesta.uclan.ac.uk", "nmarkov", "njdAnzfb", "nmarkov");

$css = file_get_contents('css/signup.css');

echo "<style>$css</style>";

// If the user is already logged in, redirect them to the error page
if (isset($_SESSION["logged-in"]) && $_SESSION["logged-in"] == true) {
    header("Location: error.php");
    exit();
}

// If the request method is POST, process the form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["signup-form-sent"] = true; 
    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $address = $_POST['address'];


    // Prepare a SQL query to check if the email already exists in the database
    $check_query = "SELECT * FROM tbl_users WHERE user_email = ?";
    $stmt = mysqli_prepare($connect, $check_query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $check_result = mysqli_stmt_get_result($stmt);
  
    if (mysqli_num_rows($check_result) > 0) {
        echo "<script> alert('Such email already exists!') </script>";
		$_SESSION["signup-form-sent"] = false;
    } else {
        $query = "INSERT INTO tbl_users (user_full_name, user_email, user_pass, user_address) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($connect, $query);
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $password, $address);
        $result = mysqli_stmt_execute($stmt);
        // If the insertion was successful, redirect the user to the same page(in order to not send a form again during page reload)
        if ($result) {
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit();
        } else {
            $_SESSION["signup-form-sent"] = false;
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign Up</title>
  <link rel="stylesheet" type="text/css" href="css/header.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <form class="signUpPage" method="POST" action="signup.php">
      <h1>Sign up</h1><br>
      <p class="textInfo">In order to purchase from the Student's Union shop, you need to create an account with all fields below required. If you have any difficulties with the form please contact the webmaster (hyperlink needed).</p>
      <p>Full Name:</p> <input type="text" class="inputBar" id="name" name="full_name" required>
      <p>Email address:</p> <input type="email" class="inputBar" id="email" name="email" required>
      <p>Password:</p>
      <p class="textInfo">Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters</p>
      <input type="password" class="inputBar" id="password" name="pass" required>
      <div class="passwordCriterias">
        <h2>Password must contain the following:</h2>
        <div class="criterias">
          <p id="lowercase">✗ A lowercase letter</p>
          <p id="uppercase">✗ A capital (uppercase) letter</p>
          <p id="number">✗ A number</p>
          <p id="length">✗ Minimum 8 characters</p>
        </div>
      </div>
      <p>Confirm password:</p> <input type="password" class="inputBar" id="confirmPassword" name="confirm_pass" required>
      <p>Address:</p> <input type="text" class="inputBar" id="address" name="address" required>
     <button class="buttonSubmit" id="buttonSubmit" type="submit">Confirm</button>
    </form>
  </main>
  <footer id="footer"></footer>
  
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        <?php if(isset($_SESSION["signup-form-sent"]) && $_SESSION["signup-form-sent"] === true): ?>
            alert('Signed up successfully!');
            <?php unset($_SESSION["signup-form-sent"]); ?>
        <?php endif; ?>
    });
</script>

 
  
  <script src="js/burger-menu.js"></script>
<script src="js/htmlToJSFooter.js"></script>
<script src="js/signup.js"></script>

</body>
</html>

