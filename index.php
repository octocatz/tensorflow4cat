<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>POST_SAMPLE</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class='stripe_base'>
<h1>Tensorflowでねこの画像認識</h1>
<h2>判別したいねこを選択して[Check]をおしてね。</h2><p>
<form name="tfaction" action="tf.php" method="POST" enctype="multipart/form-data">
<!--
 <p>ネコ1<input type="radio" name="q1" value="cat1" checked><p><img src="./img/cat1.jpg" class="main_img">
 <p>ネコ2<input type="radio" name="q1" value="cat2"><p><img src="./img/cat2.jpg" class="main_img">
 <p>ネコ3<input type="radio" name="q1" value="cat3"><p><img src="./img/cat3.jpg" class="main_img">
 <p>
-->
 ファイルをアップする:<input type="file" name="up_file"><br>
 <input type="submit" value="アップしたファイルでCheck！">
<!--
<p><input type="submit" name="check" value="Checkする" /></p>
-->
</form>
</body>
</html>
