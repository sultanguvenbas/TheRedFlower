<html lang="html">
<head>
    <title>The Red Flower</title>
    <link rel="stylesheet" href="css/main.css"/>
    <link rel="stylesheet" href="css/store.css"/>
    <script src="js/listLoader.js"></script>
    <script src="js/actions.js"></script>
    <script src="js/store.js"></script>
    <meta charset="utf-8">
</head>
<body onload=" setBasketName();">
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
        <p id="welcomeName"><?php if (isset($_COOKIE['login'])) echo "Welcome, " . $_COOKIE['login']; ?></p>
        <a href="basket.php"
           style="display: flex;flex-direction: column; margin-left: auto"><img
                    class="icon" src="img/basket.png" alt="Basket"/>
            <p style="margin: 0" id="basket"></p></a>
    </div>
</nav>

<div class="page-container">
    <h1 style="display: block">Store</h1>

    <div id="itemsGrid" class="items-grid">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $connection = new PDO("mysql:host=$servername;dbname=theredflower", $username, $password);
        $items = $connection->query("SELECT * FROM items_table where category='flower'");
        //echo $items;

        foreach ($items->fetchAll() as $item) {
            echo "<form class='item' method='post'>"
                . "<input name='itemId' style='display: none' value='$item[0]' />"
                . "<img src='/img/$item[1].png' alt='pic'/>"
                . "<h3>$item[1]</h3>"
                . "<h4 style='margin:0'>$item[2]</h4>"
                . " <h3 class='price'>$item[3],00 $</h3>"
                . "<button class='store-button' formaction='actions/addToBasket.php'>Add to basket</button>"
                . "</form>";
        }
        ?>
    </div>
</div>
<footer style="width: 100%; background: gray;margin-top:auto; text-align: center">
    <script src="js/login.js"></script>
    <a href="mailto:sultanguvenbas@gmail.com" id="link">
        Contact me via email
    </a>
</footer>
</body>
</html>
