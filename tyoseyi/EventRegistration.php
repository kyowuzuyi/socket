<?php session_start(); ?>
<?php
	if(!isset($_SESSION['email'])) {
		header("Location: homepage.php");
	}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>イベント登録</title>
<link rel="stylesheet" type="text/css" href="EventRegistration.css" />

</head>
<body>
<div id="a">

<h1>イベントを登録する</h1>
	<div>
		<form action="EventRegisterWrite.php" method="post">
    		イベント名：<input type="text" name="eventname">  <br><br>
			時間：<input type="date" name="eventtime" value="2016-01-01"><br><br>
			場所：<input type="text" name="eventplace">   <br><br>
			メモ：<input type="text" name="eventmemo">  <br><br>
			<input class="btn02" type="submit" value="編集">
            <button class="btn03" type="button" class="btn btn-primary" data-dismiss="modal" onclick="location.href='./mypage.php'">Mypage</button><br>
            <span style='color:red; font-size:13px; '><?php echo $_SESSION['EventMessage']; ?></span>
	        </form>
	
	</div>
  
</div>
</body>
</html>
