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
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="template.css"/>
		<title>336 League Of Legends Database</title>
	</head>
	<body background = "http://i.imgur.com/N2UQfZf.jpg">
		
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
		<h1>Champions</h1><br>
			<table class="center">
		        <thead>
		            <tr>
		            	<td>Champion ID</td>
		                <td>Champion Name</td>
		                <td>Title</td>
		            </tr>
		        </thead>
		        <tbody>
		        	<?php
		        		$sql = "SELECT * from champions";
		        		$result = renderFree($con,$sql);
		        		while($row = mysqli_fetch_assoc($result)) {
							echo "<tr>\n";
							echo "<td>" . $row['cid'] . "</td>\n";
							echo "<td>" . $row['champ_name'] . "</td>\n";
							echo "<td>" . $row['title'] . "</td>\n";
							echo "</tr>\n";
						}
					?>
					<tr>
						<td colspan="3">
							<a href="insertchamp.php">Insert</a>
						</td>
					</tr>
		        </tbody>
		    </table>
	</body>        	

</html>