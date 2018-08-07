<?php
session_start();

        $id  = $_SESSION['id'];
            
        $db = new PDO('mysql:host=127.0.0.1;dbname=authentication','root','');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $query = 'SELECT* FROM authentication WHERE id = :id ';
        $statement = $db->prepare($query);  
        $statement->bindvalue('id', $id);
        $result = $statement->execute();
        $row = $statement->fetch(1);
        $name = $row['name'];

	echo '<b>Name : </b>'.$name;
?>