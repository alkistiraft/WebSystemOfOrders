<?php
	require_once("connectdb.php");
	require_once("header_mobile.php");
	
session_start();
$query = mysql_query("SELECT * FROM USERS WHERE USERNAME LIKE '".$_SESSION['username']."';");
$row = mysql_fetch_array($query);

$query2 = mysql_query("SELECT * FROM ORDERS WHERE USER_ID=".$row['ID']." ORDER BY DATE DESC;");


echo '<table border="1" id="user_orders">';
echo '<thead>';

echo '<tr>';

echo '<td> Ημερομηνία </td>';
echo '<td> Προιόντα </td>';
echo '<td> Κόστος </td>';
echo '</tr>';

echo '</thead>';

while($row2 = mysql_fetch_array($query2))
{
	echo '<tr>';
    echo '<td>';
     echo $row2['DATE'];
    echo '</td>';
    
    $query3= mysql_query("SELECT * FROM ORDER_PROIONTA,PROIONTA WHERE ORDER_PROIONTA.ORDER_ID= ".$row2['ID']." AND PROIONTA.ID= ORDER_PROIONTA.PROION_ID; ");
	
		$proionta = "<ul>"; 
		$totCost = 0;
		while($row3 = mysql_fetch_array($query3))
		  {
		     $proionta = $proionta."<li>". $row3['TITLE']."</li>";
			 $totCost += $row3["PRICE"];
		  }
			 $proionta = $proionta."</ul>";
				echo '<td>';
				echo $proionta;
				echo '</td>';
			  
			echo '<td>';

			echo $totCost;
			echo '</td>';   

			echo '</tr>';
	}

?>
</table>
<?php
  require_once("footer_mobile.php");
?>

<script type="text/javascript">
$(document).ready(function() {
	$("#user_orders").dataTable();
});
</script>

