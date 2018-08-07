<?php
session_start();
	
	if (isset($_SESSION['id'] )& ($_SESSION['position'] == 3)) {

		require_once "../manager.html";
		
	}	else {
        echo "<p>You are not logged in, click here <a href='../login.html'>here</a> to login </p>";	}
?>
