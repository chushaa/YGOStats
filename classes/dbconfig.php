<?php

class DbConfig
{
	private $_host         = '192.254.236.163';
	private $_user         = 'rcunitti_master';
	private $_pass         = 'V$Ja}Cak';
	private $_database	   = 'rcunitti_FinalProject';
	
	protected $connection;
	
	public function __construct()
	{
		if(!isset($this->connection))
		{
			$this->connection = new mysqli($this->_host,
										  $this->_user,
										  $this->_pass,
										  $this->_database);
			
			if(!$this->connection)
			{
				echo 'Cannot connect to the database server';
				exit;
			}
		}
		return $this->connection;
	}
}
?>