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
	<style type="text/css">
	body table {
		font-size: 35pt;
	}
	</style>
</header>

<body>
	
   <table border="0" align="center" style="width:100%;height:100%">
    <tr style= "background-color:pink;">
        <td height="100"> 

		<div style="position:relative;top:-26px;width=800;height=40;">
        <a href="home.php"><img src="images/logo.png" height="85" style="position:absolute;left:5;top:-7px;z-index:2;"> </a>			
                              <div style="position:absolute;width:100%;text-align:right;top:-7px;">
                                <?php
                               
                                echo '<div style="font-size:40;">';
	                           echo $_SESSION['username'];
	                           echo " | ";
	                           
	                           echo '<input type="button" value="Logout" style="width:120;height:60;font-size:30;" onclick="location=\'logout.php\'"/>';
								echo "</div>";
                                ?>



              </div>
		

                            </div>   
             
              
              
	        </td>
    </tr>
    
    <tr style="background-color:#CCCCCC;">
        <td valign="top" align="center" > 
