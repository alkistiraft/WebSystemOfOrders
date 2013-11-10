<?php
require_once("connectdb.php");

$result2 = mysql_query("INSERT INTO YLIKA(NAME,PRICE) VALUES('".$_POST['uliko']."', '".$_POST['price']."');");
if(!$result2)
{
  die("INVALID".mysql_error()); 
}

header( 'Location: /test/list_ulika.php' );
?>
