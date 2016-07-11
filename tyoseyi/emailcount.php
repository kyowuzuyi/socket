<?php

$emailsql = "select memberemail from memberemail where groupID=:groupID";
$res3 = $pdo->prepare($emailsql);
$res3->bindValue(':groupID',$groupID);
$res3->execute();
$emaillist = $res3->fetchAll(PDO::FETCH_BOTH);

//$emailcount = $pdo->prepare($emailsql);
//$emailcount->execute();
$emailno=$res3->rowCount();

?>