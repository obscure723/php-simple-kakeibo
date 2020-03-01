<?php

include_once('./functions.php');
include_once('./dbconnect.php');

$title = h($_POST['title']);
$type = h($_POST['type']);
$amount = h($_POST['amount']);
$date = h($_POST['date']);

$sql = "INSERT INTO records (title, type, amount, date, created_at, updated_at) VALUES (:title, :type, :amount, :date, now(), now())";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':title', $title, PDO::PARAM_STR);
$stmt->bindParam(':type', $type, PDO::PARAM_INT);
$stmt->bindParam(':amount', $amount, PDO::PARAM_INT);
$stmt->bindParam(':date', $date, PDO::PARAM_STR);

$stmt->execute();

header('Location: ./index.php');
exit;