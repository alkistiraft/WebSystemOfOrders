<style>
	#ulika-table
	{
		margin-left:5px;
		margin-top:7px;
        width:40%;
        
	
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;

border-collapse:collapse;
}
#ulika-table td, #ulika-tablethead 
{
font-size:1em;
border:1px solid #98bf21;
padding:3px 7px 2px 7px;
}
#ulika-table thead 
{
font-size:1.1em;
text-align:left;
padding-top:5px;
padding-bottom:4px;
background-color:#339999;
color:#ffffff;
}


buttonImage{
	top:-5px;
	}
	
	</style>



<?php
	require_once("header.php");
      	require_once("connectdb.php");
      	
      	$result = mysql_query("SELECT * FROM YLIKA");
      	
      	
      	echo '<table id="ulika-table" border="1">';
			echo '<thead>';
			echo '<tr>';
			   echo '<td style="background-color:#009999;width:7px;text-align:center;">Υλικά</td>';
			   echo '<td style="background-color:#009999;width:7px;text-align:center;">Τιμή</td>';
			   echo '<td style="background-color:#009999;width:7px;text-align:center;">Ενέργειες</td>';
			echo '</tr>';
			echo '</thead>';
      	
      	
      	while($row = mysql_fetch_array($result))
      	{
		    echo '<tbody>';
			echo '<tr>';
			echo '<td style="width:7px;text-align:center;color:#606060;">'.$row["NAME"].'</td>';
			echo '<td style="text-align:center;width:7px;color:#606060;">'.$row['PRICE'].'</td>';
			echo '<td style="width:7px;text-align:center;"><a href="delete_ulika.php?id='.$row['ID'].'">delete</a>&nbsp;&nbsp;<a href="edit_ulika.php?id='.$row['ID'].'  ">edit</a></td>';
			echo '</tr>';
			echo '</tbody>';
			
			
			}
			
			echo '</table>';
			
			
			
			
			require_once("footer.php");
?>


