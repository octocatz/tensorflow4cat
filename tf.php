<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>POST_SAMPLE</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php

$uploaddir = '/var/www/html/uploads/';
$tmpfile = $_FILES['up_file']['tmp_name'];
$img_data = file_get_contents($tmpfile);
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime_type = finfo_buffer($finfo, $img_data);
finfo_close($finfo);
#echo 'mime:'.$mime_type.'<p>';

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
	echo "invalid file type!!<p>";
	exit('jpg/png only allowed!');
}
#echo 'file type is ...['.$ext.']<p>';
$rand_file_name = md5(uniqid(rand(), true));
$rand_file_name .= '.'.$ext;
$uploadfile = $uploaddir . $rand_file_name;

#echo 'uploadfile:'.$uploadfile.'<p>';
#echo $_FILES['up_file']['tmp_name'];

if (move_uploaded_file($_FILES['up_file']['tmp_name'], $uploadfile)) {
	    #echo "File is valid, and was successfully uploaded.<p>";
} else {
	    echo "Possible file upload attack!<p>";
}


/*
echo 'Here is some more debugging info:<p>';
print_r($_FILES);
*/

/*
if(isset($_POST["q1"])){
}else{
	print "ネコを選んでください。";
}
*/
$img_name = $_POST["q1"];
$img_file = $img_name . ".jpg";
#$exec_cmd = "./start.sh " . $img_file;
$exec_cmd = "./start.sh " . $uploadfile;

?>
<p>えらんだファイル<p><img src="<?php echo '/uploads/'.$rand_file_name; ?>" class="main_img"><p>
<?php
#echo $exec_cmd.'<p>';
exec($exec_cmd,$out2,$ret2);
$likes = $out2[0]; 
$ary_likes = explode(" ",$likes);
$l_name1 = $ary_likes[0];
$l_point1 = round($ary_likes[1] * 100,2). "%";

print "選んだ写真のネコは、たぶん".$l_name1."だよ";
print "<p>";
print "だいたい".$l_point1."くらいの確率であっていると思うよ。";
?>
</body>
</html>
