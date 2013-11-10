<?php
  require_once("connectdb.php");

if (empty($_FILES['foto']['name']))
{
	if(isset($_POST["permissions"]) )
	{
		
		$result = mysql_query("UPDATE USERS SET USERNAME='".$_POST['username']."',PASSWORD='".$_POST['password']."', NAME = '".$_POST['fname']."', SURNAME='".$_POST['sname']."',PERMISSIONS=1  WHERE ID='".$_POST['id']."' ; " );
	} 
    else{
		
		$result = mysql_query("UPDATE USERS SET USERNAME='".$_POST['username']."',PASSWORD='".$_POST['password']."', NAME = '".$_POST['fname']."', SURNAME='".$_POST['sname']."',PERMISSIONS=0  WHERE ID='".$_POST['id']."' ; " );
		}
		
}else{
	
	if(isset($_POST["permissions"]) )
	 {
		
		$result = mysql_query("UPDATE USERS SET USERNAME='".$_POST['username']."',PASSWORD='".$_POST['password']."', NAME = '".$_POST['fname']."', SURNAME='".$_POST['sname']."',PERMISSIONS=1  WHERE ID='".$_POST['id']."' ; " );
		$user_id = $_POST['id'];
		require_once("upload_photo.php");
     } 
    else{
		
		$result = mysql_query("UPDATE USERS SET USERNAME='".$_POST['username']."',PASSWORD='".$_POST['password']."', NAME = '".$_POST['fname']."', SURNAME='".$_POST['sname']."',PERMISSIONS=0  WHERE ID='".$_POST['id']."' ; " );
		$user_id = $_POST['id'];
		require_once("upload_photo.php");
	
	
	}
}


if(!$result)
{
  die("INVALID".mysql_error()); 

}  else {
	
	echo "OK";
	header( 'Location: /test/list_users.php' );
	}


?>
