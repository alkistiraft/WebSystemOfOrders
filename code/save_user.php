<?php
require_once("connectdb.php");

session_start();
$username = $_POST["username"];

$result = mysql_query("SELECT * FROM USERS WHERE USERNAME LIKE '" . $_POST['username']. "';"); 
$user_id = -1;
if(mysql_num_rows($result) == 0)
{
  if(isset($_POST["permission"]) )
   {
	$result2 = mysql_query("INSERT INTO USERS (USERNAME,PASSWORD,NAME,SURNAME,PERMISSIONS) VALUES ('".$username."', '".$_POST['password']."', '".$_POST  ['fname']. "', '".$_POST['lname']."', 1);");
  }else
     {
	$result2 = mysql_query("INSERT INTO USERS (USERNAME,PASSWORD,NAME,SURNAME,PERMISSIONS) VALUES ('".$username."', '".$_POST['password']."', '".$_POST  ['fname']. "', '".$_POST['lname']."', 0);");
     }

if (!$result2) 
   {
     die("INVALID ".mysql_error());
   } else {
	   $user_id = mysql_insert_id();
	require_once("upload_photo.php");   
	header( 'Location: /test/list_users.php' );
   }

}else echo 'This user exists!';








?>



