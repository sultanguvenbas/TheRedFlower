<?php
session_start();

?>

<html lang="html">
<head>
    <title>The Red Flower</title>
    <link rel="stylesheet" href="css/main.css"/>
    <link rel="stylesheet" href="css/index.css"/>
    <script src="js/listLoader.js"></script>
    <meta charset="utf-8">
</head>
<body onload="setBasketName()">
<nav>
    <div class="pages">

        <a href="index.php">Home</a>
        <a href="flower.php">Flower</a>
        <a href="present.php">Present</a>
        <?php if (isset($_COOKIE['admin']))
            echo "<a href=\"manage.php\">Admin Page</a>";
        ?>
        <?php if (!isset($_COOKIE['login']))
            echo "<a href=\"login.php\" id=\"loginLink\">Login</a>";
        else
            echo "<a href=\"actions/logout.php\" id=\"logoutLink\">Logout</a>"
        ?>


        <p class="welcome" id="welcomeName"><?php if (isset($_COOKIE['login'])) echo "Welcome, " . $_COOKIE['login']; ?></p>

        <a href="basket.php" style="display: flex;flex-direction: column; margin-left: auto">
            <img class="icon"
                 src="img/basket.png"
                 alt="Basket"/>
            <p style="margin: 0" id="basket"></p></a>
    </div>
</nav>


<div class="page-container">
    <h1>Welcome to The Red Flower Store!</h1>
    <img src="img/back-flower.png" alt="background image" height="700"/>
</div>


<footer style="width: 100%; background: gray;margin-top:auto; text-align: center">
    <script src="js/login.js"></script>
    <a href="mailto:sultanguvenbas@gmail.com" id="link">
        Contact me via email
    </a>
</footer>
</body>
</html>
