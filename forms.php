<?php
require('connect.php');
include('auth.php');

if (isset($_POST["new_nav-item"])) {
    $query = $db->prepare("INSERT INTO nav (nav_name, nav_url) VALUES (:nav_name, :nav_url)");
    $query->bindParam(':nav_name', $_POST["nav_name"], PDO::PARAM_STR);
    $query->bindParam(':nav_url', $_POST["nav_url"], PDO::PARAM_STR);
    $query->execute();

    header('Location: navigation.php');
}
?>
