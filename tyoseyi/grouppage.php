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
<title>団体情報を登録</title>

<link rel="stylesheet" type="text/css" href="grouppage.css" />

</head>

<body>
<div id="group">
<h1>団体情報を登録</h1>
    <form action="groupRegister.php" method="post">
    	<?php 
    		if($_SESSION['name'] == ""){
				echo "<p>組織名：</p><input type=\"text\" name=\"name\"><br>";
			}else{
				echo "<p>組織名：</p>" . "<p style='color:blue;'>" . $_SESSION['name'] . "</p>";
			}
    	?>
	<p>人数：</p><input type="text" onkeyup="value=value.replace(/[^\d]/g,'')" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" name="people"><br><br>
        <p>TEL：</p><input type="text" onkeyup="value=value.replace(/[^\d]/g,'')" onbeforepaste="clipboardData.setData('text',clipboardData.getData('tex').replace(/[^\d]/g,''))" name="tel"><span style='color:red';>( - などがいりません)</span><br><br>
        <input class="btn1" type="submit" name="button" value="登録する" />
	<button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.href='mypage.php'">Mypage</button>
	<span style='color:red; font-size:13px; '><?php echo $_SESSION['GroupMessage']; ?></span>
    </form>

</div>


</body>

</html>
