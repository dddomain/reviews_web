<?php

//ベンダーのオートロードファイルを読み込む
require __DIR__ . '/../lib/mysqli.php';

function dropTable($link){
  //テーブルの削除
  $dropTableSql = 'DROP TABLE IF EXISTS reviews;';
  $result = mysqli_query($link, $dropTableSql);
  if ($result) {
    echo 'テーブルを削除しました。'. PHP_EOL;
  } else {
    echo 'Error: テーブルの削除に失敗しました。' . PHP_EOL;
    echo 'Debugging Error:' . mysqli_error($link) . PHP_EOL;
  }
}
function createTable($link){
  //テーブルの作成
  $createTableSql = <<<EOT
    CREATE TABLE reviews(
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    author VARCHAR(255),
    status VARCHAR(255),
    score INTEGER,
    impression VARCHAR(255),
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
    )DEFAULT CHARACTER SET=utf8mb4;
  EOT;
  $result = mysqli_query($link, $createTableSql);
  if ($result) {
    echo 'テーブルを作成しました。'. PHP_EOL;
  } else {
    echo 'Error: テーブルの作成に失敗しました。' . PHP_EOL;
    echo 'Debugging Error:' . mysqli_error($link) . PHP_EOL;
  }
}
function dbClose($link){
  //削除
  mysqli_close($link);
}

$link = dbConnect();
dropTable($link);
createTable($link);
dbClose($link);