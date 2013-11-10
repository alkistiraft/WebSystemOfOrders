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
  if($(document.idiotites.idiotita).val().trim() == "")
    {
      alert("Εισάγετε Ιδιότητα ");
      return false;
    }
}

</script>

</head>
<body>
     <h4 style="text-decoration:underline; color:#009999;"> Πρόσθεσε νέα ιδιότητα</h4>
     <form name="idiotites" action="save_idiotites.php" method="post" onsubmit="return validateForm()">
           Ιδιότητα : <input style="width:150px;"  type="text" name="idiotita"> 
           <input  type="submit" value="Πρόσθήκη">
           
     </form>
</body>
</html>

<?php
require_once("footer.php");
?>
