<?php

session_start();

include("db_connect.php");
include("eventcount.php");
include("groupID.php");
include("emailcount.php");

$eventName = $_POST['eventName'];
$eventURL = $_POST['eventURL'];

$url = "http://dev2.m-fr.net/godpoo3/mockup/attendanceInput.php?url=" . $eventURL;


for($i=0;$i<$emailno;$i++){
	mb_send_mail($emaillist[$i][0],$eventName,"イベントのURL: " . $url);
	$_SESSION['EmailSendMessage'] = "送信完了";
	header("Location: mypage.php");
}



?>