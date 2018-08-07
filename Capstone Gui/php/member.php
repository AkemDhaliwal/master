<?php
session_start();
	
	if (isset($_SESSION['id'] )& isset( $_SESSION['position'])) {

		require_once "../member.html";
		
	}	else {
        echo "<p>You are not logged in, click here <a href='../login.html'>here</a> to login </p>";	}
?>
