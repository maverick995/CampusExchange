<?php session_start();
if (!isset($_SESSION['username'])){
    header('location: login.php');

}
else {

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>College Exchange</title>
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css">
</head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <script src="js/refreshProducts.js"></script>


<body>



<header>
    <div class="animated slideInDown center">
  <logo>
    <a href="index.php"><img src="logo.png"></a>
  </logo>

    <h1 id="title">COLLEGE EXCHANGE</h1>
    <h5 id="account-title">Account: <?php echo $_SESSION['username'];?></h5>

    </div>
  <nav class = "animated slideInDown">
      <ul>
        <li><a href="help.php">Help</a></li>
        <li><a href="signout.php">Sign Out</a></li>
          <li><a href="getMyProducts.php">My Products</a></li>
        <!--<li><a href="enlist.php">Enlist</a></li>-->
          
      </ul>
    </nav>

    
</header>

<div class="animated slideInDown wrapper" id="div-enlist">
    <form class="form-enlist" id="enlist-form" action="enlistProduct.php" method="post">
        <p class="animated fadeInDown form-signin-heading">Please enter the description of your product here:</p>
        <input type="text" class="form-control" name="productName" placeholder="Name of your product" required="" />
        <select class="selector" id="condition">
            <option value="Like New">Like New</option>
            <option value="Excellent">Excellent</option>
            <option value="Good">Good</option>
            <option value="Fair">Fair</option>
        </select>
        <hr>
        <button class="btn btn-lg btn-primary btn-block" id="enlist-btn" type="submit">Enlist</button>
        <hr>
        <input type="text" id="searchString" onkeyup="searchHome()" placeholder="Search for items">
    </form>
</div>


<div id="product-list">
    <?php include 'getproduct.php';?>
</div>


<?php include "footer.php" ?>