<?php

$host = "localhost";
$dbname = "db_uasku";
$user = "root";
$pass = "";

try{
	$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
}
catch(PDOException $e){
	echo $e->getMessage();
}

?>