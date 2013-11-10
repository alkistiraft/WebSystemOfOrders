<?php
require_once("connectdb.php");


$result3 = mysql_query("SELECT * FROM IDIOTITES WHERE NAME LIKE '" . $_POST['idiotita']. "';");

if(mysql_num_rows($result3) == 0)
{
	$result1 = mysql_query("INSERT INTO IDIOTITES(NAME) VALUES('".$_POST['idiotita']."');");
	if(!$result1)
	{
	  die("INVALID".mysql_error()); 
	}

}else echo "This property exists! <br> " ;

header( 'Location: /test/list_idiotites.php' );


?>
