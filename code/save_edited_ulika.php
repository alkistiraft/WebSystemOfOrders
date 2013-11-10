<?php
require_once("connectdb.php");

$result = mysql_query("UPDATE YLIKA SET NAME = '".$_POST['uliko']."' WHERE ID='".$_POST['id']."' ; " );
if(!$result)
{
  die("INVALID".mysql_error()); 

}  else echo "inserted successfully";

header( 'Location: /test/list_ulika.php' );
?>


