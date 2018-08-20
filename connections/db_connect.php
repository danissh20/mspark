<?php
session_start();

$_SESSION['cart']=isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

$db = new mysqli("localhost","root","","onlinestore");
if($db->connect_errno > 0){
	die('Unable to connect to database [' . $db->connect_error . ']');
}

?>