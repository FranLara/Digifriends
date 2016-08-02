<?php
require_once "./database/mysql_connection.php";

define ("QUERY_INSERT_SEARCH", "INSERT INTO user_number_request (uid, number, date_request) VALUES (");

class Search {
	
	public function __construct($uid, $number){
		$result = null;
		
		$connection = new MySQL_Connection();
		$recordSearch = $connection->executeQuery(
				QUERY_INSERT_SEARCH . $uid .", " . $number . ", " . time() . ")");
		
	}
	
}