<?php
$servername = "localhost";
$username = "root";
$password = "";
$connection = new PDO("mysql:host=$servername;dbname=theredflower", $username, $password);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $connection = new PDO("mysql:host=$servername;dbname=theredflower", $username, $password);
    $newItemName = $_POST['name'];
    $newPrice = $_POST['price'];
    $newCategory = $_POST['category'];
    $newFile = $_POST['file'];
    $newFileTemp = $_FILES['file']['tmp_name'];
    $connection->query("INSERT INTO items_table (name,description,price,category) VALUES ('$newItemName','$newItemName',$newPrice,'$newCategory')") or die('WRONG');
    if (is_uploaded_file($newFileTemp))
        move_uploaded_file($newFileTemp, "../img/" . $newItemName . ".png");
    else
        die('NOT UPLOADED');

    header('Location: /index.php');

}
