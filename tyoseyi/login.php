<?php

session_start();

include("db_connect.php");

$email = $_POST["email"];
$pw = $_POST["pw"];

$_SESSION['email'] = $email;

$sql = "select * from user where email=:email;";

$res = $pdo->prepare($sql);

$res->bindValue(':email',$email);

$r = $res->execute();

if($r === true){
	$row = $res->fetch(PDO::FETCH_ASSOC);
	
	$pw_log = password_verify($pw, $row['password']);
	
	if($pw_log === true){
		$_SESSION['name'] = $row['name'];
		$_SESSION['tel'] = $row['tel'];
		$_SESSION['people'] = $row['people'];
		header("Location: mypage.php");
	}else{
		echo "入力間違いました、もう一度入力してください。";
	}
}else{
	echo "入力間違いました、もう一度入力してください。";
}





/*
$sql = "select * from user where email='$email'";

$result = $pdo->query($sql);

$row = $pdo->query($sql)->fetch(PDO::FETCH_BOTH);

$_SESSION['name'] = $row[1];
$_SESSION['tel'] = $row[4];
$_SESSION['people'] = $row[5];


if($email == $row[2] && md5($pw) == $row[3]){
	header("Location: ../mockup/mypage.php");
}else{
	echo "入力間違いました、もう一度入力してください。";
}
*/
