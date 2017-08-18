<?php  
 require 'Connection.php';

 /**
 * This class is used for all interactions to the database
 */
 class Model extends Connection
 {
 	
 	function __construct(Array $config)
 	{
 		Parent::__construct($config);
 		/**
 		*creating the database hng
 		*/
 		 $this->createDB();
 		 /**
 		 *Creating the contacts table
 		 */
         $this->createContactTable();
 	}
    /**
    *this function creates the database
    * @return boolean true
    */
 	public function  createDB()
 	{
 		
 		$sql = "CREATE DATABASE IF NOT EXISTS ".$this->db_name;
 		
 		if ($this->connection->connect_error)
 		{
 			die('unable to connect to database'. $this->connection->error);
 		}

 		$result = $this->connection->query($sql);

 		if ( !$result)
 		{
 			echo 'unable to create database'.$this->connection->error;
 		}
 	}
    /**
    *this function creates the contacts table
    * @return boolean true
    */
 	public function createContactTable()
 	{
 		$sql = "CREATE TABLE IF NOT EXISTS `contacts`(
 		`id` INT NOT NULL AUTO_INCREMENT,
         `name` VARCHAR(100) NOT NULL,
         `email` VARCHAR(100) NOT NULL UNIQUE,
         `phone` VARCHAR(15) NOT NULL UNIQUE,
         PRIMARY KEY(id)
 		)";

 		$this->connection->select_db($this->db_name);

 		if ($this->connection->connect_error)
 		{
 			die('unable to connect to database'.$this->connection->error);
 		}

 		$result = $this->connection->query($sql);

 		if ( ! $result)
 		{
 			echo 'unable to create table'.$this->connection->error;
 		}

 	}
    /**
    *this function fetches all the contacts stored in the database
    * @return boolean true
    */
 	public function fetchAllContacts()
 	{   $data = array();
 		$sql = "SELECT * FROM `contacts`";
 		$this->connection->select_db($this->db_name);

 		if ($this->connection->connect_error)
 		{
 			die('unable to connect to database'.$this->connection->error);
 		}

 		$result = $this->connection->query($sql);

 		if ( ! $result)
 		{
 			echo 'unable to create table'.$this->connection->error;
 		}

 		while($row = $result->fetch_assoc()){

          $data[] = $row;
 		}
 		return $data;

 	}


 }


 

 

