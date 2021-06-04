<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$connection = new PDO("mysql:host=$servername;dbname=theredflower", $username, $password);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// $items = $connection->query("SELECT * FROM user_table");
// echo $items;
//$user_data = check_login($connection);
function random_num($length): string
{
    $text = "";
    if ($length < 5) {
        $length = 5;
    }
    $len = rand(4, $length);
    for ($i = 0; $i < $len; $i++) {
        $text .= rand(0, 9);
    }
    return $text;
}

$name = "";
$pass = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $name = trim($_POST['username']);
    $pass = trim($_POST['password']);
    if (!empty($name) && !empty($pass) && !is_numeric($name)) {
        $pass = password_hash($pass, PASSWORD_BCRYPT);
        //save to database
        $connection = new PDO("mysql:host=$servername;dbname=theredflower", $username, $password);
        $items = $connection->query("SELECT id FROM user_table where username= '$name' limit 1");

        if ($items->rowCount() > 0) {
            echo $items->rowCount();
            echo "<script>alert('Username is already existed');window.history.back();</script>";
            die;
        }
        $token = random_num(20);
        $query = "insert into user_table (username,password,token) VALUES ('$name','$pass','$token')";
        $connection->exec($query);
        header("Location: /index.php");
        die;

    } else {
        echo "Please enter valid information!";
    }
}
