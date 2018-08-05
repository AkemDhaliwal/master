<?php 
	//authenticate
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];

	if($password==NULL)
	{
		$authenticated = FALSE;
		
		$db = new PDO(
			'mysql:host=127.0.0.1;dbname=final', // our schema containing all the tables
			'root',
			'');
		
		$rows = $db->query('SELECT * FROM login ORDER BY userID'); //userID, username, password
		
		
		foreach ($rows as $row){				//22
			if($username == $row[1]){//22
				$authenticated = TRUE;				//22
					
			}};
		if ($authenticated == TRUE){
			$_SESSION['username']=$username;
		echo "<p> You are logged in as Guest </p>";
		echo "<p> Please click <a href='guest.php'> here</a></p>";
		}else
echo "<p> Please check the username and password and try again, Click here <a href='../login.html'>here</a> to log in again </p>";
	}
	
	else if($username && $password){
		//connect to the database
		
		$authenticated = FALSE;
		
		$db = new PDO(
			'mysql:host=127.0.0.1;dbname=final', // our schema containing all the tables
			'root',
			'');
		
		$rows = $db->query('SELECT * FROM login ORDER BY userID'); //userID, username, password
		
		
		foreach ($rows as $row){				//22
			if($username == $row[1] && $password == $row[2]){//22
				$authenticated = TRUE;
				$_SESSION['userID']=$row[0];				//22
					
			}};
		if ($authenticated == TRUE){
			$_SESSION['username']=$username;
			$_SESSION['password']=$password;
			echo "<p> You are logged in. </p>";
			echo "<p> Please click <a href='member.php'> here</a></p>";
		}
		else{
			echo "<p> Your are not authenticated </p>";
			
			echo "<p> Please check the username and password and try again, Click here <a href='../login.html'>here</a> to log in again </p>";
		}
	} else {
			echo "<p> please enter a username and/or password</p>";
	}	


?>

			

