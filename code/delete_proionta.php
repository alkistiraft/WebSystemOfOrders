<?php
require_once("connectdb.php");

 $result = mysql_query("UPDATE PROIONTA SET ACTIVE=0 WHERE ID = ".$_GET['id'].";");
 

if(!$result)
{
  die("INVALID".mysql_error()); 

}  else echo "deleted successfully";

header( 'Location: /test/list_proionta.php' );
?>




