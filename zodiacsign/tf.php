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
<title>十二支チェッカー(β版）</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class='stripe_base'>
<h1>十二支チェッカー(β版）</h1>
<h3>判定結果は・・・</h3>
<?php
require('./translate.php');
$uploaddir = 'uploads/';
$tmpfile = $_FILES['up_file']['tmp_name'];
// var_dump($_FILES['up_file']);

if ($ext=is_img($tmpfile)) {
} else {
    // err();
    // exit();
}

if ($ext == ""){
    $ext = 'jpg';
}
function is_img($file)
{
    if (!(file_exists($file) && ($type=exif_imagetype($file)))) return false;
    switch ($type) {
        case IMAGETYPE_GIF:
            return 'gif';
        case IMAGETYPE_JPEG:
            return 'jpg';
        case IMAGETYPE_PNG:
            return 'png';
	default:
            // return false;
    }
}

$exec_rm = "find ./uploads/* -mtime +1 | xargs rm -f";
exec($exec_rm);

$rand_file_name = md5(uniqid(rand(), true));
$rand_file_name .= '.'.$ext;
$uploadfile = $uploaddir . $rand_file_name;
if (move_uploaded_file($_FILES['up_file']['tmp_name'], $uploadfile)) {
} else {
    err();
    exit;
}

$img_name = $_POST["q1"];
$img_file = $img_name . ".jpg";
$exec_cmd = "./start.sh " . $uploadfile;
exec($exec_cmd,$out2,$ret2);
$likes = $out2[0]; 
$ary_likes = explode(":",$likes);
$l_name1 = $ary_likes[0];
$l_point1 = round($ary_likes[1] * 100,2). "%";

// translate
$l_name_ja = translate4ja($l_name1);
?>

<div class="balloon5">
 <div class="faceicon">
  <img src="img/illustcat.png">
 </div>
 <div class="chatting">
  <div class="says">
   <p>あなたのアップした画像は、たぶん <span class="str_f"><?php print $l_name_ja; ?></span> だよ</p>
  </div>
 </div>
</div>
<div class="balloon5">
 <div class="faceicon">
  <img src="img/illustcat.png">
 </div>
 <div class="chatting">
  <div class="says">
   <p>だいたい <span class="str_f"><?php print $l_point1; ?></span> くらい似てるよ！</p>
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
   <p>アップした画像はこちら。</p>
  </div>
 </div>
</div>
<p>
<p><p><img src="<?php echo './uploads/'.$rand_file_name; ?>" class="main_img"><p>
<p><p>

<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://mllab.biz/zodiacsign/" data-text="あなたがチェックした画像は、十二支では「<?php print $l_name_ja; ?>」でした！「<?php print $l_point1; ?>」くらい似てるよ！" data-via="" data-size="" data-related="" data-count="vertical" data-hashtags="十二支チェッカー">Tweet</a> 
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<p><p>

<?php
function err($mime_type){
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
print $mime_type;
}
?>
<input type="button" class="square_btn" onclick="history.back();" value="もう一度">
<p>

</body>
</html>
