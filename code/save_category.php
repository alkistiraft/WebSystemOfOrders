<?php

require_once("connectdb.php");

$result3 = mysql_query("SELECT * FROM CATEGORY WHERE TITLE LIKE '" . $_POST['category']. "';");

if(mysql_num_rows($result3) == 0)
{
	$result1 = mysql_query("INSERT INTO CATEGORY(TITLE) VALUES('".$_POST['category']."');");
	if(!$result1)
	{
	  die("INVALID".mysql_error()); 
	}

}else echo "This category exists! <br> " ;

header( 'Location: /test/list_category.php' );
 
?>
