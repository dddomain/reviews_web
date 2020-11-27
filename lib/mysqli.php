<?php

require __DIR__ . '/../vendor/autoload.php';

function dbConnect(){
  //接続

  //環境変数に接続
  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
  $dotenv->load();

  //環境変数を取得
  $dbHost = $_ENV['DB_HOST'];
  $dbUsername = $_ENV['DB_USERNAME'];
  $dbPassword = $_ENV['DB_PASSWORD'];
  $dbDatabase = $_ENV['DB_DATABASE'];

  $link = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbDatabase);
  // echo 'データベースに接続できました。'.PHP_EOL;
  if (!$link) {
    echo 'Error: データベースに接続できません。'. mysqli_connect_error() . PHP_EOL;
    exit;
  }
  return $link;
}