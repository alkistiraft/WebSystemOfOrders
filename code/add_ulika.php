<?php
require_once("connectdb.php");
require_once("header.php");
?>

<html>
<head>
     <meta http-equiv="Content type" content="text/html; charset=UTF-8">
<script>
function validateForm()
{
  if($(document.ulika.uliko).val().trim() == "")
    {
      alert("Συμπληρώστε υλικό");
      return false;
    }
  if($(document.ulika.price).val().trim() == "")
    {
      alert("Συμπληρώστε τιμή");
      return false;
    }

}

</script>
     
</head>
<body>
	<h4 style="text-decoration:underline; color:#006666;"> Πρόσθεσε νέο υλικό</h4>
     <form name="ulika" action="save_ulika.php" method="post" onsubmit="return validateForm()">
      <label for="uliko_" style="margin-left:-21px;">Υλικό :</label><input type="text" name="uliko" id="uliko_" style="margin-left:12px;"> <br>
      Τιμή : <input type="text" name="price" style="margin:10px;"> <br>
      <input type="submit" value="Προσθήκη">
             

     </form>
</body>
</html>


<?php
require_once("footer.php");
?>
