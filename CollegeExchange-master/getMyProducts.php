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
    <nav class="animated slideInDown">
        <ul>
            <li><a href="help.php">Help</a></li>
            <li><a href="signout.php">Sign Out</a></li>
            <li><a href="getMyProducts.php">My Products</a></li>
            <!--<li><a href="enlist.php">Enlist</a></li>-->

        </ul>
    </nav>


</header>
<input class="animated slideInDown" type="text" id="searchStringMyproducts" onkeyup="searchMyproducts()" placeholder="Search for items">
<div>
    <?php
    echo "<table class='zui-table' id='myProducts'> ";
    echo "<thead><tr><th>ProductName</th><th>ProductCondition</th></tr></thead>";
    echo "<tbody>";
    class TableRows extends RecursiveIteratorIterator {
        function __construct($it) {
            parent::__construct($it, self::LEAVES_ONLY);
        }

        function current() {
            return "<td>" . parent::current(). "</td>";
        }

        function beginChildren() {
            echo "<tr>";
        }

        function endChildren() {
            echo "</tr>" . "\n";
        }
    }
    echo "</tbody>";

    $servername = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b6145398a15a30";
    $password = "8be317d7";
    $dbname = "heroku_823f7648ae34667";

    $user= $_SESSION['username'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("select Products.ProductName, Products.ProductCondition from Products where Products.Email = '$user' ORDER BY ProductName DESC");
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);


        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
            echo $v;
        }
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;

    echo "</table>"
    ?>
</div>



<?php include "footer.php" ?>
