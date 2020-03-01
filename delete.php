<?php

include_once('./functions.php');
include_once('./dbconnect.php');

$id = h($_GET['id']);

$sql = "DELETE FROM records WHERE id = :id";
$stmt = $pdo->prepare($sql);

$stmt->bindParam(':id', $id, PDO::PARAM_INT);

$stmt->execute();

header('Location: ./index.php');
exit;