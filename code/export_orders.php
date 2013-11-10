<?php
   require_once("connectdb.php");
$filters = "";
if (isset($_GET["username"]) && $_GET["username"] != "") {
	$filters = $filters." USERS.USERNAME like '".$_GET["username"]."' and ";
}
if (isset($_GET["date"]) && $_GET["date"] != "") {
	$dateValues = explode("-", $_GET["date"]);
	$filters = $filters." YEAR(ORDERS.DATE) = ".$dateValues[0]." and MONTH(ORDERS.DATE)=".$dateValues[1]." and DAY(ORDERS.DATE)=".$dateValues[2]." and ";
}
if(isset($_GET["proion"]) && $_GET["proion"] != ""){
        $filters = $filters."ORDERS.PROIONTA like  '%". $_GET["proion"]."%' and ";

}
if(isset($_GET["price"]) && $_GET["price"] != ""){
        $timi = explode("-", $_GET["price"]);
        $filters = $filters. 'ORDERS.TOTAL_COST > '.$timi[0].' && ORDERS.TOTAL_COST < '.$timi[1].' and ';

}


$query = mysql_query("SELECT ORDERS.*, USERS.USERNAME FROM ORDERS,USERS WHERE " .$filters. " ORDERS.USER_ID=USERS.ID ;");


$xml = new SimpleXMLElement('<xml/>');
while($row = mysql_fetch_array($query))
{
  $track = $xml->addChild('order');
  $track->addChild('date',$row['DATE']);
  $track->addChild('waiter',$row['USERNAME']);
  
  $proionta = explode(",",$row["PROIONTA"]);
  for($i=1; $i<=count($proionta)-1; $i++)
  {
    $track->addChild('proion',$proionta[$i]);
  }
 $track->addChild('price',$row['TOTAL_COST']);
  
    
}
  
Header('Content-type: text/xml');
print ($xml->asXML());

?>
