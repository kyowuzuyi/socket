<?php
	session_start();
	include("db_connect.php");
	
	$eventURL = basename(__FILE__,".php");

	$sql = "select * from event where eventURL='$eventURL';";
	$row = $pdo->query($sql)->fetchAll(PDO::FETCH_BOTH);
	
	$membersql = "select * from membercheck where eventURL='$eventURL'";
	$membercount = $pdo->prepare($membersql);
	$membercount->execute();
	$memberno=$membercount->rowCount();
	
	$commentRow = $pdo->query($membersql)->fetchAll(PDO::FETCH_BOTH);
	
//	$_SESSION['eventURL'] = $eventURL;
	
	include("isgo_check.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<title>出欠表</title>

 <link rel="stylesheet" type="text/css" href="attendanceInput.css" />

</head>

<body>

<div id="aaa">
<h1>イベントの確認</h1>
	<div>
    	<p>イベント名：<span><?php echo $row[0][2] ?></p></span>
        <p>時間：<span><?php echo $row[0][3] ?></p></span>
        <p>場所：<span><?php echo $row[0][4] ?></p></span>        
        <p>メモ：<span><?php echo $row[0][5] ?></p></span> 
</div>

<br>
<div id="bbb">
<h1>出欠表</h1>
<table border="1">
<tr>
	<th>日程</th>
	<td>〇</td>
	<td>▲</td>
	<td>☓</td>	
</tr>
<span style='color:red;'><?php if(isset($_SESSION['MemberCheckUpdate'])){echo $_SESSION['MemberCheckUpdate'];} ?></span>
<tr>
	<th><?php echo $row[0][3] ?></th>
	<td><?php echo $isgono1 ?></td>
	<td><?php echo $isgono2 ?></td>
	<td><?php echo $isgono3 ?></td>		
</tr>
</table>
  <br>

   <!-----コメントリスト----->
   <!-- Small modal -->
   <div id="ccc">
	<button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal01">コメントリスト</button>
</div>
	<div id="myModal01" class="modal fade" role="dialog">
  		<div class="modal-dialog">
    			<div class="modal-content">
		                <div id="ddd">
	      				<form>
        					<p>
						<?php

						for($i=0;$i<$memberno;$i++){
			                		echo $commentRow[$i][1];
			                		include("isgo_if.php");
			                		echo " : " . $commentRow[$i][3] . "<br>";
						}
						?>
                   				</p> 
                   			</form>
				<div  class="button" data-dismiss="modal">閉じる</div>
			</div>
		</div>
	</div>
   </div>
   <!-----コメントリスト----->

  



<form action="../MemberCheckUpdate.php" method="post">
<br>
    <span>個人名：</span><input type="text" name="username"><br><br>
    <span>コメント：</span><input type="text" name="comment"><br><br>
    
   
 
    <input type="radio" name="isgo" value="1">
    <label for="select1">行きます</label>
    <br>
    
    
    <input type="radio" name="isgo" value="2">
    <label for="select2">迷ってます</label>
    <br>
     
    <input type="radio" name="isgo" value="3">
    <label for="select3">行きません</label>
    <br> 

    <input type="hidden" name="eventURL" value="<?php echo $row[0][6] ?>">
    
    
    <input type="submit" class="eee" name="button" value="更新する" />
    
    
</form>
</div>

</div>
</body>
</html>


