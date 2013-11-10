<?php
require_once("connectdb.php");


$result = mysql_query("UPDATE IDIOTITES SET NAME='". $_POST['idiotita']."' WHERE ID = '". $_POST['id'] ."';");

if(!$result)
{

 	die("INVALID".mysql_error()); 

}else echo "inserted successfully";

header( 'Location: /test/list_idiotites.php' );
?>
