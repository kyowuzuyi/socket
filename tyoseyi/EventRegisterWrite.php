<?php

session_start();

include("db_connect.php");

$name = $_SESSION['name'];

$eventname = $_POST['eventname'];
$eventtime = $_POST['eventtime'];
$eventplace = $_POST['eventplace'];
$eventmemo = $_POST['eventmemo'];
$CreateDate = date("Y-m-d");
$DeleteDate = date("Y-m-d",strtotime("+2 month"));

$_SESSION['eventname'] = $eventname;
$_SESSION['eventtime'] = $eventtime;
$_SESSION['eventplace'] = $eventplace;
$_SESSION['eventmemo'] = $eventmemo;

//url create

if($eventname != NULL && $eventtime != NULL && $eventplace != NULL){

  //----ランダムイベントのURLを作成する----//

  $eventURL = uniqid(rand());

//  touch('eventURL/'.$eventURL.'.php');

//  $file = file_get_contents('attendanceInput.php', true);

//  file_put_contents('eventURL/'.$eventURL.'.php', $file);

  $_SESSION['eventURL'] = $eventURL;

//  $URL = "http://dev2.m-fr.net/godpoo3/mockup/eventURL/" . $eventURL . ".php";
    $URL = "http://dev2.m-fr.net/godpoo3/mockup/attendanceInput.php?url=" . $eventURL;


  //----ランダムイベントのURLを作成する----//

//----------イベントを自動削除する------------//
/*
  $eventNo = "a" . $eventURL;

  $sql2 = "
  create event $eventNo
    on schedule at current_timestamp + interval 10 second
    do
      delete from event where eventURL = '$eventURL';
  ";
*/
//----------イベントを自動削除する------------//

  
  $_SESSION['URL'] = $URL;

  $sql = "insert into event (name,eventname,eventtime,eventplace,eventmemo,eventURL,CreateDate,DeleteDate) values (:name,:eventname,:eventtime,:eventplace,:eventmemo,:eventURL,:CreateDate,:DeleteDate)";
  $res = $pdo->prepare($sql);

  $res->bindValue(':name',$name);
  $res->bindValue(':eventname',$eventname);
  $res->bindValue(':eventtime',$eventtime);
  $res->bindValue(':eventplace',$eventplace);
  $res->bindValue(':eventmemo',$eventmemo);
  $res->bindValue(':eventURL',$eventURL);
  $res->bindValue(':CreateDate',$CreateDate);
  $res->bindValue(':DeleteDate',$DeleteDate);

  $r = $res->execute();

  if($r === true){
    header("Location: URL_LINK.php");
  }else{
    echo 'ng';
  }
}else{
  $_SESSION['EventMessage'] = "メモ以外の空欄を入力してください。";
  header("Location: EventRegistration.php");
}

?>