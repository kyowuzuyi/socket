<?php

session_start();

include("db_connect.php");

$name = $_SESSION['name'];

$eventname = $_POST['eventname'];
$eventtime = $_POST['eventtime'];
$eventplace = $_POST['eventplace'];
$eventmemo = $_POST['eventmemo'];

$_SESSION['eventtime'] = $eventtime;
$_SESSION['eventplace'] = $eventplace;
$_SESSION['eventmemo'] = $eventmemo;



if($eventname != NULL && $eventtime != NULL && $eventplace != NULL){
  if($eventmemo == NULL){ $eventmemo = ""; }
  $sql = "update event set eventtime = :eventtime, eventplace = :eventplace, eventmemo = :eventmemo where eventname = :eventname;";
  $res = $pdo->prepare($sql);
  $res->bindValue(':eventtime',$eventtime);
  $res->bindValue(':eventplace',$eventplace);
  $res->bindValue(':eventmemo',$eventmemo);
  $res->bindValue(':eventname',$eventname);
  $r = $res->execute();

  if($r === false){
    echo 'ng';
  }else{
    header("Location: mypage.php");
  }
}else{
  $_SESSION['EventResetMassage'] = "空欄を入力してください";
  header("Location: EventReset.php");
}

?>