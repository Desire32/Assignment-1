
<?php

$connect = mysqli_connect("vesta.uclan.ac.uk", "nmarkov","njdAnzfb", "nmarkov");

$productsCss = file_get_contents('css/products.css');
$headercss = file_get_contents('css/header.css');
$footercss = file_get_contents('css/footer.css');
$itemCss = file_get_contents('css/item.css');

echo "<style>$productsCss</style>
<style>$headercss</style>
<style>$itemCss</style>
<style>$footercss</style>";


    if(isset($_GET['id'])) {
    $id = $_GET['id'];
    

    $result = mysqli_query($connect, "SELECT * FROM tbl_products WHERE product_id = $id");

    if(mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/header.css">
		<link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/item.css">
    <link rel="stylesheet" type="text/css" href="css/products.css">
  <title><?php echo $product['product_title']; ?></title>
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
  <?php
  echo '<div class="itemDetails" id="productDetails">';
  echo '<img src="' . $product['product_image'] . '" alt="Product Image">';
  echo '<h2>' . $product['product_title'] . '</h2>';
  echo '<p class="description">' . $product['product_desc'] . '</p>';
  echo '<p class="price">' . $product['product_price'] . '</p>';
  echo '</div>';
  ?>
</main>


<footer id="footer">
</footer>

</body>
</html>


<script src="js/burger-menu.js"></script>
<script src="js/htmlToJSFooter.js"></script>

<?php
    } else {
        echo "Товар не найден.";
    }
} else {
    echo "Идентификатор товара не передан.";
}
?>
