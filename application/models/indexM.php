<?php 

class IndexM extends Db{
	
	public function __construct() {
      try {
      	parent::__construct();
      } 
	  
	  catch(PDOException $e) {
        echo $e->getMessage();
      }
	  //return $this->dbh;
    }
	
	public function insertUser($first_name,$last_name,$fbID,$location,$gender,$date) {
      $data = array($first_name,$last_name,$fbID,$location,$gender,$date);
	    
      $sth = $this->dbh->prepare("insert into user (first_name,last_name,fbID,country,gender,admission) values (?, ?,?,?,?,?)");
      $sth->execute($data);

     if ($sth->rowCount() > 0) {
        return $this->dbh->lastInsertId();
      } else {
        return null;
      }
    }
	
	
	public function CheckUserFBID($fbID) {
	
		$sth = $this->dbh->query("SELECT * FROM user WHERE fbID=".$fbID." LIMIT 1");
     	$sth->setFetchMode(PDO::FETCH_CLASS, 'Users');
		
	   $objects = array();

      while($obj = $sth->fetch()) {
        $objects[] = $obj;
      }

      if (count($objects) > 0) {
        //return $objects[0];
		return $objects;
      } else {
        return null;
      }
	}
	
}
?>