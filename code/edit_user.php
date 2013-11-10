<?php
 require_once("connectdb.php");
require_once("header.php");


$result = mysql_query("SELECT * FROM USERS WHERE ID = '" .$_GET['id']."';" );
$row = mysql_fetch_array($result);

echo '<form action="save_edited_user.php" method="post" enctype="multipart/form-data" >' ; 
echo ' <input type = "hidden" name = "id" value = "'. $_GET['id'].'" />' ;
echo ' Username : <input type = "text" name= "username" value="'. $row['USERNAME'] .'"  />' ;
echo '<br> Password : <input type = "password" name= "password" value="'. $row['PASSWORD'] .'"  />' ;
echo '<br>Firstname : <input type = "text" name= "fname" value="'. $row['NAME'] .'"  />' ;
echo '</br> Surname: <input type = "text" name= "sname" value="'. $row['SURNAME'] .'"  />'.'</br>' ;
echo '<label for="foto">Φωτογραφία:';
 echo '</label>';
   echo '<input type="file" name="foto" id="foto"/>' .'<br>';
echo '</br> ';
if ($row["PERMISSIONS"] == 0) {
	echo 'Permissions: <input type="checkbox"  name= "permissions"  />' ;
} else {
	echo 'Permissions: <input type="checkbox"  name= "permissions" checked  />' ;
}

echo '<input type="submit" value= "Save"/>' ;
echo '</form>';


require_once("footer.php");
?>
