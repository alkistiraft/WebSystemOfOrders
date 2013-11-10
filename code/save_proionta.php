<?php
require_once("connectdb.php");

$result = mysql_query("SELECT * FROM PROIONTA WHERE TITLE LIKE '".$_POST['proion'] ."';");
$idiotites= $_POST["idiotites"];
$ilika = $_POST["ilika"];

//if(mysql_num_rows($result) == 0)
//{

$query = "INSERT INTO PROIONTA(TITLE,DESCRIPTION,PRICE,CATEGORY,ACTIVE) VALUES('".$_POST['proion']."' , '".$_POST['description']."','".$_POST['price']."',".$_POST['category'].",1 );";
echo $query."<br><br>";
   $result2 = mysql_query($query);
$proionId = mysql_insert_id();



foreach ($idiotites as $idiotita) {
	echo $idiotita;
	echo '<br>';
	$query = "INSERT INTO PROION_IDIOTITA(PROION,IDIOTITA) VALUES(".$proionId." , ".$idiotita." );";
	mysql_query($query);
}

foreach ($ilika as $iliko) {
	$query = "INSERT INTO PROION_YLIKO(PROION,YLIKO) VALUES(".$proionId." , ".$iliko." );";
	mysql_query($query);
}
 
//        if(!$result2)
//	{
//	  die("INVALID".mysql_error()); 
//	}

//}else echo 'Τhis product exists' ;

header( 'Location: /test/list_proionta.php' );

?>


