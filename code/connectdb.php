<?php 

$db_server["host"]="localhost";
$db_server["username"]="alkisti";
$db_server["password"]="1989";
$db_server["database"]="alkisti";

$connection = mysql_connect($db_server["host"],$db_server["username"],$db_server["password"]); 
mysql_select_db($db_server["database"], $connection);

if (!$connection) { 
	die('Could not connect to MySQL: ' . mysql_error()); 
} 
 



?>
