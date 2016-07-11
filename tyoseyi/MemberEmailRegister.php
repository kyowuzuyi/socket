<?php

session_start();

include("db_connect.php");

$groupemail = $_SESSION['email']; //団体名のメールを取得

$MemberEmail = $_POST['MemberEmail'];	


//----メールアドレスの正しさをチェック----//
if(preg_match("/^[a-zA-Z0-9_.+-]+[@][a-zA-Z0-9.-]+$/",$MemberEmail)){
	$MemberEmail = $MemberEmail;
	$_SESSION['EmailMessage'] = "登録完了";


	//このアカウント（団体）のユニークなIDを取得
	$sql = "select id from user where email=:groupemail";

	$res = $pdo->prepare($sql);	
	$res->bindValue(':groupemail',$groupemail);
	$res->execute();

	$row = $res->fetch(PDO::FETCH_ASSOC);
	$groupID = $row['id'];


	//このアカウント（団体）の中、このメールを存在するかどうかチェック
	$sql2 = "select memberemail from memberemail where memberemail=:MemberEmail AND groupID=:groupID";

	$res2 = $pdo->prepare($sql2);
	$res2->bindValue(':MemberEmail',$MemberEmail);
	$res2->bindValue(':groupID',$groupID);
	$res2->execute();

	$row2 = $res2->fetch(PDO::FETCH_ASSOC);



	if($MemberEmail != NULL){
		//↓メールは登録したかどうかをチェックする
		if($row2['memberemail'] == NULL){
			$sql = "insert into memberemail (groupID,memberemail) values (:groupID,:MemberEmail)";

			$res = $pdo->prepare($sql);
			
			$res->bindValue(':groupID',$groupID);
			$res->bindValue(':MemberEmail',$MemberEmail);
			
			$res->execute();

			header("Location: MemberEmailpage.php");
		}else{
			$_SESSION['EmailMessage'] = "メールを存在しています";
			header("Location: MemberEmailpage.php");
		}
	}else{
		echo "error";
	}

}else{
	$_SESSION['EmailMessage'] = "メールアドレスが間違いました";
	header("Location: MemberEmailpage.php");
}

?>