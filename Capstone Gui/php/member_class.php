<?php
class member extends employee{
    
    private $password;
  
    public function getPassword(){

	$db = new PDO('mysql:host=127.0.0.1;dbname=final','root','');
	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	$query = 'SELECT* FROM login WHERE userID = :id ';
	$statement = $db->prepare($query);	
	$statement->bindvalue('id', $this->userID);
	$result = $statement->execute();
	$row = $statement->fetch(1);
	$this->password = $row['Password'];
        return $this->password;
    }
    
    public function setPassword(string $Password){
       	$db = new PDO('mysql:host=127.0.0.1;dbname=final','root','');

	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

	$query = 'UPDATE login SET Password= :password WHERE userID = :id';
	$statement = $db->prepare($query);
	$statement->bindvalue('password', $Password);
	$statement->bindvalue('id', $this->userID);
	$statement->execute();
    }  
  
    public function setuserID(int $ID){
        $this->userID = $ID;
    } 
    public function setUsername(string $Username){
       	$db = new PDO('mysql:host=127.0.0.1;dbname=final','root','');

	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

	$query = 'UPDATE login SET Username= :name WHERE userID = :id';
	$statement = $db->prepare($query);
	$statement->bindvalue('name', $Username);
	$statement->bindvalue('id', $this->userID);
	$statement->execute();
    }    

    public function setEmail(string $Email){
       	$db = new PDO('mysql:host=127.0.0.1;dbname=final','root','');

	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

	$query = 'UPDATE login SET Email= :Email WHERE userID = :id';
	$statement = $db->prepare($query);
	$statement->bindvalue('Email', $Email);
	$statement->bindvalue('id', $this->userID);
	$statement->execute();
    } 

    public function setLogbook($LogEntry){
	$db = new PDO('mysql:host=127.0.0.1;dbname=final','root','');
	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

	$stmt = $db->prepare("INSERT INTO logs(UserID, Username, logbook) VALUES(:a ,:u ,:f)");
	$stmt->execute(array(':a' => $this->userID,':u' => $this->username, ':f' => $LogEntry));
    }

   public function setInfo(string $username, string $password, string $Email){
		$this->username = $username;
		$this->password = $password;
		$this->Email = $Email;

	    $db = new PDO('mysql:host=127.0.0.1;dbname=final','root','');
		$query = 'INSERT INTO login (Username, Password, Email) VALUES(:username, :password, :email)';
		$statement = $db->prepare($query);

		$params = [
			'username' => $this->username,
			'password' => $this->password,
           		'email'    => $this->Email
			 ];
		$result = $statement->execute($params);

	}
} 
?>
