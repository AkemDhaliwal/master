<?php
	session_start();
	require_once __DIR__ . '/Guest_class.php';
	require_once __DIR__ . '/member_class.php';

	$object = new member($_SESSION['username']);

	$object->setuserID($_SESSION['userID']);

	echo 'Password:'.$object->getPassword();
?>

