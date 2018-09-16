<!DOCTYPE html>
<html class='stripe_base'>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>ねこ診断</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class='stripe_base'>
<h1>ねこの画像認識</h1>
<h3>判定結果は・・・</h3>
<?php
$uploaddir = './uploads/';
$tmpfile = $_FILES['up_file']['tmp_name'];
$img_data = file_get_contents($tmpfile);
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime_type = finfo_buffer($finfo, $img_data);
finfo_close($finfo);

$exec_rm = "find ./uploads/* -mtime +1 | xargs rm -f";
exec($exec_rm);


$ext = "";
switch ($mime_type) {
case "image/png":
	$ext = "png";
	break;
case "image/jpeg":
	$ext = "jpg";
	break;
}
if ($ext == ""){
	err();
	exit();
}
$rand_file_name = md5(uniqid(rand(), true));
$rand_file_name .= '.'.$ext;
$uploadfile = $uploaddir . $rand_file_name;

if (move_uploaded_file($_FILES['up_file']['tmp_name'], $uploadfile)) {
} else {
}

$img_name = $_POST["q1"];
$img_file = $img_name . ".jpg";
$exec_cmd = "./start.sh " . $uploadfile;
exec($exec_cmd,$out2,$ret2);
$likes = $out2[0]; 
$ary_likes = explode(" ",$likes);
$l_name1 = $ary_likes[0];
$l_point1 = round($ary_likes[1] * 100,2). "%";
?>

<div class="balloon5">
 <div class="faceicon">
  <img src="img/illustcat.png">
 </div>
 <div class="chatting">
  <div class="says">
   <p>選んだ写真のネコは、たぶん <span class="str_f"><?php print $l_name1; ?></span> だよ</p>
  </div>
 </div>
</div>
<div class="balloon5">
 <div class="faceicon">
  <img src="img/illustcat.png">
 </div>
 <div class="chatting">
  <div class="says">
   <p>だいたい <span class="str_f"><?php print $l_point1; ?></span> くらいの確率であっていると思うよ</p>
  </div>
 </div>
</div>
<p></p>
<div class="balloon5">
 <div class="faceicon">
  <img src="img/illustcat.png">
 </div>
 <div class="chatting">
  <div class="says">
   <p>選んだファイルはこのねこだよ。</p>
  </div>
 </div>
</div>
<p>
<p><p><img src="<?php echo './uploads/'.$rand_file_name; ?>" class="main_img"><p>
<?php
function err(){
$heredocs = <<< EOM
<div class="balloon5">
 <div class="faceicon">
  <img src="img/illustcat.png">
 </div>
 <div class="chatting">
  <div class="says">
   <p>ファイルが選ばれていないか誤っているよ。判定できるのはpng/jpgのファイルだけだよ。</p>
  </div>
 </div>
</div>
<p>
<input type="button" class="square_btn" onclick="history.back();" value="もう一度">
EOM;
print $heredocs;
}
?>
<input type="button" class="square_btn" onclick="history.back();" value="もう一度">
<p>

</body>
</html>
