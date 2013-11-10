
<?php
   require_once("connectdb.php");
   require_once("header.php");
?>
<html>
<head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    
	<style>
	body{
font-family:Arial, Verdana;
font-size:12px;

}
p, h1, form
{
border:0; 
margin:0; 
padding:0;
color:#339999;
}
.spacer
{
clear:both; 
height:10px;
}

/* ----------- My Form ----------- */
.myform{
margin:0 auto;
width:400px;
padding:14px;
}

/* ----------- stylized ----------- */
#stylized{
border:solid 10px #b7ddf2;
background:#ebf4fb;



}
#stylized h1 {
font-size:15px;
font-weight:bold;
margin-bottom:8px;
text-decoration:underline
}
#stylized p{
font-size:11px;
color:#666666;
margin-bottom:20px;
border-bottom:solid 1px #b7ddf2;
padding-bottom:10px;
}
#stylized label{
display:block;
font-weight:bold;
text-align:right;
width:140px;
float:left;
}
#stylized .small{
color:#666666;
display:block;
font-size:11px;
font-weight:normal;
text-align:right;
width:140px;
}
#stylized input{
float:left;
font-size:12px;
padding:4px 2px;
border:solid 1px #aacfe4;
width:200px;
margin:2px 0 20px 10px;
}

#stylized .submit{
	
clear:both;
margin-left:250px;
width:125px;
height:31px;
background:#339999;
text-align:right;
line-height:31px;
color:#FFFFFF;
font-size:12px;
font-weight:bold;
}
#stylized .foto{
	display:block;
	}
	
	</style>       

	
	
<script>
function validateForm()
{
if($(document.users.username).val().trim() == "")
  {
  alert("Username must be filled out");
  return false;
  }
if($(document.users.password).val().trim() == "")
  {
  alert("Password must be filled out");
  return false;
  }
if($(document.users.fname).val().trim() == "")
  {
  alert("Firstname must be filled out");
  return false;
  }
if($(document.users.lname).val().trim() == "")
  {
  alert("Lastname must be filled out");
  return false;
  }

}
</script>   


</head>

<body>

     <div id="stylized" class="myform">

<form id="form" name="users" action="save_user.php" method="post" onsubmit="return validateForm()" enctype="multipart/form-data" >
   <h1> Εγγραφή Χρήστη </h1>   
      <label>Username
        <span class="small">Προσθέστε το username του χρήστη</span>
      </label>
      <input type="text" name="username" id="username"> 
      
      <label>Password  
        <span class="small">Προσθέστε τον κωδικό πρόσβασης</span>
      </label>
       <input type="text" name="password" id="password"> 
      
      <label>Όνομα
        <span class="small">Προσθέστε το όνομα του χρήστη</span>
      </label>  
      <input type="text" name="fname" id="fname"> 
         
      <label>Επώνυμο
        <span class="small">Προσθέστε το επώνυμο του χρήστη</span>
      </label>
      <input type="text" name="lname" id="lname">
      
      <label for="permission">Διαχειριστής
        <span class="small">Προσθέστε τα δικαιώματα του χρήστη</span>
      </label>
      <div style="width:500px;height:5px;">
      <input type="checkbox" name="permission" id="permission"> 
      </div>
       
      <input type="text" id="bla" style="opacity:0;"/> <br>
      <label for="foto">Φωτογραφία
         <span class="small">Προσθέστε τη φωτογραφία του χρήστη</span>
      </label>
      <input type="file" name="foto" id="foto"/> <br>
      
      
      <input class="submit" type="submit" value="Καταχώρηση χρήστη"/> 
      <div class="spacer"></div>

       
</form>
</div>

     


</body>
</html>



<?php
  require_once("footer.php");
?>
   
