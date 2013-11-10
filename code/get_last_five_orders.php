<?php
require_once("connectdb.php");

$query = mysql_query("SELECT * FROM `ORDERS`ORDER BY ID DESC LIMIT 0 , 5");

while ($row=mysql_fetch_array($query)) {
	$query2 = mysql_query("SELECT * FROM USERS WHERE ID=".$row["USER_ID"].";");
	 $row2=mysql_fetch_array($query2);

        echo $row2["USERNAME"].",";
	$query3 = mysql_query("SELECT ORDER_PROIONTA.*, PROIONTA.PRICE, PROIONTA.TITLE FROM `ORDER_PROIONTA` , PROIONTA WHERE ORDER_PROIONTA.ORDER_ID =".$row["ID"]." AND PROIONTA.ID = ORDER_PROIONTA.PROION_ID");



	while($row3=mysql_fetch_array($query3)) 
	{
	 
		echo $row3["TITLE"].",".($row3["PRICE"]*$row3["POSOTITA"]).",";
		$queryYlika = mysql_query("SELECT * FROM ORDER_PROIONTA_YLIKA WHERE ORDER_PROION_ID=".$row3["ID"].";");
		
		while($rowYlika=mysql_fetch_array($queryYlika)) 
		{
			$queryYliko = mysql_query("SELECT * FROM YLIKA WHERE ID=".$rowYlika["YLIKA_ID"].";");
			$rowYliko = mysql_fetch_array($queryYliko);
			echo "Υλικό:".$rowYliko["NAME"].",".($rowYliko["PRICE"]*$row3["POSOTITA"]).",";
		}

	}
	echo "\n";
}


?>
