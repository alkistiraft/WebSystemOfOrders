<?php

  require_once("connectdb.php");
  $query = mysql_query("UPDATE PROIONTA SET TITLE='".$_POST['proion']."' , DESCRIPTION='".$_POST['description']."' , PRICE='".$_POST['price']."' , CATEGORY='".$_POST['category']."' WHERE ID='".$_POST['id']."'; ");

if(!$query)
{
  die("INVALID".mysql_error()); 

}  else echo "inserted successfully";

header( 'Location: /test/list_proionta.php' );
?>

