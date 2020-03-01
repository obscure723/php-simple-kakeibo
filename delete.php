<?php

include_once('./dbconnect.php');

$id = $_GET['id'];

// DB接続
// DELETEのSQLを準備
// SQLを実行
// TOPに移動

$sql = 'DELETE FROM records WHERE id = :id';

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

$stmt->execute();

header('Location: ./index.php');
exit;