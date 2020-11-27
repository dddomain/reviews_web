<?php
?>
<!DICKTYPE html>
<html lang="ja">
<head>
  <title>読書ログ登録</title>
  <meta charset="utf-8">
  <meta name = "viewport" content = "width = device-width, initial-scale = 1">
</head>
<body>
  <h1>読書ログ</h1>
  <h2>読書ログの登録</h2>
  <form action="create.php" method="post">
    <!-- 書籍名 -->
    <div>
      <label for="title">書籍名</label>
      <input type="text" name="title" id="title"> 
    </div>
    <!-- 著者名 -->
    <div>
      <label for="author">著者名</label>
      <input type="text" name="author" id="auhtor"> 
    </div>
    <!-- 読書状況 -->
    <label for="status">読書状況</label>
    <div>
      <div>
        <input type="radio" name="status" id="status1" value="未読">
        <label for="status1">未読</label>
      </div>
      <div>
        <input type="radio" name="status" id="status2" value="読んでいる">
        <label for="status2">読んでいる</label>
      </div>
      <div>
        <input type="radio" name="status" id="status3" value="読了">
        <label for="status3">読了</label>
      </div>
    </div>
    <!-- 評価 -->
    <div>
      <label for="score">書籍名(5点満点の整数)</label>
      <input type="text" name="score" id="score"> 
    </div>
    <!-- 感想 -->
    <div>
      <label for="impression">感想</label>
      <textarea type="text" name="impression" id="impression" rows="10"></textarea>
    </div>
    <!-- 登録ボタン -->
    <button type="submit">登録する</button>
  </form>
</body>
</html>