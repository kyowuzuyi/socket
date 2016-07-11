<?php

	$name = $_SESSION['name'];
	$sql = "select * from event where name=:name;";
	$res = $pdo->prepare($sql);
	$res->bindValue(':name',$name);
	$res->execute();
	$row = $res->fetchAll(PDO::FETCH_BOTH);
	$no=$res->rowCount(); 
?>