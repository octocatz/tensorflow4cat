<!DOCTYPE html>
<html class='stripe_base'>
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-63624044-7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-63624044-7');
</script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>十二支チェッカー(β版)</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class='stripe_base'>
<h1>十二支チェッカー(β版）</h1>
<h3>気になる画像をアップして十二支でどのどうぶつになるかを判定してみよう！</h3><p>

<div class="balloon5">
  <div class="faceicon">
   <img src="img/illustcat.png">
  </div>
  <div class="chatting">
    <div class="says">
      <p>気になる画像をアップしてね。</p>
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
