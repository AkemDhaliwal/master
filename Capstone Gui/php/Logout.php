<?php
//logout.php
	session_start();
    
    $id = $_SESSION['id'];
        
        $db = new PDO('mysql:host=127.0.0.1;dbname=authentication','root','');
	    $query = 'UPDATE authentication SET status= 0 WHERE id = :id';
		$statement = $db->prepare($query);

		$params = [
			'id' => $id
			 ];
		$result = $statement->execute($params);

	session_destroy();

            echo "<script type='text/javascript'>location.href = '../login.html';</script>";
?>
s