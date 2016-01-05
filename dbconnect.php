<?php
// dbconnect.php - Logon to MySQl and connect to the BCS350 database
// Written by:  Serhiy Kony, December 2015

//Connect to the database
$db = new mysqli('localhost','username','password','KnowledgeBase');
//Check and display an error if there was a problem while connecting
	if ($db->connect_errno){
    	printf("Connect failed: %s\n", $db->connect_error);
    		if (!$db->query("SET a=1")) {
    			printf("Error message: %s\n", $mysqli->error);
    	exit();
	}
}
?>