<?php session_start(); ?>
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

<h1>スケジュールちゃん</h1>
    <!-- Small modal -->
   <div id="but1">
	<button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal01"><a>ログイン</a></button>
    </div>

	<div id="myModal01" class="modal fade" role="dialog">
  		<div class="modal-dialog">
    			<div class="modal-content">
      				<form action="login.php" method="post">
	                		<p>メールアドレス:</p><input type="text" name="email"><br>
        		        	<p>パスワード:</p><input type="password" name="pw"><br><br>
	     		   		<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
		 			<input  class="inp" type="submit" name="button" value="ログイン" />
		                </form>
			</div>
		</div>
	</div>


    <!-- Small modal -->
    <div id="but2">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal02"><a>新規登録</a></button>
    </div>
	<div id="myModal02" class="modal fade" role="dialog">
  		<div class="modal-dialog">
    			<div class="modal-content">
      				<form action="UserRegister.php" method="post">
                			<p>メールアドレス:</p><input type="text" name="email"><br>
	                    		<p>パスワード:</p><input type="password" name="pw"><br>
        	           		<p>もう一度パスワード:</p><input type="password" name="pw2"><br><br>
     			   		<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
					<input class="inp" type="submit" name="button" value="登録する" />	 	  		
		                </form>
			</div>
		</div>
	</div>
   
    
</div>



</body>
</html>
