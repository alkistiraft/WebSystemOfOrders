<style>
	#idiotites-table
	{
		margin-left:7px;
		margin-top:7px;
		width:30%;
	
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;

border-collapse:collapse;
}
#idiotites-table td, #idiotites-table thead 
{
font-size:1em;
border:1px solid #98bf21;
padding:3px 7px 2px 7px;
}
#idiotites-table thead 
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
      	
      	$result = mysql_query("SELECT * FROM IDIOTITES");
      	
     
      	
      	echo '<table id="idiotites-table" border="1">';
			echo '<thead>';
			echo '<tr>';
			   echo '<td style="background-color:#009999;">Ιδιότητες</td>';
			   echo '<td style="background-color:#009999;">Ενέργειες</td>';
			echo '</tr>';
			echo '</thead>';
      	
      	
      	while($row = mysql_fetch_array($result))
      	{
			
				
		    echo '<tbody>';
			echo '<tr>';
			echo '<td style="color:#606060  ;">'.$row["NAME"].'</td>';
			echo '<td><a href="delete_idiotites.php?id='.$row['ID'].'">delete</a>&nbsp;&nbsp;<a href="edit_idiotites.php?id='.$row['ID'].'  ">edit</a></td>';
			echo '</tr>';
			echo '</tbody>';
			
			
			}
			
			echo '</table>';
			
			
			require_once("footer.php");
?>
	
     


