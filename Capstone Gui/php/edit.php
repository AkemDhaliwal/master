<?php
	session_start();
	require_once __DIR__ . '/Guest_class.php';
	require_once __DIR__ . '/member_class.php';

	$user = new member($_SESSION['username']);
	$user->setuserID($_SESSION['userID']);

	if($_POST['username']!=NULL){
	$user->setUsername($_POST['username']);
	echo 'works';
	
	}

	if($_POST['password']!=NULL){
	$user->setPassword($_POST['password']);
	
	}

	if($_POST['email']!=NULL){
		$user->setEmail($_POST['email']);
	
	}

echo "<p> Please click <a href='member.php'> here</a></p>";
?>
