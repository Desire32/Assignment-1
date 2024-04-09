<?php
session_start();
$_SESSION["user_id"] = "";
$_SESSION['username'] = "";
$_SESSION["logged-in"] = false; 
$_SESSION["form-sent"] = false;
session_destroy();
?>

<script>
    alert('You logged out from the account');
    window.location.href = 'signup.php';
</script>
