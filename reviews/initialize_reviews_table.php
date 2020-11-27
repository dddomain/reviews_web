<?php

//ベンダーのオートロードファイルを読み込む
require __DIR__ . '/../vendor/autoload.php';

function dbConnect(){
  //接続

  //環境変数に接続
  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
  $dotenv->load();

  //環境変数を取得・代入
  $dbHost = $_ENV['DB_HOST'];
  $dbUsername = $_ENV['DB_USERNAME'];
  $dbPassword = $_ENV['DB_PASSWORD'];
  $dbDatabase = $_ENV['DB_DATABASE'];

  $link = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbDatabase);
  echo 'データベースに接続できました。'.PHP_EOL;
  if (!$link) {
    echo 'Error: データベースに接続できません。'. mysqli_connect_error() . PHP_EOL;
    exit;
  }
  return $link;
}
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