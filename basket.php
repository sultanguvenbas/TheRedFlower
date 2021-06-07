<html lang="html">
<head>
    <title>The Red Flower</title>
    <link rel="stylesheet" href="css/element.css"/>
    <link rel="stylesheet" href="css/main.css"/>
    <link rel="stylesheet" href="css/basket.css"/>
    <script src="js/listLoader.js"></script>
    <script src="js/actions.js"></script>
    <script src="js/basket.js"></script>
    <meta charset="utf-8">
</head>
<body onload="setBasketName(); loadBasketItems()">
<nav>
    <div class="pages">
        <a href="index.php">Home</a>
        <a href="flower.php">Flower</a>
        <a href="present.php">Present</a>
                              <?php if (isset($_COOKIE['admin']))
            echo "<a href=\"manage.php\">Admin Page</a>";
        ?>
        
                <?php if(!isset($_COOKIE['login']))
            echo "<a href=\"login.php\" id=\"loginLink\">Login</a>";
        else
            echo "<a href=\"actions/logout.php\" id=\"logoutLink\">Logout</a>"
        ?>
        <p class="welcome" id="welcomeName"><?php if (isset($_COOKIE['login'])) echo "Welcome, " . $_COOKIE['login'];  ?></p>
        <a href="basket.php" style="display: flex;flex-direction: column; margin-left: auto">
               <a href="basket.php" style="display: flex;flex-direction: column; margin-left: auto">
            <img class="icon"
                 src="img/basket.png"
                 alt="Basket"/>
            <p style="margin: 0" id="basket"></p></a>
        </a>
    </div>
</nav>

<div class="page-container">
    <h1 id="nothing" class="styled-box">YOU HAVE NOTHING IN YOUR CART HOORAYY!</h1>
    <div class="cart-list" id="cartList">

    </div>
    <div class="cart-item">
        <h1 style="text-align: center" id="totalText"></h1>
        <div style="display: flex">
            <button class="store-button" onclick="window.location='index.html'" style="width: 13em;">Continue shopping</button>
            <button id="purchase-button" class="store-button" style="margin-left: 1em; width: 13em"
                    onclick="purchase()">Purchase now
            </button>
        </div>
    </div>
</div>
<div id="payment-options" style="display:none; width: 100%; justify-content: center;">
    <div class="element-container">
        <label class="flower-input">
            <text>Full Name</text>
            <input placeholder="John Doe"></label>
        <label class="flower-input">
            <text>Address</text>
            <input placeholder="Mugla"></label>
        <label class="flower-input">
            <text>Email</text>
            <input placeholder="someone@something.com"></label>
    </div>
    <div class="element-container" style="margin-left: 20px">
        <label class="flower-select">
            <select onchange="select(this.selectedIndex)">
                <option>Credit Card</option>
                <option>Wire Transfer</option>
            </select>
        </label>
        <label name="creditcard" class="flower-input">
            <text>Card Number</text>
            <input placeholder="1234 5678 1234 5789"></label>
        <label name="creditcard" class="flower-input">
            <text>CVV</text>
            <input placeholder="019" maxlength="3"></label>
        <label name="creditcard" class="flower-input">
            <text>Expiry Date</text>
            <input placeholder="01/25" maxlength="5"></label>
        <label name="wiretransfer" style="display: none" class="flower-input">
            <text>IBAN</text>
            <input placeholder="TR4320895734980759387435" maxlength="34"></label>
        <label name="wiretransfer" style="display: none" class="flower-input">
            <text>SWIFT Code</text>
            <input placeholder="3FJ4GD" maxlength="11"></label>

        <form method="POST" action="actions/purchase.php">
          <button style="margin-top:10px" class="store-button">
              Submit
          </button>
      </form>
    </div>

</div><footer style="width: 100%; background: gray;margin-top:auto; text-align: center">
<script src="js/login.js"></script>
    <a href="mailto:sultanguvenbas@gmail.com" id="link">
        Contact me via email
    </a>
</footer>
</body>
</html>
