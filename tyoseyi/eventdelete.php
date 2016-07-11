<?php

session_start();

include("db_connect.php");

$eventURL = $_POST['eventURL'];

$sql = "delete from event where eventURL=:eventURL";

$res = $pdo->prepare($sql);
$res->bindValue(':eventURL',$eventURL);
$res->execute();
//unlink("eventURL/".$eventURL.".php");

//var_dump($eventname);

  if($res === false){
    echo 'ng';
  }else{
    header("Location: mypage.php");

  }

?>