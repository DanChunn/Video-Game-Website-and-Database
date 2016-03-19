<!DOCTYPE html>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="template.css"/>
		<title>336 League Of Legends Database - Admin Page</title>
	</head>
	<body>
		
		<div id="navbar">
			<ul>
				<li><a href="matches.php">Matches</a></li>
				<li><a href="champions.php">Champions</a></li>
				<li><a href="items.php">Items</a></li>
				<li><a href="users.php">Users</a></li>
			</ul>
		</div>
			<table class="center">;
		        <thead>
		            <tr>
		                <td>Match ID</td>
		                <td>Kills</td>
		                <td>Deaths</td>
		                <td>Win</td>
		            </tr>
		        </thead>
		        <tbody>
		        	<tr>
	                    <td><?php echo $row['Id']?></td>
	                    <td><?php echo $row['Name']?></td>
	                </tr>

		        </tbody>
	    </table>
	</body>        	

</html>