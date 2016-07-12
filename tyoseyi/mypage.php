<?php session_start(); ?>
<?php 

	if(!isset($_SESSION['email'])) {
		header("Location: homepage.php");
	}else{

	include("db_connect.php");
	include("eventcount.php");
	include("groupID.php");
	include("emailcount.php");
	}

	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<title>Mypage</title>

 <link rel="stylesheet" type="text/css" href="mypage.css" />
 
</head>
<body>
	<h1>マイページ</h1>

	<div id="name">
    	<p>会社名：<?php echo $_SESSION['name']; ?></p>
        <p>人数：<?php echo $_SESSION['people']; ?></p>
        <p>TEL：<?php echo $_SESSION['tel']; ?></p>

   <!-----メールリスト----->
   <!-- Small modal -->
   <div id="btn2">
	<button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal01">メンバーメールリスト</button>
   </div>
   
	<div id="myModal01" class="modal fade" role="dialog">
  		<div class="modal-dialog">
    			<div class="modal-content">
      				<form>
					<?php
						for($i=0;$i<$emailno;$i++){
			                		echo $i+1 . " : " . $emaillist[$i][0] . "<br>";
						}
					?>
					
					<button type="button" class="b" data-dismiss="modal">閉じる</button>
					
		                </form>
			</div>
		</div>
	</div>

   <!-----メールリスト----->
	<span style='color:red;'><?php if(isset($_SESSION['EmailSendMessage'])){echo $_SESSION['EmailSendMessage'];} ?></span>
        </div>
        <h2>イベントリスト</h2>        
        <ul>
        <div id="ivent">
<?php

for($i=0;$i<$no;$i++){
echo "<li>";
//    <!-- Small modal -->
	echo "<button  type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#myModal" . $i . "\">". $row[$i][2] . "</button>";

	echo "<div id=\"myModal" . $i . "\" class=\"modal fade\" role=\"dialog\">";
  	    echo "<div class=\"modal-dialog\">";
    		echo "<div class=\"modal-content\">";
                	echo "<form  action=\"eventresetWrite.php\" method=\"post\">";
				
    				echo "<span>イベント名：". $row[$i][2] . "<br><br>";
    				echo "<span>時間：" . $row[$i][3] . "<br><br>";
    				echo "<span>場所：". $row[$i][4] ."<br><br>";
				echo "<span>メモ：" . $row[$i][5] . "<br><br>";
				
				echo "<input  type=\"button\" class=\"a\" data-dismiss=\"modal\" value=\"閉じる\" />";
			echo "</form>";
			echo "<form action=\"MemberEmailSend.php\" method=\"post\">";
				echo "<input type=\"hidden\" name=\"eventName\" value=\"". $row[$i][2] ."\">";
				echo "<input type=\"hidden\" name=\"eventURL\" value=\"". $row[$i][6] ."\">";
				echo "<input type=\"submit\" class=\"b\" name=\"button\" value=\"メンバーに送信\" />";
			echo "</form>";
			echo "</form>";
			echo "<form action=\"attendanceInput.php?url=" . $row[$i][6] .  "\" method=\"post\">";
				echo "<input type=\"hidden\" name=\"eventURL\" value=\"". $row[$i][6] ."\">";
				echo "<input type=\"submit\" class=\"b\" name=\"button\" value=\"出欠表チェック\" />";
			echo "</form>";
		echo "</div>";
	    echo "</div>";
	echo "</div>";
    echo "</li>";
    
}
?>
        </ul>
        </div>
        <div id="btn">
	        <button type="botton" name="eventReset" onClick="location.href='EventReset.php'">イベント編集<?php $_SESSION['EventResetMassage'] = "";  ?></button>
        	<button type="botton" name="eventRegister" onClick="location.href='EventRegistration.php'">イベント登録<?php $_SESSION['EventMessage'] = "";  ?></button><br>
	        <button type="botton" name="groupReset" onClick="location.href='grouppage.php'">会社情報編集<?php $_SESSION['GroupMessage'] = "";  ?></button>
		<button type="botton" name="memberEmailRegister" onClick="location.href='MemberEmailpage.php'">メール登録<?php $_SESSION['EmailMessage'] = "";  ?></button>

		<button type="botton" name="logout" onClick="location.href='logout.php'">ログアウト</button>

<?php
 echo "<a href='http://localhost:3000/?name=". $_SESSION['name']."'>userlist</a>";
?>
    	</div>
</div>
<?php $_SESSION['EmailSendMessage']=""; ?>
</body>
</html>
