<?php
require_once("connectdb.php");


$result = mysql_query("UPDATE CATEGORY SET TITLE='". $_POST['category']."' WHERE ID = '". $_POST['id'] ."';");

if(!$result)
{

 	die("INVALID".mysql_error()); 

}else echo "inserted successfully";

header( 'Location: /test/list_category.php' );
?>
