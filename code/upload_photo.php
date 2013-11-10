<?php
echo "included file?" .$_POST["username"];

$allowedExts = array("gif", "jpeg", "jpg", "png", "JPG");
$extension = end(explode(".", $_FILES["foto"]["name"])); //returns the extension the of the uploaded file

if ((($_FILES["foto"]["type"] == "image/gif")// the type of the uploaded file
|| ($_FILES["foto"]["type"] == "image/jpeg")
|| ($_FILES["foto"]["type"] == "image/jpg")
|| ($_FILES["foto"]["type"] == "image/pjpeg")
|| ($_FILES["foto"]["type"] == "image/x-png")
|| ($_FILES["foto"]["type"] == "image/png"))
&& ($_FILES["foto"]["size"] < 2000000)
&& in_array($extension, $allowedExts))//search for $extension in the $allowedExts array
  {
  if ($_FILES["foto"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["foto"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["foto"]["name"] . "<br>";
    echo "Type: " . $_FILES["foto"]["type"] . "<br>";
    echo "Size: " . ($_FILES["foto"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["foto"]["tmp_name"] . "<br>";//the name of the temporary copy of the file stored on the server

    
	
	  copy($_FILES["foto"]["tmp_name"], "photos/".$_FILES["foto"]["name"]);
	  chmod("photos/".$_FILES["foto"]["name"], 0777);
	  echo "Stored in: " . "photos/" . $_FILES["foto"]["name"];
	  mysql_query("UPDATE USERS SET FOTO='photos/".$_FILES["foto"]["name"]."' WHERE ID=".$user_id.";");
	
    }
  }
else
  {
  echo "Invalid file";
  }


?>
