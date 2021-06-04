<?php
$servername = "localhost";
$username = "root";
$password = "";
$connection = new PDO("mysql:host=$servername;dbname=theredflower", $username, $password);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $connection = new PDO("mysql:host=$servername;dbname=theredflower", $username, $password);
    $id = $_POST['itemId'];
    $username=$_COOKIE['login'];
    $items=$connection->query("SELECT id FROM basket WHERE userId=(select id FROM user_table where username='$username') AND itemId=$id");
    if($items->rowCount() == 0)
        $connection->query("INSERT INTO basket (userId, itemId) SELECT id userId, $id itemId FROM user_table WHERE username='$username'");
    else {
        $items=$items->fetchAll();
        $rowId=$items[0][0];
        $connection->query("UPDATE basket SET amount=amount+1 WHERE userId=(SELECT Id FROM user_table WHERE username='$username') AND itemId=$id");
    }

    header('Location: /flower.php');
}
