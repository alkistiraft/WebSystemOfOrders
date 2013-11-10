<?php
	require_once("header.php");
  require_once("connectdb.php");
  
$query = mysql_query("SELECT * FROM PROIONTA WHERE ID='".$_GET['id']."' ;");


echo '<h4 style="text-decoration:underline; color:#009999; margin-top:8px;">Διόρθωση προιόντος </h4>';
$row = mysql_fetch_array($query);
$cat = $row["CATEGORY"];

echo '<div style="position:relative; margin-top:-18px;">';
echo '<form  action="save_edited_proionta.php" method="post">';
echo '<input style="margin-left:2px;" type="hidden" name="id" value="'.$_GET['id'].'" /><br>';
echo 'Προιόν:<input type="text" style="margin-left:33px;margin-top:4px;color:#606060;" name="proion" value="'.$row['TITLE'].'" /><br>' ;
echo 'Περιγραφή:<input type="text" style="margin-left:5px;margin-top:4px;color:#606060;" name="description" value="'.$row['DESCRIPTION'].'" /><br>' ;
echo 'Τιμή:<input type="text" style="margin-left:57px;margin-top:4px;color:#606060;" name="price" value="'.$row['PRICE'].'" /><br>' ;


$result = mysql_query("SELECT * FROM CATEGORY;");

echo 'Κατηγορία:<select name= "category" style="margin-left:6px;margin-top:4px;">' ;
while($row = mysql_fetch_array($result))
{
	if ($row["ID"] == $cat) {
		echo "<option selected value='".$row["ID"]."'>" .$row["TITLE"]. "</option>";
	} else {
		echo "<option value='".$row["ID"]."'>" .$row["TITLE"]. "</option>";
	}
   
}
echo '</select><br>' ;

echo '<input type="submit" style="margin-top:10px;" value="Αποθήκευση" />';
echo '</form>';
echo '</div>';
	require_once("footer.php");
	
?>
