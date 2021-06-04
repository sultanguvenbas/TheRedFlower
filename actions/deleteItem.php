<?php
$servername = "localhost";
$username = "root";
$password = "";
$connection = new PDO("mysql:host=$servername;dbname=theredflower", $username, $password);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $connection = new PDO("mysql:host=$servername;dbname=theredflower", $username, $password);
    $newItemName = $_POST['name'];
    $connection->query("DELETE FROM items_table WHERE name='$newItemName'");
    unlink('../img/'. $newItemName . '.png');
    header('Location: /index.php');
}
