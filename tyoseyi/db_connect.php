<?php

try {
$pdo = new PDO('mysql:dbname=chat;host=127.0.0.1','root','');

} catch (PDOException $e) {
 exit('�f�[�^�x�[�X�ڑ����s�B'.$e->getMessage());
}

?>