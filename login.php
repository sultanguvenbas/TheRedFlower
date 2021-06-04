<html lang="html">
<head>
    <title>The Red Flower</title>
    <link rel="stylesheet" href="css/main.css"/>
    <link rel="stylesheet" href="css/login.css"/>
    <link rel="stylesheet" href="css/element.css"/>
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
        <p id="welcomeName"><?php if (isset($_COOKIE['login'])) echo "Welcome, " . $_COOKIE['login']; ?></p>
        <a href="basket.php" style="display: flex;flex-direction: column; margin-left: auto">
            <img class="icon"
                 src="img/basket.png"
                 alt="Basket"/>
            <p style="margin: 0" id="basket"></p></a>
    </div>
</nav>

<div class="page-container">
    <div class="loginbox">
        <img src="./img/avatar3.png" class="avatar" alt="Avatar">
        <h1>Login Here</h1>
        <!--        <p class="error">--><?php //echo $error; ?><!--</p><p class="succes">-->
        <?php //echo $succes; ?><!--</p>-->
        <form method="POST">
            <label class="username" for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter Username" required>
            <label class="password" for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter Password" required>

            <button formaction="actions/loginCheck.php">Login</button>
            <a href="#">Forget your password?</a>
            <a href="#" style="margin-left: 30px">Don't have a account?</a>
            <button formaction="actions/signUp.php">Sign Up</button>
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