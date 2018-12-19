<?php
include 'classes/Card.php';
$card = new Card();
session_start();

if(isset($_POST['username']))
{ $username = $card->escape_string($_POST['username']); }

if(isset($_POST['password']))
{ 
	$password = $card->escape_string($_POST['password']); 
	$crypt_pass = crypt($password, '$2a$07$YourSaltIsA22ChrString$');
}

$checkQuery = "SELECT * FROM USER WHERE USER_NAME='$username' AND USER_PASSWORD='$crypt_pass'";
$result= count($card->getData($checkQuery));

if($result == 0){ 
	header('Location: index.php?err=1'); 
	}
else
{
	$row = $card->getData($checkQuery);
	foreach($row as $res){
		$id = $res['USER_ID'];
		$name = $res['USER_NAME'];
		$role = $res['USER_TYPE'];
	}
	
	$_SESSION['sess_user_id'] = $id;
	$_SESSION['sess_username'] = $name;
	$_SESSION['sess_userrole'] = $role;
	header('Location: index.php');
}
?>