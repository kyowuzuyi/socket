<?php session_start(); ?>
<?php 

	if(!isset($_SESSION['email'])) {
		header("location: homepage.php");
	}

	include("db_connect.php");
	include("eventcount.php");


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" type="text/css" href="EventReset.css" />
<title>イベント編集</title>
</head>
<body>

<h1>イベント編集</h1>

<div id="a">
<ul>

<?php

for($i=0;$i<$no;$i++){
echo "<li>";
//    <!-- Small modal -->
echo "<div id=\"b\">";

	echo "<button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#myModal" . $i . "\">". $row[$i][2] . "</button>";
	
	echo "<p><input type=\"button\" class=\"btn btn-default\" data-toggle=\"modal\" data-target=\"#delete" . $i . "\" value=\"削除する\"></p>";
	

echo "</div>";

	echo "<div id=\"delete" . $i . "\" class=\"modal fade\" role=\"dialog\">";
  	    echo "<div class=\"modal-dialog\">";
    		echo "<div class=\"modal-content\">";
                	echo "<form action=\"eventdelete.php\" method=\"post\">";
				echo"<br>";
				echo "<p>本当に削除しますか？</p>";
				echo"<br>";
				echo "<input type=\"hidden\" name=\"eventURL\" value=\"". $row[$i][6] ."\">";
				echo "<button type=\"button\" class=\"a\" data-dismiss=\"modal\">閉じる</button>";
				echo "<input type=\"submit\" class=\"b\" value=\"削除する\">";
			echo "</form>";
		echo "</div>";
	    echo "</div>";
	echo "</div>";


	echo "<div id=\"myModal" . $i . "\" class=\"modal fade\" role=\"dialog\">";
  	    echo "<div class=\"modal-dialog\">";
    		echo "<div class=\"modal-content\">";
                	echo "<form action=\"EventResetWrite.php\" method=\"post\">";
    				echo "<p>イベント名：". $row[$i][2] . "</p><br>";
				echo "<input type=\"hidden\" name=\"eventname\" value=\"". $row[$i][2] ."\">";
    				echo "<p>時間：</p><input type=\"date\" name=\"eventtime\" value=\"2016-01-01\"><br>";
    				echo "<p>場所：</p><input type=\"text\" name=\"eventplace\"><br>";
				echo "<p>メモ：</p><input type=\"text\" name=\"eventmemo\"><br><br>";
				echo "<button type=\"button\" class=\"a\" data-dismiss=\"modal\">閉じる</button>";
				echo "<input class=\"b\" type=\"submit\" value=\"変更する\">";
			echo "</form>";			
		echo "</div>";
	    echo "</div>";
	echo "</div>";
    echo "</li>";
    
}
?>
</ul>
</div>


<div id="c";>
    <span style='color:red; font-size:13px; '><?php echo $_SESSION['EventResetMassage']; ?></span>
    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="location.href='mypage.php'">Mypage</button>
    </div>
</body>

</html>
