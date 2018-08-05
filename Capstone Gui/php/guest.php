<?php
session_start();
	
	if (isset($_SESSION['username'])) {

		require_once "../guest.html";
		
	}	else {
		echo "You are not authorized .... go away"; 	
	}
?>
