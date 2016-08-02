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
		
		$lastValue = 0;
		
		for ($i = 1; $i<=$number; $i++){
			
			switch ($i){
				case (1):
					$lastValue += $number*2;
					echo $lastValue . " ";
					break;
					
				case (2):
					$lastValue = $lastValue/$i;
					echo $lastValue . " ";
					break;
				
				case (($i+1)%4 == 0):
					$multiple = ($i+1)/4;
					$lastValue += (8*$multiple);
					echo $lastValue . " ";
					break;
				
				case (($i%4 == 0) || (($i+2)%4 == 0)):
					$lastValue -= 6;
					echo $lastValue . " ";
					break;
					
				case (($i-1)%4 == 0):
					$lastValue -= 4;
					echo $lastValue . " ";
					break;
				
			}
			
		}
		
		return $result;
	}
	
}