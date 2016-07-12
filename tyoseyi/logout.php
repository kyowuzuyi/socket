<?php

session_start();
 $name = $_SESSION['name'];
include("db_connect.php");

$sql = "update user set socket_id = '' where name = '$name';";
$res = $pdo->prepare($sql);
$res->execute();

session_unset();

header("location: ../tyoseyi/homepage.php");
?>