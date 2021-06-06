<?php
$servername = "localhost";
$username = "root";
$password = "";
$connection = new PDO("mysql:host=$servername;dbname=theredflower", $username, $password);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $connection = new PDO("mysql:host=$servername;dbname=theredflower", $username, $password);
    $id = $_POST['itemId'];
    $itemObj = $connection->query("SELECT * FROM items_table WHERE id=$id")->fetchAll()[0];
    if (isset($_COOKIE['login'])) {
        $username = $_COOKIE['login'];
        $items = $connection->query("SELECT id, amount FROM basket WHERE userId=(select id FROM user_table where username='$username') AND itemId=$id");
        $item=$items->fetchAll()[0];
        if ($item[1] == 1)
            $connection->query("DELETE FROM basket WHERE userId=(SELECT Id FROM user_table WHERE username='$username') AND itemId=$id");
        else {
            $connection->query("UPDATE basket SET amount=amount-1 WHERE userId=(SELECT Id FROM user_table WHERE username='$username') AND itemId=$id");
        }
    }
    echo "<script src=\"../js/listLoader.js\"></script>
          <script src=\"../js/actions.js\"></script>
     <script>
        removeFromCart('$id');
        window.location='/basket.php';
     </script>";

    //header('Location: /basket.php');
}
