<?php
	require_once("header.php");
      	require_once("connectdb.php");
?>
<h4 style="text-decoration:underline; color:#009999; margin-top:5px;">Πρόσθεσε νέα κατηγορία </h4>
<form action="save_category.php" name = "categories" method="post" onsubmit="return validateForm();">
           Κατηγορία : <input style="width:150px;" type="text" name="category"> 
           <input type="submit" value="Προσθήκη" >
           
     </form>
     
<?php   	
			require_once("footer.php");
?>

<script>

function validateForm()
{
if($(document.categories.category).val().trim() == "")
  {
  alert("Category must be filled out");
  return false;
  }

}
</script> 
