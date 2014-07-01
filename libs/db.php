<?php

  // http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/

  class Db {
    public $dbh = null;

    public function __construct() {
      try {
        $this->dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_USER, DB_PASS);
      } catch(PDOException $e) {
        echo $e->getMessage();
      }
	  //return $this->dbh;
    }  
	
	public function getDBConnection() {
      return $this->dbh;
    }
	
    public function __destruct() {
      $this->dbh = null;
    }
  }