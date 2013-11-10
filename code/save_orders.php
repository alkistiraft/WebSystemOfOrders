<?php
require_once("connectdb.php");

session_start();
$numOfProionta = $_POST["numOfProionta"];
$query = mysql_query("SELECT * FROM USERS WHERE USERNAME LIKE '".$_SESSION['username']."';");
$row = mysql_fetch_array($query);
$totCost = 0;
$proiontaNames = "";
for ($index = 1; $index <= $numOfProionta; $index = $index + 1) {
	if (!isset($_POST["proion_".$index])) {
		continue;
	}
	$queryProionta =  mysql_query("SELECT * FROM PROIONTA WHERE ID=".$_POST['proion_'.$index].";");
	$row2 = mysql_fetch_array($queryProionta);
	$totCost += $row2["PRICE"]*$_POST['posotita_'.$index];		
	$proiontaNames = $proiontaNames.",".$row2["TITLE"];
	
	foreach ($_POST["ulika_".$index] as $uliko) {
	
		$resultYlika = mysql_query("SELECT * FROM YLIKA WHERE ID=".$uliko.";");
		$rowYlika = mysql_fetch_array($resultYlika);
		$totCost += $rowYlika["PRICE"]*$_POST['posotita_'.$index];
		
	}
	
}

$result = mysql_query("INSERT INTO ORDERS (USER_ID,TOTAL_COST,PROIONTA) VALUES(".$row['ID'].", ".$totCost.", '".$proiontaNames."');");
echo "INSERT INTO ORDERS (USER_ID,TOTAL_COST,PROIONTA) VALUES(".$row['ID'].", ".$totCost.", '".$proiontaNames."');<br>";


$orderId = mysql_insert_id();
echo "inserted? " . $orderId;

for ($index = 1; $index <= $numOfProionta; $index = $index + 1) {
	if (!isset($_POST["proion_".$index])) {
		continue;
	}
	$result1 = mysql_query("INSERT INTO ORDER_PROIONTA (ORDER_ID,PROION_ID,POSOTITA) VALUES(".$orderId.",".$_POST['proion_'.$index].",".$_POST['posotita_'.$index].");");

	$order_proion_id = mysql_insert_id();
	echo "inserted2? ".$order_proion_id;


	foreach ($_POST["ulika_".$index] as $uliko) {
	
		$result2 = mysql_query("INSERT INTO ORDER_PROIONTA_YLIKA(ORDER_PROION_ID,YLIKA_ID) VALUES(".$order_proion_id.", ".$uliko.");");
		mysql_query($query);
	}

	foreach ($_POST["idiotites_".$index] as $idiotita) {
	
		$result2 = mysql_query("INSERT INTO ORDER_PROIONTA_IDIOTITES(ORDER_PROION_ID,IDIOTITA_ID) VALUES(".$order_proion_id.", ".$idiotita.");");
		mysql_query($query);
	}

}

header( 'Location: /test/add_order.php' );
?>
