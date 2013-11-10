<?php
require_once("connectdb.php");
require_once("header.php");
?>
<style>

body{
font-family:Arial, Verdana;
font-size:12px;

}
 #stylized p, h1, form
{
border:0; 
margin:0; 
padding:0;
color:#339999;
}

.spacer
{
clear:both; 
height:2px;

}

/* ----------- My Form ----------- */
.myform{
margin:0 auto;
width:400px;
padding:14px;
}

/* ----------- stylized ----------- */
#stylized{

float:left;

}
#stylized h1 {
font-size:20px;
font-weight:bold;
margin-bottom:8px;
text-decoration:underline
}
#stylized p{
font-size:11px;
color:#666666;
margin-bottom:20px;
border-bottom:solid 1px #b7ddf2;
padding-bottom:10px;
}
#stylized label{
display:block;
font-weight:bold;
text-align:right;
width:140px;
float:left;
}
#stylized .small{
color:#666666;
display:block;
font-size:11px;
font-weight:normal;
text-align:right;
width:140px;
}
#stylized input{
float:left;
font-size:12px;
padding:4px 2px;
border:solid 1px #aacfe4;
width:200px;
margin:2px 0 20px 10px;
}

#stylized .submit{
	
clear:both;
margin-left:250px;
width:77px;
height:31px;
background:#339999;
text-align:right;
line-height:31px;
color:#FFFFFF;
font-size:12px;
font-weight:bold;
}



#orders_table
{
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
width:100%;
border-collapse:collapse;

}
#orders_table td, #orders_table thead 
{
font-size:1em;
border:1px solid #98bf21;
padding:3px 7px 2px 7px;
}
#orders_table thead 
{
font-size:1.1em;
text-align:left;
padding-top:5px;
padding-bottom:4px;
background-color:#339999;
color:#ffffff;
}
#datatable-users tr.alt td 
{
color:#000000;
background-color:#EAF2D3;
}

</style>

<div id="stylized" class="myform">
<form id="form" action="list_orders.php" method="GET"/>
<h1> Φίλτρα αναζήτησης </h1> 

<label>Ημερομηνία
  <span class="small">Εισάγετε την ημερομηνία</span>
</label> 
<input type="text" name="date" id="datepicker" value="<?php echo $_GET["date"];?>"/>

<label>Username
  <span class="small">Εισάγετε το username του χρήστη</span>
</label> 
<input type="text" name="username" value="<?php echo $_GET["username"];?>" /> 




<label>Προιόν
  <span class="small">Εισάγετε προιόν</span>
</label> 
<input type="text" name="proion" id="search" value="<?php echo $_GET["proion"];?>"/>


<label>Τιμή
  <span class="small">Εισάγετε εύρος τιμών</span>
</label> 
<input type="text" name="price" value="<?php echo $_GET["price"];?>"/>


<input type="submit" class="submit" value="Αναζήτηση"/>
<div class="spacer"></div>
</div>
</form> 

<?php
echo '<div style="position:relative;top:273px; left:-425px">';
echo '<a href="export_orders.php?username='.$_GET["username"].'&date='.$_GET["date"].'&proion='.$_GET["proion"].'&price='.$_GET["price"].'">Export orders</a>';
echo '</div>';

$filters = "";
if (isset($_GET["username"]) && $_GET["username"] != "") {
	$filters = $filters." USERS.USERNAME like '".$_GET["username"]."' and ";
}
if (isset($_GET["date"]) && $_GET["date"] != "") {
	$dateValues = explode("/", $_GET["date"]);
	$filters = $filters." YEAR(ORDERS.DATE) = ".$dateValues[2]." and MONTH(ORDERS.DATE)=".$dateValues[0]." and DAY(ORDERS.DATE)=".$dateValues[1]." and ";
}
if(isset($_GET["proion"]) && $_GET["proion"] != ""){
        $filters = $filters."ORDERS.PROIONTA like  '%". $_GET["proion"]."%' and ";

}
if(isset($_GET["price"]) && $_GET["price"] != ""){
        $timi = explode("-", $_GET["price"]);
        $filters = $filters. 'ORDERS.TOTAL_COST >= '.$timi[0].' && ORDERS.TOTAL_COST <= '.$timi[1].' and ';

}
echo '<table  id="orders_table" border="1" style="width:90%">';
echo '<thead>';

echo '<tr>';
echo '<td> Hmerominia </td>';
echo '<td> Serbitoros </td>';
echo '<td> Proion </td>';
echo '<td> Timi </td>';
echo '</tr>';

