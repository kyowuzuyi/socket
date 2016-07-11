<?php

session_start();

include("db_connect.php");


$email = $_POST["email"];
$pw = $_POST["pw"];
$pw2 = $_POST["pw2"];

$_SESSION['email'] = $email;

$_SESSION['GroupMessage'] = "";
$_SESSION['name'] = "";
$_SESSION['EmailMessage'] = "";

$sql = "select email from user where email=:email;";

$res = $pdo->prepare($sql);

$res->bindValue(':email',$email);

$r = $res->execute();

$row = $res->fetch(PDO::FETCH_ASSOC);

if($row === false){
	if($email != NULL && $pw != NULL && $pw2 != NULL && $pw == $pw2){
		$sql = "insert into user (email,password) values (:email,:pw)";
		$res = $pdo->prepare($sql);
		$res->bindValue(':email',$email);
		$res->bindValue(':pw',password_hash($pw, PASSWORD_DEFAULT));
		
		$r = $res->execute();
		if($r === false){
			echo 'ng';
		}else{
			header("Location: grouppage.php");
		}
	}else{
		echo '入力間違いました、もう一度入力してください。';
	}
}else{
	echo 'このメールは存在しています。';
}

/*
$sql = "select email from user where email='$email';";

$result = $pdo->query($sql);

$row = $pdo->query($sql)->fetch(PDO::FETCH_BOTH);

if($row[0] == NULL){
  if($email != NULL && $pw != NULL && $pw2 != NULL && $pw == $pw2){
    $sql = "insert into user (email,password) values ('$email','".md5($pw)."')";
    if($pdo->query($sql)){
      header("Location: ../mockup/grouppage.php");
    }else{
      echo 'ng';
    }
  }else{
    echo '入力間違いました、もう一度入力してください。';
  }
}else{
  echo 'このメールは存在しています。';
}
*/
?>