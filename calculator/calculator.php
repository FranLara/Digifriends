<?php
require_once "./database/mysql_connection.php";

define ("QUERY_CHECK", "SELECT digifriends FROM number_digifriends WHERE number = ");

class Calculator {
	
	public function getDigifriends($number){
		$result = null;
		
		$connection = new MySQL_Connection();
		$numberCheck = $connection->selectQuery(QUERY_CHECK . $number);
		
		if(!empty($numberCheck)){
			while ($obj = $numberCheck->fetch_object()) {
	        	$result = explode(",", $obj->digifriends);
	   		}
		}
		
		return $result;
	}
	
}