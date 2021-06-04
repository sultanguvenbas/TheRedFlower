<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$connection = new PDO("mysql:host=$servername;dbname=theredflower", $username, $password);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $name = trim($_POST['username']);
    $pass = trim($_POST['password']);

    if (!empty($name) && !empty($pass) && !is_numeric($name)) {
        //save to database
        $connection = new PDO("mysql:host=$servername;dbname=theredflower", $username, $password);

        $items = $connection->query("SELECT password, admin FROM user_table where username= '$name' limit 1");//getting value from database and checking
        $items=$items->fetchAll()[0];
        $hash = $items[0];
        $admin = $items[1];

        if (password_verify($pass, $hash) == true) {
            setcookie("login", $name, path: "/", httponly: true);
            setcookie("admin", $admin==true?true:null, path: "/", httponly: true);
            echo "<script>alert('Using biz service icin tesekkur, kardes');window.location.href='/';</script>";
        } else {
            echo "<script>alert('Username or password is wrong kardes');window.history.back();</script>";
        }
        die;
    } else {
        echo "Please enter valid information!";
    }
}