echo '</thead>';
$startRow = 0;
$numRows = 10;
if (isset($_GET["page"])) {
	$startRow = ($_GET["page"] - 1) * 10;
}
$query = mysql_query("SELECT ORDERS.*, USERS.USERNAME FROM ORDERS,USERS WHERE " .$filters. " ORDERS.USER_ID=USERS.ID LIMIT ".$startRow.",".$numRows.";");
$queryCountRows = mysql_query("SELECT count(*) FROM ORDERS,USERS WHERE " .$filters. " ORDERS.USER_ID=USERS.ID;");
$countRowsResult = mysql_fetch_array($queryCountRows);
$totalRows = $countRowsResult["count(*)"];
$totalPages = round($totalRows / 10, 0, PHP_ROUND_HALF_UP);

while($row = mysql_fetch_array($query))
{
 echo '<tr>';
    echo '<td>';
     echo $row['DATE'];
    echo '</td>';

    echo '<td>';
     echo $row['USERNAME'];
    echo '</td>';
  

   $query2 = mysql_query("SELECT ORDER_PROIONTA.*,PROIONTA.TITLE,PROIONTA.PRICE FROM ORDER_PROIONTA,PROIONTA WHERE ORDER_PROIONTA.ORDER_ID= ".$row['ID']." AND PROIONTA.ID= ORDER_PROIONTA.PROION_ID; ");
   $proionta = "<ul>"; 
   $ulika="(";
   
   
  

while($row2 = mysql_fetch_array($query2))
  {
     
     
     $query3 = mysql_query("SELECT * FROM ORDER_PROIONTA_YLIKA,YLIKA WHERE ORDER_PROIONTA_YLIKA.ORDER_PROION_ID=".$row2['ID']." AND YLIKA.ID=ORDER_PROIONTA_YLIKA.YLIKA_ID;");
	 $query4 = mysql_query("SELECT * FROM ORDER_PROIONTA_IDIOTITES,IDIOTITES WHERE ORDER_PROIONTA_IDIOTITES.ORDER_PROION_ID=".$row2['ID']." AND IDIOTITES.ID=ORDER_PROIONTA_IDIOTITES.IDIOTITA_ID;"); 
		  
		  while($row3 = mysql_fetch_array($query3))
		 {
			 $ulika = $ulika."". $row3['NAME'].","; 
			 
	     }	
	      $idiotites = $ulika;
	      
	      while($row4 = mysql_fetch_array($query4))
	      {
			 
			 $idiotites = $idiotites. "". $row4['NAME'] . ",";
			 
		  } 
	     
	     	 
			 $proionta = $proionta."<li>". $row2['TITLE'].$idiotites.")"."</li>";
			 
	     
  
  }
  
 $proionta = $proionta."</ul>";
    echo '<td>';
    echo $proionta;
    echo $row3['NAME'];
    echo '</td>';
  
echo '<td>';
echo $totalcost;
echo $row["TOTAL_COST"];
echo '</td>';   

echo '</tr>';
  } 
echo '<tbody>';


echo '</tbody>';
echo '</table>';

//Pagenation

echo '<a href="list_orders.php?page=1&date='.$_GET["date"].'&username='.$_GET["username"].'&proion='.$_GET["proion"].'&price='.$_GET["price"].'">First</a> ' ;
if ($startRow > 0) {
	echo '<a href="list_orders.php?page='.($_GET["page"]-1).'&date='.$_GET["date"].'&username='.$_GET["username"].'&proion='.$_GET["proion"].'&price='.$_GET["price"].'">Previous</a> ' ;
}
if (!isset($_GET["page"]) || $_GET["page"] < $totalPages) {
	echo '<a href="list_orders.php?page='.($_GET["page"]+1).'&date='.$_GET["date"].'&username='.$_GET["username"].'&proion='.$_GET["proion"].'&price='.$_GET["price"].'">Next</a> ';
}
echo '<a href="list_orders.php?page='.($totalPages).'&date='.$_GET["date"].'&username='.$_GET["username"].'&proion='.$_GET["proion"].'&price='.$_GET["price"].'">Last</a> ';
require_once("footer.php");
?>

<script type="text/javascript">
$(document).ready(function() {
	$("#orders_table").dataTable();
	$( "#datepicker" ).datepicker({
			showOn: "button",
			buttonImage: "images/calendar.gif",
			buttonImageOnly: true
		});
});
</script>
