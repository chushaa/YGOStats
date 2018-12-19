<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>
	<?php 
	$pass = '55345@Cc';
	echo crypt($pass, '$2a$07$YourSaltIsA22ChrString$'); 
	
	//DO NOT FORGET TO ADD A BLANK IMAGE FOR IF AN IMAGE DOES NOT EXIST
	?>
</body>
</html>