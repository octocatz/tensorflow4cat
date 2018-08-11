<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>title1</title>
</head>
<body>
body cat
<?php
print "catlist";
if(isset($_POST["q1"]))){
	 print "cat?";
	  print $_POST["q1"];
}else{
	 print "ネコを選んでください。";
}
?>
</body>
</html>
