<?php
require_once("connectdb.php");

mysql_query("UPDATE PROIONTA SET CATEGORY = -1 WHERE CATEGORY = ".$_GET['id'].";");


$result = mysql_query("DELETE FROM CATEGORY WHERE ID = ".$_GET['id']." ; " );
if(!$result)
{
  die("INVALID".mysql_error()); 

}  else echo "deleted successfully";
header( 'Location: /test/list_category.php' );
?>

