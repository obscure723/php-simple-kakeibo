<?php

// dbconnect.phpを読み込む ➞ DBに接続
include_once('./dbconnect.php');

// 新しいレコードを追加するための処理
// 【処理の流れ】
// 最終のゴール：新しい家計簿が追加されて、TOPに戻る

// 1. 画面で入力された値の取得
// 2. PHPからMySQLへ接続
// 3. SQL文を作成して、画面で入力された値をrecordsテーブルに追加
// 4. index.phpに画面遷移する

$date = $_POST['date'];
$title = $_POST['title'];
$amount = $_POST['amount'];
$type = $_POST['type'];

// INSERT文の作成
$sql = "INSERT INTO records(title, type, amount, date, created_at, updated_at) VALUES(:title, :type, :amount, :date, now(), now())";

// 先程作成したSQLを実行できるよう準備
$stmt = $pdo->prepare($sql);

// 値の設定
$stmt->bindParam(':title', $title, PDO::PARAM_STR);
$stmt->bindParam(':type', $type, PDO::PARAM_INT);
$stmt->bindParam(':amount', $amount, PDO::PARAM_INT);
$stmt->bindParam(':date', $date, PDO::PARAM_STR);

// SQLを実行
$stmt->execute();

// index.phpに移動
header('Location: ./index.php');
exit;