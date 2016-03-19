<?php
session_start();
$DB_HOST = 'localhost'; 
$DB_NAME = 'LoL_database'; 
$DB_USER = 'root'; 
$DB_PASSWORD = 'password';
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
		<link type="text/css" rel="stylesheet" href="matches.css"/>
		<title>336 League Of Legends Database - Admin Page</title>
	</head>
	<body background = "http://i.imgur.com/N2UQfZf.jpg">
		<div id="navbar">
			<ul>
				<li><a href="matches.php">Matches</a></li>
				<li><a href="champions.php">Champions</a></li>
				<li><a href="items.php">Items</a></li>
				<li><a href="users.php">Users</a></li>
			</ul>
		</div>
		<h1>Matches</h1>
			<table class="center">
		        <thead>
		            <tr>
		                <th>MID</th>
		                <th>Kills</th>
		                <th>Deaths</th>
		                <th>Assists</th>
		                <th>Champion</th>
		                <th>Item 1</th>
		                <th>Item 2</th>
		                <th>Item 3</th>
		                <th>Item 4</th>
		                <th>Item 5</th>
		                <th>Item 6</th>
		            </tr>
		        </thead>
		        <tbody>
		        	<?php
		        		$sql = "SELECT s.sid, s.sname, m.mid, p.kills,p.deaths,p.assists, c.champ_name, i1.item_name as item1, i2.item_name as item2, i3.item_name as item3, i4.item_name as item4,i5.item_name as item5,i6.item_name as item6 
		        		FROM summoner AS S, champions AS C, matches AS M, items AS i1, items AS i2,items AS i3,items AS i4,items AS i5,items AS i6, plays AS p 
		        		WHERE s.sid = " .$pid ." and s.sid = p.sid and i1.iid = p.iid_1 and i2.iid = p.iid_2 and i3.iid = p.iid_3 and i4.iid = p.iid_4 and i5.iid = p.iid_5 and i6.iid = p.iid_6 and p.cid = c.cid and p.mid = m.mid";
						$result = renderFree($con,$sql);
						while($row = mysqli_fetch_assoc($result)) {
							$mid = $row['mid'];
							echo "<tr>\n";
							echo "<td><a href='matchinfo.php?mid=".$mid."'>" . $mid . "</a></td>\n";
							echo "<td>" . $row['kills'] . "</td>\n";
							echo "<td>" . $row['deaths'] . "</td>\n";
							echo "<td>" . $row['assists'] . "</td>\n";
							echo "<td>" . $row['champ_name'] . "</td>\n";
							echo "<td>" . $row['item1'] . "</td>\n";
							echo "<td>" . $row['item2'] . "</td>\n";
							echo "<td>" . $row['item3'] . "</td>\n";
							echo "<td>" . $row['item4'] . "</td>\n";
							echo "<td>" . $row['item5'] . "</td>\n";
							echo "<td>" . $row['item6'] . "</td>\n";
							echo "</tr>\n";
						}
					?>
		        </tbody>
	    </table>
	</body>        	

</html>