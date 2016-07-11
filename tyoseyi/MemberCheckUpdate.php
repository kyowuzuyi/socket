<?php 

session_start();

include("db_connect.php");

$username = $_POST['username'];
$comment = $_POST['comment'];
$isgo = $_POST['isgo'];
$eventURL = $_POST['eventURL'];

if($username != NULL){
	$sql = "insert into membercheck (username,isgo,comment,eventURL) value (:username,:isgo,:comment,:eventURL);";
	
	$res = $pdo->prepare($sql);

	$res->bindValue('username',$username);
	$res->bindValue('isgo',$isgo);
	$res->bindValue('comment',$comment);
	$res->bindValue('eventURL',$eventURL);

	$r = $res->execute();
	
	if($r === false){
		$_SESSION['MemberCheckUpdate'] = "サーバーにエラーが発生していますので、更新しませんでした";
		header("Location: attendanceInput.php?url=".$eventURL);
	}else{
		$_SESSION['MemberCheckUpdate'] = "更新しました";
		header("Location: attendanceInput.php?url=".$eventURL);
	}
}else{
	echo "名前を入力してください。";
}


?>