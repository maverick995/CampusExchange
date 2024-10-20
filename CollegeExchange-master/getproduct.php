<?php 
echo "<table class='zui-table' id='products'>";
echo "<thead><tr><th>ProductName</th><th>ProductCondition</th><th>Email</th></tr></thead>";

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

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("select Products.ProductName, Products.ProductCondition, Products.Email from Products ORDER BY Products.ProductID DESC");
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