<!DOCTYPE html>
<html>
	<head>
<meta charset="utf-8">
<title>POST_SAMPLE</title>
<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
<h1>Tensorflowでネコあてゲーム</h1>
		<h2>判別したいネコさんを選択して[Check]をおしてね。</h2><p>
		<form name="tfaction" action="tf.php" method="POST">
	<p>ネコ1<input type="radio" name="q1" value="cat1" checked><p><img src="./img/cat1.jpg" class="main_img">
	<p>ネコ2<input type="radio" name="q1" value="cat2"><p><img src="./img/cat2.jpg" class="main_img">
	<p>ネコ3<input type="radio" name="q1" value="cat3"><p><img src="./img/cat3.jpg" class="main_img">
<p>


		<?php
#var_dump( exec('ls',$out,$ret) );
#print_r($out);
#var_dump( $ret );
#echo "#";
#var_dump( exec('./start.sh',$out2,$ret2) );
#print_r($out2);
#var_dump( $ret2 );
		?>
			<p><input type="submit" name="check" value="Check" /></p>
		</form>


	</body>
</html>
