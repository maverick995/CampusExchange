<?php
session_start();
$servername = "us-cdbr-iron-east-01.cleardb.net";
$username = "b6145398a15a30";
$password = "8be317d7";
$dbname = "heroku_823f7648ae34667";

$Product_Name = htmlspecialchars($_POST["productName"]);
$Product_Condition = htmlspecialchars($_POST["productCondition"]);
$User_Name = htmlspecialchars($_SESSION['username']);

echo("<script>console.log('PHP Product name: ".$Product_Name."');</script>");

try
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO Products (ProductName, ProductCondition, Email) VALUES ('$Product_Name', '$Product_Condition', '$User_Name')";
    $conn->exec($sql);

    echo "New record created successfully";

}
catch (PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
header('Location: home.php');
?>


