<?php

//データベースへの接続
require_once __DIR__ . '/../lib/mysqli.php';

// -------------------- 関数宣言 --------------------
function createReviews($link, $review) {
  //SQL文の作成
  $sql = <<<EOT
  INSERT INTO reviews (
    title,
    author,
    status,
    score,
    impression
    ) VALUES (
    "{$review['title']}",
    "{$review['author']}",
    "{$review['status']}",
    "{$review['score']}",
    "{$review['impression']}"
    )
  EOT;
  //SQL文の実行
  $result = mysqli_query($link, $sql);
  // echo "データを追加できました".PHP_EOL;
  
  //SQL文実行の例外処理
  if (!$result) {
    error_log('Error: fail to create review');
    error_log('Debugging Error:' . mysqli_error($link) .PHP_EOL);
  }
}

// -------------------- 処理 --------------------

//HTTPメソッドがPOSTだったら(条件分岐)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  //POSTされた読書ログを変数に格納する
  $review = [
    'title' => $_POST['title'],
    'author' => $_POST['author'],
    'status' => $_POST['status'],
    'score' => $_POST['score'],
    'impression' => $_POST['impression']
  ];
  // var_export($review);
  
  //バリデーションする
  
  //データベースに接続する
  $link = dbConnect();
  
  //データベースに格納する
  createReviews($link, $review);
  
  //データベースから切断する
  mysqli_close($link);
  // var_export(100);


  //index.phpへのリダイレクト
  header("Location: index.php");
}
