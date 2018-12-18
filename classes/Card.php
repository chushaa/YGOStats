<?php

include_once 'dbconfig.php';

class Card extends DbConfig
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function getData($query)
	{
		$result = $this->connection->query($query);
		
		if ($result == false)
		{
			return false;
		}
		
		$rows = array();
		
		while ($row = $result -> fetch_assoc())
		{
			$rows[] = $row;
		}
		return $rows;
	}
	
	public function execute($query)
	{
		$result = $this->connection->query($query);
		
		if ($result == false)
		{
			echo 'Error: Cannot execute the command<br>';
			return false;
		}else{
			return true;
		}
	}
	public function escape_string($value)
	{
		return $this->connection->real_escape_string($value);
	}
	
	public function return_rows($result)
	{	
		$rowCount  = mysqli_num_rows($result);
		return $rowCount;
	}
	
	public function delete($id, $table)
	{
		$query = "DELETE FROM $table WHERE id = $id";
		
		if($result == false) {
			echo 'Error: cannot delete id ' . $id . ' from table ' . $table;
			return false;
		} else {
			return true;
		}
	}
}

?>