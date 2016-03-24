<?php
session_start();
$DB_HOST = 'localhost'; 
$DB_NAME = 'LoL_database'; 
$DB_USER = 'csuser'; 
$DB_PASSWORD = 'cs443367';
$pid = $_SESSION['pid'];

$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASSWORD,$DB_NAME);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

function renderFree($con,$sql) {
	$result = mysqli_query($con, $sql);
	return $result;
}
?>
<!DOCTYPE html>
<head>
	<script type='text/javascript'>
	<!--
	function popup(mylink, windowname) {
		if (! window.focus) return true;
		var href;
		if (typeof(mylink) == 'string') {
			href=mylink;
		}
		else {
			href=mylink.href;
		}
		window.open(href, windowname, 'width=600,height=400,scrollbars=yes');
		return false;
	}
	//-->
	</script>
	<link type="text/css" rel="stylesheet" href="insertinfo.css"/>
	<title>336 League Of Legends Database - Admin Page</title>
</head>
<body background ="http://i.imgur.com/N2UQfZf.jpg">
	<div id="navbar">
		<ul>
			<?php
				echo "<li><a href=\"matches_".$_SESSION['type'].".php\">Matches</a></li>\n";
			?>
			<li><a href="champions.php">Champions</a></li>
			<li><a href="items.php">Items</a></li>
			<?php
				if ($_SESSION['type']!='free') {
					echo "<li><a href=\"users.php\">Users</a></li>\n";
				}
			?>
			<li><a href="../signin.html">Log Out</a></li>
		</ul>
	</div>
	<div id="reflinks">
		<a href="items.php" onClick="return popup(this, 'items')">Items</a>
		<a href="champions.php" onClick="return popup(this, 'champions')">Champions</a>
	</div>
	<div id="preinfo">
		<form id "preinfo" action ="plays.php" method="post" accept-charset='UTF-8'>
			<label for='mid' >Match ID:</label><br>
			<input type='text' name='mid' id='mid'placeholder="Match ID"/><br>

			<label for='baron1' >Team 1 Baron Kills:</label><br>
			<input type='text' name='baron1' id='baron1'   placeholder="Team 1 Baron Kills"/><br>

			<label for='baron2' >Team 2 Baron Kills:</label><br>
			<input type='text' name='baron2' id='baron2'  placeholder="Team 2 Baron Kills"/><br>

			<label for='gold1' >Team 1 Gold:</label><br>
			<input type='text' name='gold1' id='gold1'  placeholder="Team 1 Gold"/><br>

			<label for='gold2' >Team 2 Gold:</label><br>
			<input type='text' name='gold2' id='gold2'  placeholder="Team 2 Gold"/><br>

			<label for='turret1' >Team 1 Turret Kills:</label><br>
			<input type='text' name='turret1' id='turret1'  placeholder="Team 1 Turret Kills"/><br>

			<label for='turret2' >Team 2 Turret Kills:</label><br>
			<input type='text' name='turret2' id='turret2'  placeholder="Team 1 Turret Kills"/><br>

			<label for='time' >Game Duration:</label><br>
			<input type='text' name='time' id='time'  placeholder="Game Duration"/><br>

			<label for='kills1' >Team 1 Kills:</label><br>
			<input type='text' name='kills1' id='kills1'  placeholder="Team 1 Kills"/><br>

			<label for='kills2' >Team 2 Kills:</label><br>
			<input type='text' name='kills2' id='kills2'  placeholder="Team 2 Kills"/><br>


			<label for='time' >Final Score:</label><br>
			<input type='text' name='time' id='time'  placeholder="Final Score"/><br>
			<a class href="champions.php">Champions </a>
			<a class href="items.php">- Items</a>
			<br>

			<div id="wrapper">
				<input id="button" type="submit" name="Submit" value="Next">
			</div>

			
		</div>
	</body>
</html>