<?php
session_start();
$_SESSION['sess_user_id'] = "";
$_SESSION['sess_username'] = "";
$_SESSION['sess_userrole'] = "";
header('Location: index.php');
?>