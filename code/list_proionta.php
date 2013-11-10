<style>

	
.category
{
	color:#0000FF;
text-decoration:underline;
padding: 6px 6px 3px 8px;
}

.proionta-table
	{
		margin-left:5px;
		margin-top:0px;
        width:40%;
        
	
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;

border-collapse:collapse;
}
.proionta-table td, .proionta-table thead 
{
font-size:1em;
border:1px solid #98bf21;
padding:3px 7px 2px 7px;
}
.proionta-table thead 
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
	require_once("header.php");
      	require_once("connectdb.php");

 $result = mysql_query("SELECT * FROM CATEGORY ");
 


while($result2 = mysql_fetch_array($result))
{
  echo '<div style="position:relative;top:-1px;left:10px;">';
  echo "<h4 class='category'>".$result2['TITLE']."</h4>";
  echo '</div>';
$query = mysql_query("SELECT * FROM PROIONTA WHERE CATEGORY= ".$result2['ID']." AND ACTIVE=1;");

echo '<table class="proionta-table" border="1" style="width:80%;">';
echo '<thead>';
echo '<tr>';
   echo '<td style="background-color:#009999;">Προιόντα</td>';
   echo '<td style="background-color:#009999;">Ιδιότητες</td>';
   echo '<td style="background-color:#009999;">Υλικά</td>';
   echo '<td style="background-color:#009999;">Ενέργειες</td>';
echo '</tr>';
echo '</thead>';
if (mysql_num_rows($query) > 0) {
	while($row = mysql_fetch_array($query))
	{
		echo '<tbody>';
		echo '<tr>';
		echo '<td style="color:#606060  ;">'.$row['TITLE'].'</td>';
		
		echo '<td>';
		$query2 = mysql_query("SELECT * FROM IDIOTITES,PROION_IDIOTITA WHERE PROION_IDIOTITA.PROION=".$row['ID']." AND IDIOTITES.ID=PROION_IDIOTITA.IDIOTITA;");
		echo '<ul style="color:#606060;">' ;
		while($row2= mysql_fetch_array($query2))
		 {
			echo '<li>';
			echo $row2["NAME"];
			echo '</li>';
		 }
		 echo '</ul>';
		 echo '</td>';
		 
		 echo '<td style="color:#606060;">' ;
		$query3 = mysql_query("SELECT * FROM YLIKA,PROION_YLIKO WHERE PROION_YLIKO.PROION=".$row['ID']." AND YLIKA.ID=PROION_YLIKO.YLIKO;");
		echo '<ul style="color:#606060;">' ;
		
		while($row3= mysql_fetch_array($query3))
		 {
			echo '<li>';
			echo $row3["NAME"];
			echo '</li>';
		 }
		 echo '</ul>';
		 echo '</td>';
		
		echo '<td><a href="delete_proionta.php?id='.$row['ID'].'">delete</a>&nbsp;&nbsp;<a href="edit_proionta.php?id='.$row['ID'].'  ">edit</a></td>';
		echo '</tr>';
		echo '</tbody>';
	}
	} else {
		echo "<tr><td colspan='4'>Δεν υπάρχουν προϊόντα</td></tr>";
	}
	echo '</table>';
}





require_once("footer.php");
?>


