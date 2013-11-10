<?php
	require_once("header.php");
      	require_once("connectdb.php");
?>
<form name="proionta" action = "save_proionta.php" method = "POST" onsubmit="return validateForm()" >

<h4 style="text-decoration:underline;">Νέο προϊόν</h4>
<table border="0" >
<tr>
<td><label for="prion_" style="" >Προιόν :</label></td><td> <input style="" id="prion_" type = "text" name="proion" / ></td>
</tr><tr>
<td><label for="description_">Περιγραφή :</label></td><td> <input style=""  id='description_' type = "text" name= "description"/></td>
</tr><tr>
<td><label for="price_" style="">Τιμή:</label></td><td> <input style="" id='price_' type = "text" name="price" /></td>
</tr><tr>
<td><label for="category_" style=""> Κατηγορία :</label></td><td>


<?php
	$result = mysql_query("SELECT * FROM CATEGORY;");
	echo "<select id='category_' name='category'>";
	while ($row = mysql_fetch_array($result)) {
		echo "<option value='".$row["ID"]."'>".$row["TITLE"]."</option>";
	}
	echo "</select>";
echo "</td></tr>";
echo "</table>";

	$result = mysql_query("SELECT * FROM IDIOTITES;");
	echo '<h4 style="text-decoration:underline;color:#009999;"> Ιδιότητες </h4>';
	echo "<select id='multi-idiotites' name='idiotites[]' multiple='multiple'>";
	while ($row = mysql_fetch_array($result)) {
		echo "<option value='".$row["ID"]."'>".$row["NAME"]."</option>";
	}
	echo "</select>";
	
	echo '<h4 style="text-decoration:underline;color:#009999;">Υλικά</h4>';
	$result = mysql_query("SELECT * FROM YLIKA;");
	echo "<select id='multi-ilika' name='ilika[]' multiple='multiple'>";
	while ($row = mysql_fetch_array($result)) {
		echo "<option value='".$row["ID"]."'>".$row["NAME"]."</option>";
	}
	echo "</select>";

?>
<input  type="submit" value="Προσθήκη"/>

<?php
	require_once("footer.php");
?>
 <script src="js/multiselect.js" type="text/javascript"></script>
<script type="text/javascript">
try {
$('#multi-idiotites').multiSelect();
$('#multi-ilika').multiSelect();
$('#ms-multi-idiotites').css({"width": "367px"});
$('#ms-multi-ilika').css({"width": "367px"});
} catch(e) {alert(e);}



function validateForm()
{
  if($(document.proionta.proion).val().trim() == "")
    {
      alert("proion must be filled out");
      return false;
    }
  if($(document.proionta.description).val().trim() == "")
    {
      alert("description must be filled out");
      return false;
    }
  if($(document.proionta.price).value().trim() == "")
    {
      alert("price must be filled out");
      return false;
    }
}


</script>


