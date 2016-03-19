<?php
session_start();
$DB_HOST = 'localhost'; 
$DB_NAME = 'LoL_database'; 
$DB_USER = 'csuser'; 
$DB_PASSWORD = 'cs443367';
$pid = $_SESSION['pid'];
echo "PID: ".$pid."<br>\n";

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
		<link type="text/css" rel="stylesheet" href="matchinfo.css"/>
		<title>336 League Of Legends Database - Admin Page</title>
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
		<table class="center1">
		        <thead>
		            <tr>
		                <th>Summoner Name</th>
		                <th>Kills</th>
		                <th>Deaths</th>
		                <th>Assists</th>
		                <th>Champion</th>
		                <th>Level</th>
		                <th>Item_1</th>
		                <th>Item_2</th>
		                <th>Item_3</th>
		                <th>Item_4</th>
		                <th>Item_5</th>
		                <th>Item_6</th>
		            </tr>
		        </thead>
		        <tbody>
		        	<?php
		        		$mid = $_GET['mid'];
		        		$sql = "SELECT s.sid, p.side, s.sname, m.mid, p.kills,p.deaths,p.assists,p.level, c.champ_name, i1.item_name as item1, i2.item_name as item2, i3.item_name as item3, i4.item_name as item4,i5.item_name as item5,i6.item_name as item6 
		        		FROM summoner AS s, champions AS c, matches AS m, items AS i1, items AS i2,items AS i3,items AS i4,items AS i5,items AS i6, plays AS p 
		        		WHERE m.mid = " .$mid ." and s.sid = p.sid and i1.iid = p.iid_1 and i2.iid = p.iid_2 and i3.iid = p.iid_3 and i4.iid = p.iid_4 and i5.iid = p.iid_5 and i6.iid = p.iid_6 and p.cid = c.cid and p.mid = m.mid";
						$result = renderFree($con,$sql);
						while($row = mysqli_fetch_assoc($result)) {
							if ($row['side']==1) {
								echo "<tr>\n";
								echo "<td>" . $row['sname'] . "</td>\n";
								echo "<td>" . $row['kills'] . "</td>\n";
								echo "<td>" . $row['deaths'] . "</td>\n";
								echo "<td>" . $row['assists'] . "</td>\n";
								echo "<td>" . $row['champ_name'] . "</td>\n";
								echo "<td>" . $row['level'] . "</td>\n";
								echo "<td>" . $row['item1'] . "</td>\n";
								echo "<td>" . $row['item2'] . "</td>\n";
								echo "<td>" . $row['item3'] . "</td>\n";
								echo "<td>" . $row['item4'] . "</td>\n";
								echo "<td>" . $row['item5'] . "</td>\n";
								echo "<td>" . $row['item6'] . "</td>\n";
								echo "</tr>\n";
							}
						}
					?>
		        </tbody>
	    </table>
	    <table class="center1copy">
	    	<tr>
                <th>Barons</th>
                <th>Total Gold</th>
                <th>Turrets</th>
                <th>Total Kills</th>
                <th>Total Deaths</th>
            </tr>
	    	<?php
	    		$sqlmid = "SELECT * FROM matches AS m WHERE m.mid = " .$mid;		
        		$result = renderFree($con,$sqlmid);
				while($row = mysqli_fetch_assoc($result)) {
					echo "<tr>\n";
					echo "<td>" . $row['barons_1'] . "</td>\n";
					echo "<td>" . $row['totalgold_1'] . "</td>\n";
					echo "<td>" . $row['turrets_1'] . "</td>\n";
					echo "<td>" . $row['totalkills_1'] . "</td>\n";
					echo "<td>" . $row['totaldeaths_1'] . "</td>\n";
					echo "</tr>\n";
				}
			?>
	    </table>
	    <table class="center2">
		        <thead>
		            <tr>
		                <th>Summoner Name</th>
		                <th>Kills</th>
		                <th>Deaths</th>
		                <th>Assists</th>
		                <th>Champion</th>
		                <th>Level</th>
		                <th>Item_1</th>
		                <th>Item_2</th>
		                <th>Item_3</th>
		                <th>Item_4</th>
		                <th>Item_5</th>
		                <th>Item_6</th>
		            </tr>
		        </thead>
		        <tbody>
		        	<?php
		        		$result = renderFree($con,$sql);
						while($row = mysqli_fetch_assoc($result)) {
							if ($row['side']==2) {
								echo "<tr>\n";
								echo "<td>" . $row['sname'] . "</td>\n";
								echo "<td>" . $row['kills'] . "</td>\n";
								echo "<td>" . $row['deaths'] . "</td>\n";
								echo "<td>" . $row['assists'] . "</td>\n";
								echo "<td>" . $row['champ_name'] . "</td>\n";
								echo "<td>" . $row['level'] . "</td>\n";
								echo "<td>" . $row['item1'] . "</td>\n";
								echo "<td>" . $row['item2'] . "</td>\n";
								echo "<td>" . $row['item3'] . "</td>\n";
								echo "<td>" . $row['item4'] . "</td>\n";
								echo "<td>" . $row['item5'] . "</td>\n";
								echo "<td>" . $row['item6'] . "</td>\n";
								echo "</tr>\n";
							}
						}
					?>
		        </tbody>
	    </table>
	    <table class="center2copy">
	    	<tr>
                <th>Barons</th>
                <th>Total Gold</th>
                <th>Turrets</th>
                <th>Total Kills</th>
                <th>Total Deaths</th>
            </tr>
	    	<?php
	    		$sqlmid = "SELECT * FROM matches AS m WHERE m.mid = " .$mid;		
        		$result = renderFree($con,$sqlmid);
				while($row = mysqli_fetch_assoc($result)) {
					echo "<tr>\n";
					echo "<td>" . $row['barons_2'] . "</td>\n";
					echo "<td>" . $row['totalgold_2'] . "</td>\n";
					echo "<td>" . $row['turrets_2'] . "</td>\n";
					echo "<td>" . $row['totalkills_2'] . "</td>\n";
					echo "<td>" . $row['totaldeaths_2'] . "</td>\n";
					echo "</tr>\n";
				}
			?>
	    </table>
	    <div class="tipsOuter">
	   		 	<div class="tipsInner">
	   		 		<p>Enter Stuff Here</p>
	   		 	</div>
	   	</div>
	</body>        	

</html>