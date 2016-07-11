<?php session_start(); ?>
<?php

include("db_connect.php");

$email = $_SESSION['email'];

//----組織情報を取る----//

  //組織名を登録した場合は変更ができません
if($_SESSION['name'] == ""){
	$name = $_POST['name'];
}else{
	$name = $_SESSION['name'];
}

$people = $_POST['people'];
$tel = $_POST['tel'];




//----組織情報登録----//
if($people != NULL && $tel != NULL){
	$sql = "update user set name=:name, tel=:tel, people=:people where email = :email";

	$res = $pdo->prepare($sql);

	$res->bindValue(':name',$name);
	$res->bindValue(':tel',$tel);
	$res->bindValue(':people',$people);
	$res->bindValue(':email',$email);

	$res->execute();

	$_SESSION['name'] = $name;
	$_SESSION['tel'] = $tel;
	$_SESSION['people'] = $people;
	
	header("location: mypage.php");
}else{
	$_SESSION['GroupMessage'] = "空欄を入力してください。";
	header("location: grouppage.php");
}


?>