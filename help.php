<?php
session_start();


if(!isset($_SESSION['username']))
{
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>College Exchange</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
<script src="js/refreshProducts.js"></script>


<body>



<header>
    <div class="center">
        <logo>
            <a href="index.php"><img src="logo.png"></a>
        </logo>

        <h1 id="title">COLLEGE EXCHANGE</h1>
        <h5 id="account-title">Account: <?php echo $_SESSION['username'];?></h5>

    </div>
    <nav>
        <ul>
            <li><a href="help.php">Help</a></li>
            <li><a href="signout.php">Sign Out</a></li>
            <li><a href="getMyProducts.php">My Products</a></li>
            <!--<li><a href="enlist.php">Enlist</a></li>-->

        </ul>
    </nav>


</header>

<p>Additional text will go here</p>

<?php include "footer.php" ?>
