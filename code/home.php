<style>
	#home-table
	{
		margin-left:5px;
		margin-top:7px;
        width:40%;
        
	
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;

border-collapse:collapse;
}
#home-table td, #home-table thead 
{
font-size:1em;
border:1px solid #339933;
padding:3px 7px 2px 7px;
}
#home-table thead 
{
font-size:1.1em;
text-align:left;
padding-top:5px;
padding-bottom:4px;
background-color:#339999;
color:#ffffff;
}

</style>


<?php

require_once("connectdb.php");
require_once("header.php");


$query = mysql_query("SELECT * FROM `ORDERS`ORDER BY ID DESC LIMIT 0 , 5");


echo '<h4 style="text-decoration:underline;color:#006666; margin-top:10px;">Οι πέντε πιο πρόσφατες παραγγελίες</h4>';
echo '<table border="1" id="home-table" style="margin-top:12px;">';
echo "<thead>";
echo '<tr>';
echo '<td>Username</td>';
echo '<td> Προϊόντα </td>' ;
echo '<td> Κόστος </td>';
echo'</tr>';
echo "</thead>";
echo "<tbody id='ordersTable_body'>";

while($row=mysql_fetch_array($query))
{
    echo '<tr>';
    echo '<td>';
   
    $query2 = mysql_query("SELECT * FROM USERS WHERE ID=".$row["USER_ID"].";");
    $row2=mysql_fetch_array($query2);
    echo $row2["USERNAME"];
    echo '</td>';
 
    echo '<td>';
  
    $query3 = mysql_query("SELECT * FROM `ORDER_PROIONTA`,PROIONTA WHERE ORDER_PROIONTA.ORDER_ID =".$row["ID"]." AND PROIONTA.ID = ORDER_PROIONTA.PROION_ID");

    echo '<ul>' ;
    $priceSum = $row["TOTAL_COST"];
      
      while($row3=mysql_fetch_array($query3)) 
      {
           echo '<li>' ;
           echo $row3["TITLE"]." - ".$row3["PRICE"];
           
           echo '</li>'; 
      }
     echo '</ul>';
 
    echo '</td>';
 
 echo '<td> ';

echo $priceSum."";

echo '</td>';
 echo '</tr>';
}
echo "</tbody>";
echo '</table>';

require_once("footer.php");
?>
<script type="text/javascript">
	function refreshTable() {
		$.ajax({
			url: "get_last_five_orders.php",
			context: "text"
			}).done(function(data) {
			$("#ordersTable_body").find("tr").remove();
			var newOrders = jQuery.trim(data).split("\n");
			for (var index = 0;index<newOrders.length; index++) {
				var values = newOrders[index].split(",");

				var sumCost = 0;
				var proiontaStr = "<ul>";
				for (var index2 = 1; index2<values.length-1; index2++) {
					
					if (index2%2==1) {
						proiontaStr += "<li>" + values[index2]+" - " + values[index2+1] + "</li>";
					} else {
						sumCost+=parseFloat(values[index2]);
					}
				}
				proiontaStr += "</ul>";
				$("#ordersTable_body").append("<tr><td>" + values[0] + "</td><td>" + proiontaStr + "</td><td>" + sumCost + "</td></tr>");
			}

		});
	}
	setInterval(refreshTable, 2000);
</script>


