<?php
require_once "./database/mysql_connection.php";

define ("QUERY_CHECK", "SELECT digifriends FROM number_digifriends WHERE number = ");
define ("QUERY_INSERT_NUMBER", "INSERT INTO number_digifriends (number, digifriends) VALUES (");

class Calculator {
	
	public function getDigifriends($number){
		$result = null;
		
		$result = $this->getExistingNumber($number);
		
		if(empty($result)){
			$result = $this->calculateDigifriends($number);
		}
		
		return $result;
	}
	
	private function getExistingNumber($number){
		$result = null;
		
		$connection = new MySQL_Connection();
		$numberCheck = $connection->executeQuery(QUERY_CHECK . $number);
		
		if(!empty($numberCheck)){
			while ($obj = $numberCheck->fetch_object()) {
				$result = explode(",", $obj->digifriends);
			}
		}
		
		return $result;
	}
	
	private function calculateDigifriends($number){
		$result = null;
		
		
		
		return $result;
	}
	
}