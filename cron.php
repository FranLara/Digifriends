<?php

define("EXPIRED_TIME" , time() - (60*60*24*30));
define("QUERY_DELETE_USERS_SEARCHS", "DELETE FROM user_number_request WHERE date_request < " . EXPIRED_TIME);

function cron(){
	
	$connection = new MySQL_Connection();
	$deleteRecords = $connection->executeQuery(QUERY_DELETE_USERS_SEARCHS);
	
}