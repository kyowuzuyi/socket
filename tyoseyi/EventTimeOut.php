<?php

include("db_connect.php");

//今日の日付けを取る
$NowDate = date("Y-m-d");
/*
//----削除時間になったら、何個イベントを削除する----//
//DeleteDateのデータはイベント作成した時の日付プラス2か月 ex 作成したの日は2016-01-01 -> 2016-03-01
//$sql2 = "select * from event where DeleteDate = '$NowDate'";
$sql2 = "select * from event where DeleteDate = '$NowDate'";
$res2 = $pdo->prepare($sql2);
$res2->execute();
$row2 = $res2->fetchALL(PDO::FETCH_BOTH);
$count2 = $res2->rowCount();

//----削除時間になったら、ファイルを削除する----//
for($i=0;$i<$count2;$i++){
	unlink("eventURL/".$row2[$i][6].".php");
}
*/
//----削除時間になったら、そのデータベースを削除する----//
$sql = "delete from event where DeleteDate = '$NowDate'";
$res = $pdo->prepare($sql);
$res->execute();

?>