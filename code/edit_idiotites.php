<?php
require_once("connectdb.php");
require_once("header.php");

$result = mysql_query("SELECT NAME FROM IDIOTITES WHERE ID='" . $_GET['id']. "';");
$row = mysql_fetch_array($result);

echo '<h4 style="text-decoration:underline; color:#009999; margin-top:8px;">Διόρθωση ιδιότητας </h4>';
echo '<form action="save_edited_idiotites.php" method="post">';
echo '<input type="hidden" name="id" value="'.$_GET['id'].'"/>';
echo 'Ιδιότητα:<input type="text" style="width:120px;margin-left:5px;color:#606060;" name="idiotita" value="'.$row['NAME'].'"/>';
echo '<input type="submit" style="margin-left:5px;" value="Αποθήκευση"/>';
echo '</form>';



require_once("footer.php");
?>

