<html>
<?php
	session_start();
	require_once("checkPrivileges.php");
	$simplePage = false;
	if (checkPrivileges() == -1) {
		   header( 'Location: /test/login-form.php' );
	} else if (checkPrivileges() == 1) {
		$filename = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
		$found = 0;
		foreach ($allowedByWaiter as $value) {
			if (strcmp($filename, $value) == 0) {
				$found = 1;
			}
		}
		if ($found == 0) {
			header( 'Location: /test/waiter_home.php' );
		} else {
			$simplePage = true;
		}
		
		   
	}
?>
<header>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" media="screen" href="css/multiselect.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/jquery.dataTables_themeroller.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/jquery.ui.all.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/highcharts.js"></script>
<script type="text/javascript" src="js/modules/exporting.js"></script>

	<script src="js/ui/jquery-1.9.1.js"></script>
	<script src="js/ui/jquery.ui.core.js"></script>
	<script src="js/ui/jquery.ui.widget.js"></script>
	<script src="js/ui/jquery.ui.datepicker.js"></script>
	<script src="js/ui/jquery.ui.position.js"></script>
	<script src="js/ui/jquery.ui.menu.js"></script>
	<script src="js/ui/jquery.ui.autocomplete.js"></script>
</header>
<body  >
	
   <table border="0" align="center" style="width:900px;height:600px">
    <tr style= "background-color:pink;">
        <td height="40"> 

		<div style="position:relative;top:-26px;width=800;height=40;">
         		<a href="home.php"> <img src="images/logo.png" height="46" style="position:absolute;left:5;top:6;"></a>
         		   			
                              <div style="position:absolute;left:605;top:14;">
                                <?php
	                           echo $_SESSION['username']." | ";
	                           echo '<input type="button" value="Logout" onclick="location=\'logout.php\'"/>';
	
                                ?>



              </div>
		

                            </div>   
             
              
              
	        </td>
    </tr>
    <?php
		if (!$simplePage) { //an den einai waiter
    ?>
    <tr style="background-color:pink;">
	<td style="height:20px;">
		
		<?php require_once("menu.php"); ?>
	</td>
    </tr>
    <?php
		}
    ?>
    
    <tr style="background-color:#CCCCCC;">
        <td valign="top" align="center"> 

      
