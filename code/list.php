<?php
   require_once("header.php");

echo '<table border="1" id="table">';
echo "<thead>";
echo '<tr id="row">';
echo '<td id="cell_1"> Cell_1 </td>';
echo '<td id="cell_2"> <input type="button" id="delete_" value="delete" onclick="remove_row(this);"/> </td>' ;
echo'</tr>';
echo "</thead>";
echo '<tbody id="body">';
echo '</tbody>';
echo '</table>';

echo '<input type="text" id="textfield" name="text" onkeyup="set_text();" >';
echo '<input type="button" id="button_" value="OK" onclick="addNewRow();"/>';
echo '<br>';
echo '<input type="button" id="hide" value="hide" onclick="hide_me();" />';
echo '<input type="button" id="show" value="show" onclick="show_me();" />';

echo '<div id="text">  </div>';

echo '<br>';
echo '<br>';


echo '<table border="1" id="table_2" style="width:230px;height:280px"   >';
echo '<tr >'; 
echo '<td>';
 echo '<div id="div_1" style="width:220px;height:30px;background-color:red;"> </div>';
   
echo '</td>';
echo '</tr>';

echo '<tr>'; 
echo '<td>';
 echo '<div id="div_2" style="width:220px;height:30px;background-color:yellow;"> </div>';
     
echo '</td>'; 
echo '</tr>';

echo '<tr>'; 
echo '<td>';
 echo '<div id="div_3" style="width:220px;height:30px;background-color:green;"> </div>';
   
echo '</td>';
echo '</tr>';

echo '<tr>'; 
echo '<td>';
 echo '<div id="div_4" style="width:220px;height:30px;background-color:pink"> </div>';
echo '</td>';
echo '</tr>';

echo '<tr>'; 
echo '<td>';
 echo '<div id="div_5" style="width:220px;height:30px;background-color:orange;"> </div>';
echo '</td>';
echo '</tr>';
echo '</table>';

echo '<input type="button" id="change" value="Hyde-Show" onclick="change_color();">';

require_once("footer.php");
?>

<script type="text/javascript">

function remove_row(delBut)
{
  $(delBut).closest('tr').remove();
}

function set_text()
{
  var alk= $("#textfield").val();
  $("#text").html(alk);
 }

function addNewRow()
{
  //var cell1 = $("#cell_1").clone();
  //var cell2 = $("#cell_2").clone();
  //$("body").append("<tr> <td id="new_cell1" > </td> <td id="new_cell2"> </td>  <tr>");
  //$("#new_cell1").append(cell1);
  //$("#new_cell2").append(cell2);
  
var newrow= $("#row").clone().appendTo("#body");
var con = $("#textfield").val();
  $("#cell_1").html(con);
}

function hide_me()
{
  $("#table").hide();
}

function show_me()
{
  $("#table").show();
}

var pressBut=0;
function change_color()
{
alert("hello");
 pressBut++;

if(pressBut=1){
$("#div_1").hide();
}
else if(pressBut=2)
{
 $("#div_2").hide();
 $("#div_1").show();
}
else if(pressBut=3){
$("#div_3").hide();
$("#div_2").show();
}
else if(pressBut=4){
$("#div_4").hide();
$("#div_3").show();
}
else if(pressBut=5){
$("#div_5").hide();
$("#div_4").show();
}
else (pressBut=6){
$("#div_1").hide();
$("#div_5").show();
pressBut=1;
}

  }

</script>














