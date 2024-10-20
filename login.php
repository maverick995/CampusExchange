<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>College Exchange</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
</head>
<body>


<header class="animated slideInDown header-login">
    <div class="center">
    <logo>
        <a href="index.php"><img src="logo.png"></a>
    </logo>

    <h1 id="title">COLLEGE EXCHANGE</h1>
    </div>
    &nbsp;
</header>

<div class="wrapper">

    <div class="signin-div">
    <form class="animated slideInDown form-signin" action="login.php" method="post">
        <h2 class="form-signin-heading">Login Here</h2>
        <input type="text" class="form-control" name="email" placeholder="Email Address" required="" autofocus="" />
        <input type="password" class="form-control" name="password" placeholder="Password" required=""/>
        <button class="btn btn-lg btn-primary btn-block login-btn" type="submit">Login</button>
        <div>
                <?php
                if(isset($_SESSION['loginError']))
                {
                    echo '<p class="bad">'. $_SESSION['loginError'] . '</P>';
                    unset($_SESSION['loginError']);
                }
                ?>

         </div>
    </form>
    </div>

    <div class="signup-div">
    <form class="animated slideInDown form-signup" action="signup.php" method="post">
        <h5 class="form-signin-heading">Don't have account?</h5>
        <h2 class="form-signin-heading">Signup Here</h2>
        <input type="text" class="form-control" name="firstName" placeholder="First Name" required="" autofocus="" value="<?php if(isset($_SESSION['firstName'])) {echo $_SESSION['firstName'];}?>"/>
        <input type="text" class="form-control" name="lastName" placeholder="Last Name" required="" autofocus="" value="<?php if(isset($_SESSION['lastName'])) {echo $_SESSION['lastName'];}?>"/>
        <input type="text" class="form-control" name="email" placeholder="Email Address" required="" autofocus="" value="<?php if(isset($_SESSION['email'])) {echo $_SESSION['email'];}?>"/>
        <input type="password" class="form-control" name="password" placeholder="Password" required=""/>
        <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password" required=""/>
        <button class="btn btn-lg btn-primary btn-block login-btn" type="submit">Signup</button>
        <div>
                <?php
                if(isset($_SESSION['signupError']))
                {
                    echo '<p class="bad">' . $_SESSION['signupError'] . '</p>';
                    unset($_SESSION['signupError']);
                }
                ?>

                <?php
                if(isset($_SESSION['signupSuccess']))
                {
                    echo '<p class="good">'. $_SESSION['signupSuccess'] . '</p>';
                    unset($_SESSION['signupSuccess']);
                }

                ?>



            </div>
    </form>
    </div>
</div>
<footer>
    <h2 class="custom-footer-heading">About college exchange</h2>
    <p class="custom-footer-paragraph">This website is intended for college students to trade in their items.</p>
</footer>

<?php

if (isset($_POST['email']) && isset($_POST['password'])){

    $servername = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b6145398a15a30";
    $password = "8be317d7";
    $dbname = "heroku_823f7648ae34667";


    $e_mail = htmlspecialchars($_POST["email"]);
    $pass_word = htmlspecialchars($_POST["password"]);





    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM Users WHERE Email =:e_mail AND Pass =:pass_word");
        $stmt ->bindParam(':e_mail',$e_mail);
        $stmt ->bindParam(':pass_word', $pass_word);
        $stmt->execute();
        $results = $stmt->fetch();
        if($stmt->rowCount() == 1 ){
                $_SESSION['username'] = $_POST["email"];
                header('location: index.php');
            }
            else {
                $_SESSION['loginError'] = "Invalid Credentials. Please try again";
                header('location: index.php');
            }
        }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }

    $conn = null;
}


?>
    


