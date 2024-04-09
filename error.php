
<?php
session_start();

$connect = mysqli_connect("vesta.uclan.ac.uk", "nmarkov", "njdAnzfb", "nmarkov");

$error_css = file_get_contents('css/error.css');

echo "<style>$error_css</style>";

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
    
  <title>Error</title>
</head>
<body>

  <header class="header-main">
        <div class="header-main-logo">
            <img src="png/Logo-Color.png" alt="logo Uni">
            <div class="header-main-name">Student Shop</div>
        </div>
        <div class="burger-menu-button"></div>
    </header>


<main>
<div class="errorContainer">
<h1 class="errorTitle">Oops, looks like you are not supposed to be here!</h1>
<a href="index.php" class="errorButton">Main page</a>
</div>
 </main>
 <footer id="footer">
</footer>


<script src="js/htmlToJSFooter.js"></script>


