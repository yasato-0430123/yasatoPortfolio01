<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="main.css">
  <title>ちょっと一休みのカフェを探そう</title>
</head>
<body>
<?php 
require_once 'DbManager.php';
require_once 'Encode.php';
// try {
//   $db = new PDO('mysql:dbname=cafe;host=localhost;charset=utf8','root','root');
//   echo "接続OK！";
// } catch (PDOException $e) {
//   echo 'DB接続エラー！: ' . $e->getMessage();
// }
// $db = getDb();
?>
<h1>ちょっと一休みのカフェを探そう</h1>
<div class="img-wrap">
<img src="./images/pic1.png" alt="" >
<h2>疲れましたか？</h2>
</div>
<div class="img-wrap2">
<img src="./images/pic2.png" alt="">
<h2>どこかで休んで行きましょうかね</h2>
</div>

<div class="img-wrap3">
<p>近くにあるカフェを探してみますか？</p>
<img src="./images/pic3.png" alt="">
<p><button id="clickBtn" onClick="searchCafe()">探してみる</button></p>
</div>
<div>
<iframe id="ifr" src="" width="250" height="150" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" width="600" height="450" frameborder="1" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>

<div id="p2">
<p>んーと、<br>周辺だったら<br>こんなカフェがありそうですね</p>
<p>ただ<br>ざっくりとした検索なので、<br>もう少し詳しく見たいときは、<br>下のボタンをクリックしてください<br>※別タブで開きます</p>
<p><button id="clickBtn2" onClick="window.open('https://www.google.com/maps/search/%E3%82%AB%E3%83%95%E3%82%A7/','_blank')" >GoogleMapを開いてちょっと詳しく見る</button></p>


<p>んで、どんなメニューがあるか<br>御所望であれば、データベースから探してきますが、<br>確認したいカフェのメニューはありますか？<br>ごめんなさい、個人店は省略します</p>

<form name="form1" action="">
<select name="selectValue" id="" onchange="kakunin()">
<option value="">カフェを選んでください</option>
<option value="1">マクドナルド</option>
<option value="2">ドトール</option>
<option value="3">ベローチェ</option>
<option value="4">タリーズ</option>
<option value="5">スターバックス</option>
<option value="6">サンマルク</option>
<option value="7">コメダ珈琲</option>
</select>
</form>

<table border="1" class="tabel">
<tr>
<th>店の名前</th><th>商品番号</th><th>商品名</th><th>税込価格</th>
</tr>
<?php
try {
  $db = getDb();
  $stt = $db->prepare('SELECT * FROM menu');
  $stt->execute();

  while($row = $stt->fetch(PDO::FETCH_ASSOC)) {

?>
  <tr>
    <td><?=e($row['shopName']) ?></td>
    <td><?=e($row['menuNo']) ?></td>
    <td><?=e($row['menuName']) ?></td>
    <td><?=e($row['price']) ?>円</td>
  </tr>

<?php
  }
} catch(PDOException $e) {
  print "エラーメッセージ：{$e->getMessage()}";
}
?>
</table>
</div>
<script src="main.js"></script>
</body>
</html>
