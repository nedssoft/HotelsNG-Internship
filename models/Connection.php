<?php

/**
* the database connection class
*@var $db_name
*@var $db_password
*@var $db_host
*@var $db_name
*@var $connection
*/
class Connection
{    private $db_username;
     private $db_password;
     private $db_host;
     protected $db_name;
     /**
     * for connecting to the database
     */
     protected $connection;

	
	function __construct(Array $config)
	{    
		$this->db_username = $config['db_username'];
		$this->db_password = $config['db_password'];
		$this->db_host     = $config['db_host'];
		$this->db_name     = $config['db_name'];

        $this->connection = new mysqli($this->db_host, $this->db_username,$this->db_password);
		
	}

}




