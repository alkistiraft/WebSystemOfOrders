<style>
h4 
{
	border:0; 
margin:6px; 
padding:0;
color:#404040 ;
text-decoration:underline;
font-size:17px;
	}
ol li
{
	color:#404040 ;
	
	}	
	
</style>

<?php
require_once("connectdb.php");
require_once("header.php");

echo '<h4>Αναζήτηση προϊόντων</h4>';
echo '<div style="position:relative;top:-8px;left:-14px;">';
echo '<ol>';
echo '<form action="statistics_proionta.php" method="GET">';
echo '<li>Με τις περισσότερες πωλήσεις</li><input type="text" name="x" />';

echo '<input type="submit" value = "submit"/>';
echo '</form>';
echo '<form action="statistics_proionta_2.php" method="GET">';
echo '<li>Με τις λιγότερες πωλήσεις</li> <input type="text" name="y" />';
echo '<input type="submit" value = "submit"/>';
echo '</form>';
echo '</ol>';
echo '</div>';

$map = array();

$query = mysql_query("SELECT * FROM ORDERS ORDER BY DATE ASC;");

while($row = mysql_fetch_array($query))
{
  $date = date("W/Y", strtotime($row['DATE']));
  $orderId=$row["ID"];
  $query2 = mysql_query("SELECT * FROM ORDER_PROIONTA,PROIONTA WHERE ORDER_PROIONTA.ORDER_ID=".$orderId." AND ORDER_PROIONTA.PROION_ID = PROIONTA.ID;" );

  $sumcost=0; 
  while($row2 = mysql_fetch_array($query2))
  {  

     $sumcost += $row2['POSOTITA'] * $row2['PRICE'];
  
  }
  if(array_key_exists($date, $map)) 
  {
	$map[$date] = $map[$date] + $sumcost;
  } else {
	$map[$date] = $sumcost;
}
}

?>

<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
<?php
	$datesStr = "[";
	$moneyStr = "[";
	$count2 == 0;
	foreach ($map as $key=>$value) {
		$count2++;
		$datesStr = $datesStr.'"'.$key.'",';
		$moneyStr = $moneyStr.''.$value.',';			
	}
	trim($datesStr, ",");
	trim($moneyStr, ",");
	$datesStr = $datesStr."]";
	$moneyStr = $moneyStr."]";
	//echo $datesStr;
	//echo "<br><br>".$moneyStr;
?>

<?php
require_once("footer.php");
?>
<script type="text/javascript">


        $(function () {
		
        $('#container').highcharts({
            chart: {
                type: 'line',
                marginRight: 130,
                marginBottom: 25
            },
            title: {
                text: 'Τζίρος',
                x: -20 //center
            },
            subtitle: {
                text: 'Άλκηστη',
                x: -20
            },
            xAxis: {
                categories: <?php echo $datesStr;?>
            },
            yAxis: {
                title: {
                    text: 'Tziros (Euro)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: 'E'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
            series: [{
                name: 'Tziros',
                data: <?php echo $moneyStr; ?> 
            }]
        });
    });    
</script>
