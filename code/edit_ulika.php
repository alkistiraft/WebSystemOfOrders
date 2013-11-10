<?php
require_once("connectdb.php");
require_once("header.php");

$result = mysql_query("SELECT NAME FROM YLIKA WHERE ID = '" .$_GET['id']."';" );
$row = mysql_fetch_array($result);

echo '<h4 style="text-decoration:underline; color:#009999; margin-top:5px;">Διόρθωση υλικού</h4>';
echo ' <form action = "save_edited_ulika.php" method="post">' ;
echo ' <input type = "hidden" name = "id" value = "'. $_GET['id'].'" />' ;
echo ' Υλικό: <input type = "text" style="width:150px;color:#606060;" name= "uliko" value="'. $row['NAME'] .'"  />' ;
echo ' <input type="submit" value="Αποθήκευση"/> ' ;
echo '</form>' ;



require_once("footer.php");

?>


