<?php

try {
$pdo = new PDO('mysql:dbname=tyoseyi;host=127.0.0.1','tyoseyi','tyoseyi1234');

} catch (PDOException $e) {
 exit('�f�[�^�x�[�X�ڑ����s�B'.$e->getMessage());
}

?>