<?php
session_start();

if(!isset($_SESSION['username']))
{
    header('location: login.php');
}
?>

<html lang="en">
<head>
<title>College Exchange</title>
<link rel="stylesheet" href="css/styles.css">
</head>
<body>



<header>
  <logo>
    <a href="index.php"><img src="logo.JPG"></a>
  </logo>

    <h2>COLLEGE EXCHANGE</h2>
    <h5>Account: <?php echo $_SESSION['username'];?></h5>
  <nav>
   <ul>
        <li><a href="help.php">Help</a></li>
        <li><a href="signout.php">Sign Out</a></li>
        <li><a href="getMyProducts.php">My Products</a></li>
        <li><a class="current" href="enlist.php">Enlist</a></li>
          
      </ul>
    </nav>
    
</header>

<div class="wrapper">
        <form class="form-enlist" action="enlistProduct.php" method="post">       
            <h5 class="form-signin-heading">Please enter the description of your product here:</h5>
            <input type="text" class="form-control" name="productName" placeholder="Name of your product" required="" autofocus=""/>
            <input list="condition" name="productCondition">
            <datalist id="condition">
                <option value="Like New">
                <option value="Excellent">
                <option value="Good">
                <option value="Fair">
            </datalist>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Enlist</button>   
        </form>
</div>

<?php include "footer.php" ?>


