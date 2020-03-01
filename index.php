<?php

// DBへの接続
include_once('./dbconnect.php');

// functions.phpを読み込む
include_once('./functions.php');

// 処理の流れ
// 1. DBへの接続
// 2. recordsテーブルのデータを全件取得
// 3. 全データを画面に表示


// SQL文を作成
$sql = "SELECT * FROM records";

// SQLの実行準備
$stmt = $pdo->prepare($sql);

// SQLの実行
$stmt->execute();

// 全データを変数に入れる
$records = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/reset.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/style.css">
  <title>かけいぼ</title>
</head>
<body>

  <div class="container">
    <header class="mb-5">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">かけいぼ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ml-md-auto" id="navbarNavDropdown">
          <ul class="navbar-nav ml-md-auto">
            <li class="nav-item active">
              <a class="nav-link" href="./createForm.php">追加</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <div class="row">
      <div class="col-12">

        <div class="table-responsive">
          <table class="table table-fixed">
            <thead class="thead-dark">
              <tr>
                <th scope="col" class="col-2">日付</th>
                <th scope="col" class="col-3">項目</th>
                <th scope="col" class="col-2">収入</th>
                <th scope="col" class="col-2">支出</th>
                <th scope="col" class="col-3">操作</th>
              </tr>
            </thead>

            <tbody>

              <?php foreach($records as $record): ?>

                <tr>
                  <td class="col-2"><?php echo h($record['date']); ?></td>
                  <td class="col-3"><?php echo h($record['title']); ?></td>
                  <td class="col-2"><?php echo h($record['type']) == 0 ? h($record['amount']) : '' ?></td>
                  <td class="col-2"><?php echo h($record['type']) == 1 ? h($record['amount']) : '' ?></td>
                  <td class="col-3">
                    <a href="./editForm.php" class="btn btn-success text-light">編集</a>
                    <a href="./delete.php" class="btn btn-danger text-light">削除</a>
                  </td>
                </tr>

              <?php endforeach; ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>


  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="./assets/js/app.js"></script>
</body>
</html>