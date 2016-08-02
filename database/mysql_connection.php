<?php

define('URL', 'localhost');
define('USER_DB', 'user_challenge');
define('PASSWORD_DB', 'password_challenge');
define('NAME_DB', 'digifriends_challenge');

class MySQL_Connection {
	
	
	public function selectQuery($query){
		$result = null;
		$database_connection = $this->getDatabaseConnection();
		
		if(!empty($database_connection)){
			$result = $database_connection->query($query);
			
			$this->closeDatabaseConnection($database_connection);
		} else {
			$result = "ERROR: No connection available with database.";
		}
		
		return $result;
	}
	
	private function getDatabaseConnection(){
		$database_connection = mysqli_connect(URL, USER_DB, PASSWORD_DB, NAME_DB);
	
		if($database_connection->connect_errno > 0){
			$database_connection = null;
		}
	
	
		return $database_connection;
	}

	private function closeDatabaseConnection($database_connection){
		mysqli_close($database_connection);
	}
	
}