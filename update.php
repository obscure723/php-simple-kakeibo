<?php

include_once('./functions.php');
include_once('./dbconnect.php');

$title = h($_POST['title']);
$type = h($_POST['type']);
$amount = h($_POST['amount']);
$date = h($_POST['date']);
$id = h($_POST['id']);

$sql = "UPDATE records SET title = :title, type = :type, amount = :amount, date = :date, updated_at = now() WHERE id = :id";
$stmt = $pdo->prepare($sql);

$stmt->bindParam(':title', $title, PDO::PARAM_STR);
$stmt->bindParam(':type', $type, PDO::PARAM_INT);
$stmt->bindParam(':amount', $amount, PDO::PARAM_INT);
$stmt->bindParam(':date', $date, PDO::PARAM_STR);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

$stmt->execute();

header('Location: ./index.php');
exit;