<?php
require_once("connectdb.php");
require_once("header.php");

$num_proionta = $_GET["x"];
$query = mysql_query("SELECT * , count(*) FROM `ORDER_PROIONTA` GROUP BY PROION_ID ORDER BY count( * ) DESC LIMIT 0 ,".$num_proionta.";");

echo '<h4 style="text-decoration:underline; margin-top:5px;">Προιόντα με τις περισσότερες πωλήσεις</h4>';
echo '<ul>';
while($row = mysql_fetch_array($query))
{
  $proion = mysql_query("SELECT TITLE FROM PROIONTA WHERE ID = ".$row["PROION_ID"]." ;");
  $row2 = mysql_fetch_array($proion);
  echo '<li>'. $row2["TITLE"] .' με '.$row["count(*)"].' πωλήσεις</li>';
     
}
echo '</ul>';


require_once("footer.php");
?>
