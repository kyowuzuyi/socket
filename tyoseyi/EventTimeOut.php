<?php

include("db_connect.php");

//�����̓��t�������
$NowDate = date("Y-m-d");
/*
//----�폜���ԂɂȂ�����A���C�x���g���폜����----//
//DeleteDate�̃f�[�^�̓C�x���g�쐬�������̓��t�v���X2���� ex �쐬�����̓���2016-01-01 -> 2016-03-01
//$sql2 = "select * from event where DeleteDate = '$NowDate'";
$sql2 = "select * from event where DeleteDate = '$NowDate'";
$res2 = $pdo->prepare($sql2);
$res2->execute();
$row2 = $res2->fetchALL(PDO::FETCH_BOTH);
$count2 = $res2->rowCount();

//----�폜���ԂɂȂ�����A�t�@�C�����폜����----//
for($i=0;$i<$count2;$i++){
	unlink("eventURL/".$row2[$i][6].".php");
}
*/
//----�폜���ԂɂȂ�����A���̃f�[�^�x�[�X���폜����----//
$sql = "delete from event where DeleteDate = '$NowDate'";
$res = $pdo->prepare($sql);
$res->execute();

?>