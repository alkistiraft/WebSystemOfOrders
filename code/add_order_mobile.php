<style>
	#order-table
	{
		margin-left:5px;
		margin-top:7px;
		
        
       
      font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
      border-collapse:collapse;
}
#order-table td, #order-table thead 
{
font-size:1em;
border:1px solid #98bf21;
padding:3px 7px 2px 7px;
}
#order-table thead 
{
font-size:1.1em;
text-align:left;
padding-top:5px;
padding-bottom:4px;
background-color:#339999;
color:#ffffff;

}

</style>

<?php

$map = array();



   require_once("connectdb.php");
   require_once("header_mobile.php");

   echo '<h4 style="text-decoration:underline;color:#009999; margin-top:4px;margin-left:0px;">Νέα παραγγελία</h4>';

   echo '<form name="orders" action="save_orders.php" method="POST" onsubmit="return validateForm()">';
   echo '<input type="hidden" name="numOfProionta" value="1" id="numOfProionta_"/>';
   $query = mysql_query("SELECT * FROM PROIONTA;"); 
    
   
   while($row = mysql_fetch_array($query))
   {
	  $query2 = mysql_query("SELECT * FROM YLIKA,PROION_YLIKO WHERE PROION_YLIKO.PROION=".$row['ID']." AND PROION_YLIKO.YLIKO=YLIKA.ID;"); 
	  
	  while($row2 = mysql_fetch_array($query2))
	  {
	     if (array_key_exists($row['TITLE'], $map))
	     {
		   $map[$row['TITLE']] = $map[$row['TITLE']] + $row2['NAME'];	 
	     
	     }else{
			     $map[$row['TITLE']] = $row2['NAME'];
			 }
	  }
   }      
    
   
   echo '<table id="order-table"  border="1">' ;
   echo '<thead>';
   echo '<tr>';
echo '<td>Προϊόν</td>';
echo '<td>Υλικά</td>';
echo '<td>Ιδιότητες</td>';
echo '<td>#</td>';
echo '<td></td>';

   echo '</tr>';
   echo '</thead>';
   echo '<tbody id="orders_body">';
   echo '<tr id ="row_order">';
   echo '<td valign="top">';
   echo '<select name="proion_1" id="proion_" class="required" onchange="updateYlika();">';   
         while($row = mysql_fetch_array($query))
	     {
            echo '<option value="'.$row["ID"].'"> '. $row["TITLE"] .' </option>';
         
		 }
     echo '</select>';
   echo '</td>'; 
   
   echo '<td>';
   $query = mysql_query("SELECT * FROM YLIKA;");         
     echo "<select id='multi-ulika' name='ulika_1[]' multiple='multiple' class='required'>";   
         while($row = mysql_fetch_array($query))
	   {
             echo '<option value="'.$row["ID"].'"> '. $row["NAME"] .' </option>';
           }
     echo '</select >';
   echo '</td>';
   
   
	

    echo '<td>';
    $query = mysql_query("SELECT * FROM IDIOTITES;");         
     echo "<select id='multi-idiotites' name='idiotites_1[]' multiple='multiple' class='required'>";   
         while($row = mysql_fetch_array($query))
	   {
             echo '<option value="'.$row["ID"].'"> '. $row["NAME"] .' </option>';
           }
     echo '</select>';
     echo '</td>';

     echo '<td valign="top">';

     echo '<select id="posotita_" name="posotita_1"/>';
       for($i=1; $i<=10; $i++)
       {
		   echo '<option value="'.$i.'" >'.$i.' </option>';
	   }
     echo '</select>';
     echo '</td>';
    echo '<td valign="top"> <input type="button" id="delete_" value="delete" onclick="remove_row(this);"/> </td>';
     
     
     echo '</tr>';
     echo '</tbody>';
     echo '</table>';
     
echo '<input type="submit" style="margin-left:0px;" value="Αποθήκευση παραγγελίας">';
echo '<input type="button" style="margin-left:0px;" value="Νέο προϊόν" onclick="new_order();"/>';


     echo '</form>';



 require_once("footer_mobile.php");
 
?>
<script src="js/multiselect.js" type="text/javascript"></script>
<script type="text/javascript">
try {
$('#multi-idiotites').multiSelect();
$('#multi-ulika').multiSelect();
} catch(e) {alert(e);}

var numOfProion = 1;
function new_order(){
	numOfProion++;
	$("#numOfProionta_").val(numOfProion);
	var elProion = $("#proion_").clone();
	elProion.attr("name", "proion_" + numOfProion)
	var elIlika = $("#multi-ulika").clone();
	elIlika.removeAttr("style");
	elIlika.attr("name", "ulika_" + numOfProion +"[]");
	var elIidiotites = $("#multi-idiotites").clone();
	elIidiotites.removeAttr("style");
	elIidiotites.attr("name", "idiotites_" + numOfProion +"[]");
	var elPosotita = $("#posotita_").clone();
	elPosotita.attr("name", "posotita_" + numOfProion)
	var elAction = $("#delete_").clone();
	
	$("#orders_body").append("<tr><td id='o_" + numOfProion + "_1'></td><td id='o_" + numOfProion + "_2'></td><td id='o_" + numOfProion + "_3'></td><td id='o_" + numOfProion + "_4'></td><td id='o_" + numOfProion + "_5'></td></tr>");
	$("#o_" + numOfProion + "_1").append(elProion);
	$("#o_" + numOfProion + "_2").append(elIlika);
	$("#o_" + numOfProion + "_3").append(elIidiotites);
	$("#o_" + numOfProion + "_4").append(elPosotita);
	$("#o_" + numOfProion + "_5").append(elAction);
	//var el = $("#row_order").clone().appendTo("#orders_body");
}

function updateYlika()
{
	
	 $('#multi-ulika').remove();
	 
	 $('#multi-ulika').append('<option value="'.$row2["ID"].'"> '. $row2["NAME"] .' </option>');	 
					 	  	 
     
 
}

function remove_row(delBut) {
	$(delBut).closest('tr').remove();
}


function validateForm()
{
  if(document.orders.posotita_1.value== "")
    {
      alert("Συμπληρώστε την ποσότητα");
      return false;
    }
  if(document.getElementByID("proion_").value == "")
   {
      alert("proion must be filled out");
      return false;
    }
}




</script>
