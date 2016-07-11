<?php

$email = $_SESSION['email'];

$group = "select id from user where email=:email";

$res2 = $pdo->prepare($group);
$res2->bindValue(':email',$email);
$res2->execute();

$groupArrow = $res2->fetch(PDO::FETCH_ASSOC);

//$groupArrow = $pdo->query($group)->fetch(PDO::FETCH_BOTH);

$groupID = $groupArrow['id'];

?>