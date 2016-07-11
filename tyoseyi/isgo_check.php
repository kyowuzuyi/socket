<?php

	$isgosql1 = "select isgo from membercheck where eventURL=:eventURL AND isgo='1'";
	$isgocount1 = $pdo->prepare($isgosql1);
	$isgocount1->bindValue(':eventURL',$eventURL);
	$isgocount1->execute();
	$isgono1=$isgocount1->rowCount();

	$isgosql2 = "select isgo from membercheck where eventURL=:eventURL AND isgo='2'";
	$isgocount2 = $pdo->prepare($isgosql2);
	$isgocount2->bindValue(':eventURL',$eventURL);
	$isgocount2->execute();
	$isgono2=$isgocount2->rowCount();

	$isgosql3 = "select isgo from membercheck where eventURL=:eventURL AND isgo='3'";
	$isgocount3 = $pdo->prepare($isgosql3);
	$isgocount3->bindValue(':eventURL',$eventURL);
	$isgocount3->execute();
	$isgono3=$isgocount3->rowCount();

?>