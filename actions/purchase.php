<?php
$servername = "localhost";
$username = "root";
$password = "";
$connection = new PDO("mysql:host=$servername;dbname=theredflower", $username, $password);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $connection = new PDO("mysql:host=$servername;dbname=theredflower", $username, $password);
    if (isset($_COOKIE['login'])) {
        $username = $_COOKIE['login'];
        $connection->query("DELETE FROM basket WHERE userId=(select id FROM user_table where username='$username')");
    }
    echo "<script src=\"../js/listLoader.js\"></script>
          <script src=\"../js/actions.js\"></script>
     <script>
        localStorage.setItem('cart','[]');
        window.location='/basket.php';
     </script>";

    //header('Location: /basket.php');
}
