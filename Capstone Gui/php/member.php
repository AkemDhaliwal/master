<?php
session_start();
	
	if (isset($_SESSION['username'] )& isset( $_SESSION['password'])) {

		require_once "../member.html";
		
	}	else {
		echo "You are not authorized .... go away"; 	
	}
?>
