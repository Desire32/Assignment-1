<?php

session_start();

$connect = mysqli_connect("vesta.uclan.ac.uk", "nmarkov", "njdAnzfb", "nmarkov");

$css = file_get_contents('css/signup.css');
$headercss = file_get_contents('css/header.css');
$footercss = file_get_contents('css/footer.css');

echo "<style>$css</style>
<style>$headercss</style>
<style>$footercss</style>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = mysqli_real_escape_string($connect, $_POST['full_name']);
  $email = mysqli_real_escape_string($connect, $_POST['email']);
  $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
  $address = mysqli_real_escape_string($connect, $_POST['address']);

  $check_query = "SELECT * FROM tbl_users WHERE user_email = '$email'";
  $check_result = mysqli_query($connect, $check_query);
  
  if (mysqli_num_rows($check_result) > 0) {
    echo 'exists';
  } else {
    $query = "INSERT INTO tbl_users (user_full_name, user_email, user_pass, user_address) VALUES ('$name', '$email', '$password', '$address')";
    $result = mysqli_query($connect, $query);
  }

  header("Location: signup.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign Up</title>
  <link rel="stylesheet" type="text/css" href="css/header.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <link rel="stylesheet" type="text/css" href="css/signup.css">
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
      </ul>
    </nav>
    <div class="burger-menu-button"></div>
  </header>
  <nav class="burger-menu">
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="products.php">Products</a></li>
      <li><a href="cart.php">Cart</a></li>
    </ul>
  </nav>
  <main>
    <!---<p class="SuccessIcon" id="SuccessIcon">User account created successfully!</p>--->

    <form class="signUpPage" method="POST" action="signup.php">
      <h1>Sign up</h1><br>
      <p class="textInfo">In order to purchase from the Student's Union shop, you need to create an account with all fields below required. If you have any difficulties with the form please contact the webmaster (hyperlink needed).</p>
      <p>Full Name:</p> <input type="text" class="inputBar" id="name" name="full_name">
      <p>Email address:</p> <input type="email" class="inputBar" id="email" name="email">
      <p>Password:</p>
      <p class="textInfo">Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters</p>
      <p>Password:</p> <input type="password" class="inputBar" id="password" name="pass">
      <div class="passwordCriterias">
        <h2>Password must contain the following:</h2>
        <div class="criterias">
          <p id="lowercase">✗ A lowercase letter</p>
          <p id="uppercase">✗ A capital (uppercase) letter</p>
          <p id="number">✗ A number</p>
          <p id="length">✗ Minimum 8 characters</p>
        </div>
      </div>
      <p>Confirm password:</p> <input type="password" class="inputBar" id="confirmPassword" name="confirm_pass">
      <p>Address:</p> <input type="text" class="inputBar" id="address" name="address">
      <button class="buttonSubmit" id="button" type="submit">Confirm</button>
    </form>
  </main>
  <footer id="footer"></footer>
</body>
</html>
<script src="js/burger-menu.js"></script>
<script src="js/htmlToJSFooter.js"></script>
<script src="js/signup.js"></script>
