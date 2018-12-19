<?php
session_start();
$_SESSION['sess_user_id'] = "";
$_SESSION['sess_username'] = "";
$_SESSION['sess_userrole'] = "";
$_SESSION['current_list'] = [];
$_SESSION['current_qty_list'] = [];
header('Location: index.php');
?>