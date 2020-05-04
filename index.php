<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHPの練習</title>
</head>
<body>
<?php 
function getDb() {
  $dsn = 'mysql:dbname=testphp01;host=localhost;charset=utf8';
  $usr = 'root';
  $passwd = 'root';

    $db = new PDO($dsn, $usr, $passwd);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$db = new PDO($dsn, $usr, $passwd, [PDO::ATTR_PERSISTENT => true);
  return $db;
  function e(string $str, string $charset = 'UTF-8'): string {
  return htmlspecialchars($str, ENT_QUOTES | ENT_HTML5, $charset);
}
}
$db = getDb();
?>
<h2>データベース操作の練習</h2>
<form method="POST" action="insert_process.php">
<div>
  <label for="isbn">ISBNコード：</label><br />
  <input id="isbn" type="text" name="isbn" size="25" maxlength="20" />
</div><div>
  <label for="title">書名：</label><br />
  <input id="title" type="text" name="title" size="35" maxlength="150" />
</div><div>
  <label for="price">価格：</label><br />
  <input id="price" type="text" name="price" size="6" maxlength="5" />円
</div><div>
  <label for="publish">出版社：</label><br />
  <input id="publish" type="text" name="publish" size="25" maxlength="30" />
</div><div>
  <label for="published">刊行日：</label><br />
  <input id="published" type="text" name="published" size="15" maxlength="10" />
</div><div>
  <input type="submit" value="登録" />
</div>
<h2>結果セット</h2>
<table border="1">
<tr>
  <th>ISBNコード</th><th>書名</th><th>価格</th><th>出版社</th><th>刊行日</th>
</tr>
<?php
try {
  $db = getDb();
  $stt = $db->prepare('SELECT * FROM book ORDER BY published DESC');
  $stt->execute();
  while($row = $stt->fetch(PDO::FETCH_ASSOC)) {
  //foreach($stt as $row) { 
  $stt1 = $db->query('SELECT COUNT(*) FROM book');
  print "件数：{$stt1->fetchColumn()}件";
?>
  <tr>
    <td><?=e($row['isbn']) ?></td>
    <td><?=e($row['title']) ?></td>
    <td><?=e($row['price']) ?>円</td>
    <td><?=e($row['publish']) ?></td>
    <td><?=e($row['published']) ?></td>
  </tr>
  
<?php
  }
} catch(PDOException $e) {
  print "エラーメッセージ：{$e->getMessage()}";
}
?>

</body>
</html>
