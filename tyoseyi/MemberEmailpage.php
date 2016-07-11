<?php session_start(); ?>
<?php
	if(!isset($_SESSION['email'])) {
		header("location: homepage.php");
	}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<title>メンバーメールを登録</title>

<link rel="stylesheet" type="text/css" href="grouppage.css" />

</head>

<body>
<div id="group">
<h1>メンバーメールを登録</h1>
    <form action="MemberEmailRegister.php" method="post">
    	<p>メール：</p><input type="text" name="MemberEmail"><span style='color:red;'><?php echo $_SESSION['EmailMessage']; ?></span><br>
	<input class="btn1" type="submit" name="button" value="メールを登録" />
	<button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.href='./mypage.php'">Mypage</button>
    </form>

   <br>


</div>
   
</body>

</html>
