<?php
   require_once("connectdb.php");
   require_once("header.php");
?>
<style>
	
h4{
text-decoration:underline;	
color:#009999;	
	}
#datatable-users
{
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
width:100%;
border-collapse:collapse;
}
#datatable-users td, #datatable-users thead 
{
font-size:1em;
border:1px solid #98bf21;
padding:3px 7px 2px 7px;
}
#datatable-users thead 
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
#foto td
{
	position:absolute;
	right:50%;
	top:100%;
	float:right;

	
} 
</style>

<?php
$result = mysql_query("SELECT * FROM USERS");

echo "<h4> Χρήστες </h4>" ;

echo '<table id="datatable-users" border="1">' ;
echo "<thead>";
echo '<tr>';
echo '<td> Φωτογραφία </td>';
echo '<td> Όνομα </td>';
echo '<td> Επώνυμο </td>';
echo '<td> Username </td>';
echo'<td> Κωδικός </td>';
echo'<td> Δικαιώματα </td>';
echo'<td> Actions</td>';
echo '</tr>';
echo "</thead>";
echo "<tbody>";
while($row=mysql_fetch_array($result))
{
   
   echo '<tr>';
   echo '<td>';
   if (strcmp($row["FOTO"], "")==0) {
	 echo '<img id="foto" src="images/alkisti.jpeg" height="20">' ;
   } else {
	   echo '<img id="foto" src="'.$row["FOTO"].'" height="20">';
   }
   echo '</td>';
   echo '<td>' .$row['NAME'].  '</td>';
   echo '<td>'. $row['SURNAME']. '</td>';
   echo '<td>' .$row['USERNAME'].  '</td>';
   echo '<td>' .$row['PASSWORD'].  '</td>'; 
   echo '<td>' .$row['PERMISSIONS']. '</td>';
   echo '<td> <a href="delete_user.php?id='.$row['ID'].'">delete </a> | <a href="edit_user.php?id='.$row['ID'].'">edit</a> </td> ';  
   echo '</tr>';
   

}
echo "</tbody>";
  echo '</table>';


require_once("footer.php");
?>

<script type="text/javascript">
$(document).ready(function() {
	$("#datatable-users").dataTable();
});

</script>
