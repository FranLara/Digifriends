<?php
require_once "./database/mysql_connection.php";

define ("QUERY_INSERT_SEARCH", "INSERT INTO user_number_request (uid, number, date_request) VALUES (");
define ("QUERY_COUNT_SEARCHS", "SELECT COUNT(number) number FROM user_number_request WHERE uid = ");

class Search {
	
	private $uid;
	private $number;
	
	public function __construct($uid, $number){
		$this->uid = $uid;
		$this->number = $number;
	}
	
	public function saveSearch(){
		$connection = new MySQL_Connection();
		$recordSearch = $connection->executeQuery(
				QUERY_INSERT_SEARCH . $this->uid .", " . $this->number . ", " . time() . ")");
	}
	
	public function countSearchs(){
		$result = null;
		
		$connection = new MySQL_Connection();
		$countSearch = $connection->executeQuery(
				QUERY_COUNT_SEARCHS . $this->uid ." AND number = " . $this->number);

		if(!empty($countSearch)){
			while ($obj = $countSearch->fetch_object()) {
				$result = $obj->number;
			}
		}

		return $result;
	}
	
	public function isDigifriend($digifriend){
		$isDigifriend = false;
		
		
		
		return $isDigifriend;
	}
}