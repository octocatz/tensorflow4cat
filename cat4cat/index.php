<!DOCTYPE html>
<html class='stripe_base'>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>ねこチェッカー(β版)</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class='stripe_base'>
<h1>ねこチェッカー(β版）</h1>
<h3>お気に入りのねこの画像をアップして種別を判定してみよう！</h3><p>

<div class="balloon5">
  <div class="faceicon">
   <img src="img/illustcat.png">
  </div>
  <div class="chatting">
    <div class="says">
      <p>ねこの画像をアップしてね。</p>
    </div>
  </div>
</div>

<form name="tfaction" action="tf.php" method="POST" enctype="multipart/form-data">
<input type="file" class="square_btn" name="up_file"><br>

<div class="balloon5">
  <div class="faceicon">
   <img src="img/illustcat.png">
  </div>
  <div class="chatting">
    <div class="says">
      <p>アップできたら判定してみよう！</p>
    </div>
  </div>
</div>

 <input type="submit" class="square_btn" value="種別を判定">
</form>
<p>

</body>
</html>
