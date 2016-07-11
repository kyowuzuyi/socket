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
  
 <link rel="stylesheet" type="text/css" href="homepage.css" />
  
<title>スケジュール</title>
</head>

<body>



<div id="all">

<h1>イベントのリンクアドレス</h1>
    <!-- Small modal -->
<form>
	リンク：<textarea name="link" cols="60" rows="2" warp="VIRTUAL"><?php echo $_SESSION['URL'] ?></textarea>
</form>

    
</div>
    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="location.href='mypage.php'">Mypage</button>


</body>
</html>
