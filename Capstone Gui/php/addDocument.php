<?php

 $targetfolder = "../documents/";

$name = $_POST['name'];
$fileNames  = basename( $_FILES['file']['name']);  

 $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;

if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))

 {
    if (isset($_POST['operator'])){
        
	    $db = new PDO('mysql:host=127.0.0.1;dbname=authentication','root','');
		$query = 'INSERT INTO operator (name, docName) VALUES(:name, :docName)';
		$statement = $db->prepare($query);

		$params = [
			'name' => $name,
           		'docName'    => $fileNames
			 ];
		$result = $statement->execute($params);
        
    }
    if (isset($_POST['supervisor'])){
        
	    $db = new PDO('mysql:host=127.0.0.1;dbname=authentication','root','');
		$query = 'INSERT INTO supervisor (name, docName) VALUES(:name, :docName)';
		$statement = $db->prepare($query);

		$params = [
			'name' => $name,
           		'docName'    => $fileNames
			 ];
		$result = $statement->execute($params);
    }
    if (isset($_POST['manager'])){
        
	    $db = new PDO('mysql:host=127.0.0.1;dbname=authentication','root','');
		$query = 'INSERT INTO manager (name, docName) VALUES(:name, :docName)';
		$statement = $db->prepare($query);

		$params = [
			'name' => $name,
           		'docName'    => $fileNames
			 ];
		$result = $statement->execute($params);
    }
    
        echo "<h2>Document Sucessfully uploaded</h2>";
        echo "<p> Click here <a href='addDoc.php'>here</a> to go back </p>";
 }

 else {

    echo "Problem uploading file";
 }

 ?>