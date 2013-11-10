<?php
  require_once("connectdb.php");

$result = mysql_query("DELETE FROM USERS WHERE ID = ".$_GET['id'].";");

if(!$result)
{
  die("INVALID".mysql_error()); 

}  else echo "deleted successfully";


?>

