<?php


   $db = new PDO('mysql:host=127.0.0.1;dbname=authentication','root','');

    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $query = 'SELECT * FROM operator';
	$statement = $db->prepare($query);	
	
	$result = $statement->execute();

    echo "<h1><b>Training Documents</b></h1>";

    echo'<table id="table">'; 

    echo'<tr><td>  Training Name  </td><td>  Document  </td></tr>';

    while($row = $statement->fetch($result)){

    echo "<tr></td><td>". $row['name'] . "</td><td>". $row['docName'] . "</td></tr>";
    }
    echo"</table>"; 

?>