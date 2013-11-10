<?php
require_once("connectdb.php");
session_start();
$result = mysql_query("SELECT * FROM USERS WHERE USERNAME LIKE '" . $_POST['username'] . "' AND PASSWORD LIKE '" .$_POST['pass']. "';");
$success = false;
$username = "";
$privilege = 0;
while ($row = mysql_fetch_array($result)) {
	$success = true;
	$username = $row["USERNAME"];
	$privilege = $row["PERMISSIONS"];
}

if ($success) {
	echo $username . " successfully logged in";
	$_SESSION['username'] = $username;
	$_SESSION['privilege'] = $privilege;
	header( 'Location: /test/home.php' );
} else {
	echo "bye bye";
}
?>
<html>
<body>


</body>
</html>
