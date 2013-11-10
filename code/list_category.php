<style>
	#category-table
	{
		margin-left:5px;
		margin-top:7px;
        width:40%;
        
	
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;

border-collapse:collapse;
}
#category-table td, #category-table thead 
{
font-size:1em;
border:1px solid #98bf21;
padding:3px 7px 2px 7px;
}
#category-table thead 
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

   $result2 = mysql_query("SELECT * FROM CATEGORY;" ); 


echo '<table id="category-table" border="1">';
echo '<tr>';
echo '<thead>';
  echo '<td>Κατηγορία</td>';
  echo '<td>Ενέργειες</td>';
echo '</thead>';
echo '</tr>';

while($row = mysql_fetch_array($result2))
 {
	echo '<tbody>';
    echo '<td style="color:#606060;">'.$row["TITLE"].'</td>';  
    echo '<td> <a style="margin-left:25px;" href="delete_category.php?id='.$row['ID'].'">delete</a> &nbsp;&nbsp;<a  href="edit_category.php?id='.$row['ID'].'">edit </a></td>';
    echo '</tbody>';
 }
echo '</table>';
?>


     
<?php
   require_once("footer.php");
      	
?>

