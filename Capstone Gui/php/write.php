<?php
	session_start();
	require_once __DIR__ . '/Guest_class.php';
	require_once __DIR__ . '/member_class.php';
	
	$user = new member($_SESSION['username']);
	$user->setuserID($_SESSION['userID']);
	$user->setLogbook($_POST['logdata']);

?>
