<style>
	#order-table
	{
		margin-left:5px;
		margin-top:7px;
        width:40%;
        
	
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
   require_once("connectdb.php");
   require_once("header_mobile.php");

   echo '<h4 style="text-decoration:underline;color:#009999; margin-top:4px;">Νέα παραγγελία</h4>';

   echo '<form name="orders" action="save_orders.php" method="POST" onsubmit="return validateForm()">';
   echo '<input type="hidden" name="numOfProionta" value="1" id="numOfProionta_"/>';
   $query = mysql_query("SELECT * FROM CATEGORY WHERE ID!=-1;");   
   
   echo '<table id="order-table"  border="1">' ;
   echo '<thead>';
   echo '<tr>';
	echo '<td>Κατηγορία</td>';   
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
   echo '<select name=category_1 id="category_" class="required" onchange="updateProionta(this,1);">';
         while($row = mysql_fetch_array($query))
	      {
            echo '<option value="'.$row["ID"].'"> '. $row["TITLE"] .' </option>';
           }
     echo '</select>';
   echo '</td>';
 
 //proionta ana dimofilia  
  
  $query2 = mysql_query("SELECT TITLE, PROIONTA.ID , count( * ) FROM PROIONTA LEFT JOIN ORDER_PROIONTA ON ACTIVE=1 AND ORDER_PROIONTA.PROION_ID=PROIONTA.ID GROUP BY ID ORDER BY count( *) DESC;");
   
   echo '<td valign="top">';
   echo '<select name="proion_1" id="proion_1" class="required" onchange="updateYlikaIdiotites(this, 1);">';   
         while($row2 = mysql_fetch_array($query2))
	      {
            echo '<option value="'.$row2["ID"].'"> '. $row2["TITLE"] .' </option>';
           } 
     echo '</select>';
   echo '</td>';
   
   echo '<td>';
   $query = mysql_query("SELECT * FROM YLIKA;");         
     echo "<select id='multi-ulika_1' name='ulika_1[]' multiple='multiple' class='required'>";   
         while($row = mysql_fetch_array($query))
	       {
             echo '<option value="'.$row["ID"].'"> '. $row["NAME"] .' </option>';
           }
     echo '</select >';
   echo '</td>';

    echo '<td>';
    $query = mysql_query("SELECT * FROM IDIOTITES;");         
     echo "<select id='multi-idiotites_1' name='idiotites_1[]' multiple='multiple' class='required'>";   
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
    
     echo '</td>';
    echo '<td valign="top"> <input type="button" id="delete_" value="delete" onclick="remove_row(this);"/> </td>';
     
     
     echo '</tr>';
     echo '</tbody>';
     echo '</table>';
     
     //pinakas me proionta pou antistoixoun se ka8e katigoria
     
     echo '<table style="display:none;">';
        $query = mysql_query("SELECT * FROM CATEGORY;"); 
     while($row = mysql_fetch_array($query))
      {  echo '<tr>';
		  echo '<td id="Category'.$row['ID'].'">';
		  
		   $query2 = mysql_query("SELECT A1.TITLE, A1.ID , count( * ) FROM (SELECT * FROM PROIONTA WHERE CATEGORY=".$row['ID']." AND ACTIVE=1) as A1 LEFT JOIN ORDER_PROIONTA ON ORDER_PROIONTA.PROION_ID=A1.ID  GROUP BY A1.ID ORDER BY count( * ) DESC;");
		   
	      while($row2 = mysql_fetch_array($query2))
	      {
			  echo $row2['TITLE'].",".$row2['ID'].",";  
           }
		  
		  echo '</td>';
		  echo '</tr>';
	    
 }
     echo '</table>';
     
     
     //pinakas me ulika pou antistoixoun se ka8e proion
     
     echo '<table style="display:none;">';
        $query = mysql_query("SELECT * FROM PROIONTA;"); 
     while($row = mysql_fetch_array($query))
      {
		  echo '<tr>';
		  echo '<td id="p'.$row['ID'].'">';
		   $query2 = mysql_query("SELECT * FROM YLIKA,PROION_YLIKO WHERE PROION_YLIKO.PROION=".$row['ID']." AND PROION_YLIKO.YLIKO=YLIKA.ID;"); 
	  
	      while($row2 = mysql_fetch_array($query2))
	      {
			  echo $row2['NAME'].",".$row2['ID'].",";  
           }
		  
		  echo '</td>';
		  echo '</tr>';
	    
 }
     echo '</table>';
     
 //pinakas me idiotites pou antistoixoun se ka8e proion
    
     echo '<table style="display: none;">';
        $query = mysql_query("SELECT * FROM PROIONTA;"); 
     while($row = mysql_fetch_array($query))
      {
		  echo '<tr>';
		  echo '<td id="pi'.$row['ID'].'">';
		   $query2 = mysql_query("SELECT * FROM IDIOTITES,PROION_IDIOTITA WHERE PROION_IDIOTITA.PROION=".$row['ID']." AND PROION_IDIOTITA.IDIOTITA=IDIOTITES.ID;"); 
	  
	      while($row2 = mysql_fetch_array($query2))
	      {
			  echo $row2['NAME'].",".$row2['ID'].",";  
           }
		  
		  echo '</td>';
		  echo '</tr>';
	    
 }
     echo '</table>';
     
     
echo '<input type="submit" value="Αποθήκευση παραγγελίας">';
echo '<input type="button" value="Νέο προϊόν" onclick="new_order();"/>';


     echo '</form>';

require_once("footer_mobile.php");
?>

<script type="text/javascript">


var numOfProion = 1;
function new_order(){
	numOfProion++;
	$("#numOfProionta_").val(numOfProion);
	var elCategory = $("#category_").clone();
	elCategory.attr("name", "category_" + numOfProion);
	elCategory.attr("onchange", "updateProionta(this, " + numOfProion + ")");
	elCategory.attr("id", "category_" + numOfProion);
	var elProion = $("#proion_1").clone();
	elProion.attr("name", "proion_" + numOfProion);
	elProion.attr("id", "proion_" + numOfProion); 
	elProion.attr("onchange", "updateYlikaIdiotites(this, " + numOfProion + ")");
	var elIlika = $("#multi-ulika_1").clone();
	elIlika.removeAttr("style");
	elIlika.attr("name", "ulika_" + numOfProion +"[]");
	elIlika.attr("id", "multi-ulika_" + numOfProion); 
	var elIidiotites = $("#multi-idiotites_1").clone();
	elIidiotites.removeAttr("style");
	elIidiotites.attr("name", "idiotites_" + numOfProion +"[]");
	elIidiotites.attr("id", "multi-idiotites_" + numOfProion);
	var elPosotita = $("#posotita_").clone();
	elPosotita.attr("name", "posotita_" + numOfProion);
	var elAction = $("#delete_").clone();
	
	$("#orders_body").append("<tr><td id='o_" + numOfProion + "_1'></td><td id='o_" + numOfProion + "_2'></td><td id='o_" + numOfProion + "_3'></td><td id='o_" + numOfProion + "_4'></td><td id='o_" + numOfProion + "_5'></td><td id='o_" + numOfProion + "_6'></td></tr>");
	$("#o_" + numOfProion + "_1").append(elCategory);
	$("#o_" + numOfProion + "_2").append(elProion);
	$("#o_" + numOfProion + "_3").append(elIlika);
	$("#o_" + numOfProion + "_4").append(elIidiotites);
	$("#o_" + numOfProion + "_5").append(elPosotita);
	$("#o_" + numOfProion + "_6").append(elAction);
	updateProionta(document.getElementById("category_" + numOfProion), numOfProion);
	//var el = $("#row_order").clone().appendTo("#orders_body");
}

function remove_row(delBut) {
	$(delBut).closest('tr').remove();
}

function updateProionta(e, rowId)
{
	
	var selectEl = $("#proion_" + rowId);
	
	 var id = e.options[e.selectedIndex].value;
	 selectEl.empty();
	 var proionta = $("#Category" + id).html().split(",");
	 for (var index = 0; index < proionta.length; index+=2) {
			var proion = proionta[index];
			var proionId = proionta[index + 1];
			selectEl.append('<option value="' + proionId + '">' + proion + '</option>');
			
	}
	
	updateYlikaIdiotites(document.getElementById("proion_" + rowId), rowId);


}
function updateYlikaIdiotites(e, rowId)
{
	
	var selectEl = $("#multi-ulika_" + rowId);
	
	 var id = e.options[e.selectedIndex].value;
	 selectEl.empty();
	 var ilika = $("#p" + id).html().split(",");
	 for (var index = 0; index < ilika.length; index+=2) {
			var iliko = ilika[index];
			var ilikoId = ilika[index + 1];
			selectEl.append('<option value="' + ilikoId + '">' + iliko + '</option>');
			
	}
	
	var selectIdiot = $("#multi-idiotites_" + rowId);
	
	 selectIdiot.empty();
	 var idiotites = $("#pi" + id).html().split(",");
	 for (var index = 0; index < idiotites.length; index+=2) {
			var idiotita = idiotites[index];
			var idiotitaId = idiotites[index + 1];
			selectIdiot.append('<option value="' + idiotitaId + '">' + idiotita + '</option>');
		}
	
	
}




$(document).ready(function() {
	updateProionta(document.getElementById("category_"), 1);
});

</script>
