<?php
class employee{
  public $dbname = "authentication";
    protected $id;
    protected $E_name;
    protected $position;
    protected $status;
    //private $password;
    public function __construct(){
    }

    public function getName(){
        return $this->E_name;
    }   
    public function getID(){
        return $this->id;
    }
    public function getPosition(){
        return $this->position;
    }
    
    public function setname($name){
        $this->E_name = $name;
    }
    
    public function CheckName(int $id){
        $db = new PDO('mysql:host=127.0.0.1;dbname=authentication','root','');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $query = "SELECT* FROM authentication WHERE id = :id";
        $statement = $db->prepare($query);	
        $statement->bindvalue('id', $id);
        $result = $statement->execute();
	    if($result > 0)
        {
            $row = $statement->fetch(1);
	        $this->name = $row['name'];
            return $this->name;
        }
    }
    
    public function getValidUser(){
        $db = new PDO('mysql:host=127.0.0.1;dbname=authentication','root','');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $query = "SELECT* FROM authentication WHERE status = 1";
        $statement = $db->prepare($query);	
        $result = $statement->execute();
	    if($result > 0)
        {
            $row = $statement->fetch(1);
            
            return json_encode($row); 
        }
        else
            return 0;
    }
    
    public function CheckFingerInfo(int $id){      
        $db = new PDO('mysql:host=127.0.0.1;dbname=authentication','root','');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $query = "SELECT* FROM authentication WHERE id = :id";
        $statement = $db->prepare($query);	
        $statement->bindvalue('id', $id);
        $result = $statement->execute();
	    if($result > 0)
        {
            $row = $statement->fetch(1);
	        if($row['Fingerprint_data'] == NULL)
            {
                return false;
            }
            else
                return true;
        }
        else
        return false;
    }
    
    public function CheckCmd(){  
        $db = new PDO('mysql:host=127.0.0.1;dbname=authentication','root','');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $query = "SELECT* FROM command WHERE num = 1";
        $statement = $db->prepare($query);	
        $result = $statement->execute();
	    if($result > 0)
        {
            $row = $statement->fetch(1);
	        if($row['cmd'] == 0)
            {
                return true;
            }
            else
                return false;
        }
        else
        return false;
    }
    
     public function deleteLastEntry(int $id){
        $db = new PDO('mysql:host=127.0.0.1;dbname=authentication','root','');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $query = 'DELETE FROM authentication WHERE id = :id';
        $statement = $db->prepare($query);
        $statement->bindvalue('id', $id);
        $statement->execute();
     }

   public function setInfo(int $id, string $name,  int $position){
		$this->E_name = $name;
		$this->position = $position;
		$this->id = $id;

	    $db = new PDO('mysql:host=127.0.0.1;dbname=authentication','root','');
		$query = 'INSERT INTO authentication (id, name, position) VALUES(:id, :name, :position)';
		$statement = $db->prepare($query);

		$params = [
			'id' => $this->id,
			'name' => $this->E_name,
           		'position'    => $this->position
			 ];
		$result = $statement->execute($params);

	}
    
    public function SetCmd($cmd){
        $db = new PDO('mysql:host=127.0.0.1;dbname=authentication','root','');
	    $query = 'UPDATE command SET cmd= :cmd WHERE num = 1';
		$statement = $db->prepare($query);
        $statement->bindvalue('cmd', $cmd);
		$result = $statement->execute(); 
    }
} 
?>
