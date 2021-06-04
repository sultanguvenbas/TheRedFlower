<html lang="html">
<head>
    <title>The Red Flower</title>
    <link rel="stylesheet" href="css/element.css"/>
    <link rel="stylesheet" href="css/main.css"/>
    <link rel="stylesheet" href="css/basket.css"/>
    <script src="js/listLoader.js"></script>
    <script src="js/actions.js"></script>
    <script src="js/manage.js"></script>
    <meta charset="utf-8">
</head>
<body onload="setBasketName();">
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
        <a href="basket.php" style="display: flex;flex-direction: column; margin-left: auto">
            <img class="icon"
                 src="img/basket.png"
                 alt="Basket"/>
            <p style="margin: 0" id="basket"></p></a>
    </div>
</nav>

<div class="page-container">
    <h1>Manage your store</h1>
    <div style="display: flex">
        <form method="POST" enctype="multipart/form-data" action="actions/addToNewItem.php">
            <div class="element-container">
                <h2 style="text-align: center">Add new item</h2>
                <label class="flower-input">
                    <text>Name</text>
                    <input name="name" placeholder="Flower Circle"></label>
                <label class="flower-input">
                    <text>Price</text>
                    <input name="price" placeholder="5.5"></label>
                <label class="flower-input">
                    <text>Tag</text>
                    <input name="tag" placeholder="Example Tag"></label>
                <label class="flower-input">
                    <text>Category</text>
                    <input name="category" placeholder="Example Category"></label>
                <label class="flower-input">
                    <text>Picture</text>
                    <input name="file" id="file" type="file" placeholder="Example Tag"></label>
                <button style="margin-top:10px" class="store-button">Add Item
                </button>
            </div>
        </form>
        <form method="post">
            <div class="element-container" style="margin-left: 15px">
                <h2 style="text-align: center">Delete item</h2>
                <label class="flower-input">
                    <text>Name</text>
                    <input name="name" placeholder="Flower Circle"/></label>
                <button style="margin-top:10px" class="store-button" formaction="actions/deleteItem.php">Delete</button>
            </div>
        </form>
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
