<?php
session_start();
define('DB_HOST', 'localhost'); 
define('DB_NAME', 'LoL_database'); 
#replace 'mysql' with name of database you want to use
define('DB_USER', 'csuser'); 
define('DB_PASSWORD','cs443367');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

function SignIn() { 
    //starting the session for user profile page 
	$_SESSION['user'] = $_POST['user'];
	$_SESSION['password'] = $_POST['pass'];
	$sqlquery = sprintf("SELECT * FROM summoner where sname = '%s' AND password = '%s'", 
		mysql_real_escape_string($_SESSION['user']), 
		mysql_real_escape_string($_SESSION['password']));
	$result = mysql_query($sqlquery); 
	if($row = mysql_fetch_array($result)) {
		$_SESSION['type'] = $row['accType'];
		$_SESSION['pid'] = $row['sid'];
		if ($_SESSION['type']=='free'){
			header('Location: ' . "matches_free.php");
		}
		if ($_SESSION['type']=='adv') {
			header('Location: ' . "matches_adv.php");
		}
		if ($_SESSION['type'] == 'admin') {
			header('Location: ' . "matches_admin.php");
		}
	}
	else {
		header('Location: ' . "../signin.html");
	}  
} 

if(isset($_POST['submit'])) 
	{ SignIn(); 
	} 
?>
