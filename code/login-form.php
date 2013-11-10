<?php
	require_once("checkPrivileges.php");
	session_start();
	if (isset($_SESSION["username"])) {
		header( 'Location: /test/home.php' );
	}
?>

<html>
<head>
	
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body bgcolor="pink" style="text-align:center;">

<div style="position:relative;top:-26px;width:100%;height:40;text-align:center;" align="center">
	<?php
	if (isMobileClient()) {
	?>
	<img src="images/logo.png" style="position:relative;top:142;width:400px;"> 	
   <?php
	} else {
   ?>
   <img src="images/logo.png" height="70" style="position:relative;top:142;"> 	
   <?php
	}
   ?>
      <div style="position:relative;top:157;height:40;">
         <?php
		

	if (isMobileClient()) {
		if (isset($_SESSION['username'])) {
			echo "Welcome, ".$_SESSION['username'];
			echo '<form action="logout.php" method="post" >';
			echo '<input type="submit" value="Logout" />';
			echo '</form>';
		} else {
			echo '<form action="welcome.php" method="post">';
		     	echo '<span style="font-size: 50px;">Username:</span> <input type="text" name="username" style="margin-left:23;height:40;"><br>';
		     	echo '<span style="font-size: 50px;">Password:</span> <input type="password" name="pass" style="margin-left:40;height:40;"><br>';
		     	echo '<input type="submit" value="Login" style="width:180px;height:80px;font-size:40px;margin-top:50px;">';
		     	echo '</form>';
		}
	} else {
		if (isset($_SESSION['username'])) {
			echo "Welcome, ".$_SESSION['username'];
			echo '<form action="logout.php" method="post" >';
			echo '<input type="submit" value="Logout" />';
			echo '</form>';
		} else {
			echo '<form action="welcome.php" method="post">';
		     	echo 'Username: <input type="text" name="username" style="margin:3;"><br>';
		     	echo 'Password: <input type="password" name="pass" style="margin:7;"><br>';
		     	echo '<input type="submit" value="Login" >';
		     	echo '</form>';
		}
	}

         ?>


     
</body>
</html>
