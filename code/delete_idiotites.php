<?php
require_once("connectdb.php");

$result = mysql_query("SELECT * FROM ORDER_PROIONTA_IDIOTITES WHERE IDIOTITA_ID=".$_GET['id'].";");
if (mysql_num_rows($result) > 0) {
	require_once("header.php");
	echo "Η συγκεκριμένη ιδιότητα έχει χρησιμοποιηθεί σε παραγγελεία και δεν μπορεί να διαγραφεί.";
	require_once("footer.php");
} else {

	mysql_query("DELETE FROM PROION_IDIOTITA WHERE IDIOTITA = ".$_GET['id'].";");


	$result = mysql_query("DELETE FROM IDIOTITES WHERE ID = ".$_GET['id']." ; " );
	if(!$result)
	{
	  die("INVALID".mysql_error()); 

	}  else {
		 echo "deleted successfully";
		 header( 'Location: /test/list_idiotites.php' );
	 }
}
?>

