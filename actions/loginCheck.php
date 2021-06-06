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

    // Get items from localstorage (before the database items are added)
    $itemsArr = json_decode(trim($_POST['itemsArray']));

    if (!empty($name) && !empty($pass) && !is_numeric($name)) {
        //save to database
        $connection = new PDO("mysql:host=$servername;dbname=theredflower", $username, $password);

        $items = $connection->query("SELECT password, admin,id FROM user_table where username= '$name' limit 1");//getting value from database and checking
        $items = $items->fetchAll()[0];
        $hash = $items[0];
        $admin = $items[1];
        $userId = $items[2];

        if (password_verify($pass, $hash) == true) {
            setcookie("login", $name, path: "/", httponly: true);
            setcookie("admin", $admin == true ? true : null, path: "/", httponly: true);

            // Add items from database to localStorage
            echo "<script src=\"../js/listLoader.js\"></script>"
                . "<script src=\"../js/actions.js\"></script>";
            $basket = $connection->query("SELECT itemId,name,description,price,amount FROM `basket` LEFT JOIN items_table t ON t.id=basket.itemId WHERE userId='$userId'")->fetchAll();
            foreach ($basket as $basketItem) {
                for ($i = 0; $i < $basketItem[4]; $i++)
                    echo "<script>addToCart('$basketItem[0]','$basketItem[1]', '$basketItem[2]','$basketItem[3]')</script>";
            }

            // Add items from old localStorage to database
            foreach ($itemsArr as $item) {
                $itemId = $item->id;
                $amount = $item->inCart;
                $items = $connection->query("SELECT id FROM basket WHERE userId='$userId' AND itemId=$itemId");
                if ($items->rowCount() == 0)
                    $connection->query("INSERT INTO basket (userId, itemId, amount) VALUES ('$userId', '$itemId', '$amount')");
                else {
                    $items = $items->fetchAll();
                    $rowId = $items[0][0];
                    $connection->query("UPDATE basket SET amount=amount+1 WHERE userId=$userId AND itemId=$itemId");
                }
            }
            echo "<script>alert('Using biz service icin tesekkur, kardes');window.location.href='/';</script>";
        } else {
            echo "<script>alert('Username or password is wrong kardes');window.history.back();</script>";
        }
        die;
    } else {
        echo "Please enter valid information!";
    }
}
