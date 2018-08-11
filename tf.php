<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>POST_SAMPLE</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
if(isset($_POST["q1"])){
}else{
	         print "ネコを選んでください。";
}
$img_name = $_POST["q1"];
$img_file = $img_name . ".jpg";
$exec_cmd = "./start.sh " . $img_file;
?>
	<p>えらんだネコ<p><img src="./img/<?php echo $img_file; ?>" class="main_img"><p>
<?php
#var_dump( exec($exec_cmd,$out2,$ret2) );
#print "#";
exec($exec_cmd,$out2,$ret2);
#print_r($out2);
#print "#";
#var_dump($ret2);
$likes = $out2[0]; 
#print($likes);
#print "#";
$ary_likes=explode(" ",$likes);
#var_dump($ary_likes);
$l_name1 = $ary_likes[0];
$l_point1 = round($ary_likes[1] * 100,2). "%";


print "選んだ写真のネコは、たぶん".$l_name1."だよ";
print "<p>";
print "だいたい".$l_point1."くらいの確率であっていると思うよ。";


?>
</body>
</html>
