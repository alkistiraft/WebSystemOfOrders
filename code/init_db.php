<?php
require_once("connectdb.php");

/*for($i=1; $i<20; $i++)
{
 $query = mysql_query("INSERT INTO IDIOTITES (NAME) VALUES('idiotita".$i."');");
 $query = mysql_query("INSERT INTO YLIKA (NAME,PRICE) VALUES('uliko".$i."' , ".rand(0.5,2).");");
 
}*/
/*
for($i=5; $i<30; $i++)
{
$query1 = mysql_query("INSERT INTO PROIONTA (TITLE,DESCRIPTION,PRICE,CATEGORY) VALUES('proion".$i."' , 'proion".$i."' , ".rand(0.5, 8).", 5 );");
$proionId = mysql_insert_id();

   
   
   for($j=1;$j<3; $j++)
   {
	   $query2 = mysql_query("SELECT * FROM IDIOTITES ORDER BY RAND() ;");
   $row2 = mysql_fetch_array($query2);
     $query3 = mysql_query("INSERT INTO PROION_IDIOTITA (PROION,IDIOTITA) VALUES(".$proionId." ,".$row2['ID']." );");  
   }

for($j=1;$j<3; $j++)
   {
	   $query2 = mysql_query("SELECT * FROM YLIKA ORDER BY RAND() ;");
   $row2 = mysql_fetch_array($query2);
     $query3 = mysql_query("INSERT INTO PROION_YLIKO (PROION,YLIKO) VALUES(".$proionId." ,".$row2['ID']." );");  
   }
}
 */



$minDate = strtotime("-2 month");
$maxDate = strtotime("now");




for($i=1; $i<5000; $i++)
{

$randVal = rand($minDate, $maxDate);
$randDate = date ("Y-m-d H:i:s", $randVal);
$query = mysql_query("INSERT INTO ORDERS(USER_ID,DATE) VALUES(1,'".$randDate."');");
$orderId = mysql_insert_id();
$numProionta = rand(1,3);
$totalCost = 0;
$proiontaStr = "";
  for ($j = 1; $j<=$numProionta; $j++) {
	$query2 = mysql_query("SELECT * FROM `PROIONTA` order by RAND() LIMIT 0,1");
	$row = mysql_fetch_array($query2);
	$totalCost = $totalCost + $row["PRICE"];
	$proiontaStr = $proiontaStr.",".$row["TITLE"];
	$query3 = mysql_query("INSERT INTO ORDER_PROIONTA(ORDER_ID,PROION_ID,POSOTITA) VALUES(".$orderId.",".$row["ID"].", 1);");
   }
$query = mysql_query("UPDATE ORDERS SET TOTAL_COST = ".$totalCost.", PROIONTA='".$proiontaStr."' where ID=".$orderId.";");   
   
}


?>
