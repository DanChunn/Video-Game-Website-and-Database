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
		<link type="text/css" rel="stylesheet" href="insertinfo.css"/>
		<title>336 League Of Legends Database - Admin Page</title>
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
		<div>
			<form id "playInfo" action ="playsInfo.php" method="post" accept-charset='UTF-8'>
			<table class="plays">;
		        <thead>
		            <tr>
		                <td>sid</td>
		                <td>mid</td>
		                <td>cid</td>
		                <td>iid_1</td>
		                <td>iid_2</td>
		                <td>iid_3</td>
		                <td>iid_4</td>
		                <td>iid_5</td>
		                <td>iid_6</td>
		                <td>kills</td>
		                <td>deaths</td>
		                <td>assists</td>
		                <td>level</td>
		                <td>side</td>
		            </tr>
		        </thead>
		        <tbody>
		        	<tr>
	                    <td><input type='text' name='0sid' id='sid'</td>
	                    <td><input type='text' name='0mid' id='mid'</td>
	                    <td><input type='text' name='0cid' id='cid'</td>
	                    <td><input type='text' name='0iid_1' id='iid_1'</td>
	                    <td><input type='text' name='0iid_2' id='iid_2'</td>
	                    <td><input type='text' name='0iid_3' id='iid_3'</td>
	                    <td><input type='text' name='0iid_4' id='iid_4'</td>
	                    <td><input type='text' name='0iid_5' id='iid_5'</td>
	                    <td><input type='text' name='0iid_6' id='iid_6'</td>
	                    <td><input type='text' name='0kills' id='kills'</td>
	                    <td><input type='text' name='0deaths' id='deaths'</td>
	                    <td><input type='text' name='0assists' id='assists'</td>
	                    <td><input type='text' name='0level' id='level'</td>
	                    <td><input type='text' name='0side' id='side'</td>
	                </tr>
		        	<tr>
	                    <td><input type='text' name='1sid' id='sid'</td>
	                    <td><input type='text' name='1mid' id='mid'</td>
	                    <td><input type='text' name='1cid' id='cid'</td>
	                    <td><input type='text' name='1iid_1' id='iid_1'</td>
	                    <td><input type='text' name='1iid_2' id='iid_2'</td>
	                    <td><input type='text' name='1iid_3' id='iid_3'</td>
	                    <td><input type='text' name='1id_4' id='iid_4'</td>
	                    <td><input type='text' name='1id_5' id='iid_5'</td>
	                    <td><input type='text' name='1id_6' id='iid_6'</td>
	                    <td><input type='text' name='1kills' id='kills'</td>
	                    <td><input type='text' name='1deaths' id='deaths'</td>
	                    <td><input type='text' name='1assists' id='assists'</td>
	                    <td><input type='text' name='1level' id='level'</td>
	                    <td><input type='text' name='1side' id='side'</td>
	                </tr>
		        	<tr>
	                    <td><input type='text' name='2sid' id='sid'</td>
	                    <td><input type='text' name='2mid' id='mid'</td>
	                    <td><input type='text' name='2cid' id='cid'</td>
	                    <td><input type='text' name='2iid_1' id='iid_1'</td>
	                    <td><input type='text' name='2iid_2' id='iid_2'</td>
	                    <td><input type='text' name='2iid_3' id='iid_3'</td>
	                    <td><input type='text' name='2iid_4' id='iid_4'</td>
	                    <td><input type='text' name='2iid_5' id='iid_5'</td>
	                    <td><input type='text' name='2iid_6' id='iid_6'</td>
	                    <td><input type='text' name='2kills' id='kills'</td>
	                    <td><input type='text' name='2deaths' id='deaths'</td>
	                    <td><input type='text' name='2assists' id='assists'</td>
	                    <td><input type='text' name='2level' id='level'</td>
	                    <td><input type='text' name='2side' id='side'</td>
	                </tr>
	                <tr>
	                    <td><input type='text' name='3sid' id='sid'</td>
	                    <td><input type='text' name='3mid' id='mid'</td>
	                    <td><input type='text' name='3cid' id='cid'</td>
	                    <td><input type='text' name='3iid_1' id='iid_1'</td>
	                    <td><input type='text' name='3iid_2' id='iid_2'</td>
	                    <td><input type='text' name='3iid_3' id='iid_3'</td>
	                    <td><input type='text' name='3iid_4' id='iid_4'</td>
	                    <td><input type='text' name='3iid_5' id='iid_5'</td>
	                    <td><input type='text' name='3iid_6' id='iid_6'</td>
	                    <td><input type='text' name='3kills' id='kills'</td>
	                    <td><input type='text' name='3deaths' id='deaths'</td>
	                    <td><input type='text' name='3assists' id='assists'</td>
	                    <td><input type='text' name='3level' id='level'</td>
	                    <td><input type='text' name='3side' id='side'</td>
	                </tr>
	                <tr>
	                    <td><input type='text' name='4sid' id='sid'</td>
	                    <td><input type='text' name='4mid' id='mid'</td>
	                    <td><input type='text' name='4cid' id='cid'</td>
	                    <td><input type='text' name='4iid_1' id='iid_1'</td>
	                    <td><input type='text' name='4iid_2' id='iid_2'</td>
	                    <td><input type='text' name='4iid_3' id='iid_3'</td>
	                    <td><input type='text' name='4iid_4' id='iid_4'</td>
	                    <td><input type='text' name='4iid_5' id='iid_5'</td>
	                    <td><input type='text' name='4iid_6' id='iid_6'</td>
	                    <td><input type='text' name='4kills' id='kills'</td>
	                    <td><input type='text' name='4deaths' id='deaths'</td>
	                    <td><input type='text' name='4assists' id='assists'</td>
	                    <td><input type='text' name='4level' id='level'</td>
	                    <td><input type='text' name='4side' id='side'</td>
	                </tr>
	                <tr>
	                    <td><input type='text' name='5sid' id='sid'</td>
	                    <td><input type='text' name='5mid' id='mid'</td>
	                    <td><input type='text' name='5cid' id='cid'</td>
	                    <td><input type='text' name='5iid_1' id='iid_1'</td>
	                    <td><input type='text' name='5iid_2' id='iid_2'</td>
	                    <td><input type='text' name='5iid_3' id='iid_3'</td>
	                    <td><input type='text' name='5iid_4' id='iid_4'</td>
	                    <td><input type='text' name='5iid_5' id='iid_5'</td>
	                    <td><input type='text' name='5iid_6' id='iid_6'</td>
	                    <td><input type='text' name='5kills' id='kills'</td>
	                    <td><input type='text' name='5deaths' id='deaths'</td>
	                    <td><input type='text' name='5assists' id='assists'</td>
	                    <td><input type='text' name='5level' id='level'</td>
	                    <td><input type='text' name='5side' id='side'</td>
	                </tr>
	                <tr>
	                    <td><input type='text' name='6sid' id='sid'</td>
	                    <td><input type='text' name='6mid' id='mid'</td>
	                    <td><input type='text' name='6cid' id='cid'</td>
	                    <td><input type='text' name='6iid_1' id='iid_1'</td>
	                    <td><input type='text' name='6iid_2' id='iid_2'</td>
	                    <td><input type='text' name='6iid_3' id='iid_3'</td>
	                    <td><input type='text' name='6iid_4' id='iid_4'</td>
	                    <td><input type='text' name='6iid_5' id='iid_5'</td>
	                    <td><input type='text' name='6iid_6' id='iid_6'</td>
	                    <td><input type='text' name='6kills' id='kills'</td>
	                    <td><input type='text' name='6deaths' id='deaths'</td>
	                    <td><input type='text' name='6assists' id='assists'</td>
	                    <td><input type='text' name='6level' id='level'</td>
	                    <td><input type='text' name='6side' id='side'</td>
	                </tr>
	                <tr>
	                    <td><input type='text' name='7sid' id='sid'</td>
	                    <td><input type='text' name='7mid' id='mid'</td>
	                    <td><input type='text' name='7cid' id='cid'</td>
	                    <td><input type='text' name='7iid_1' id='iid_1'</td>
	                    <td><input type='text' name='7iid_2' id='iid_2'</td>
	                    <td><input type='text' name='7iid_3' id='iid_3'</td>
	                    <td><input type='text' name='7iid_4' id='iid_4'</td>
	                    <td><input type='text' name='7iid_5' id='iid_5'</td>
	                    <td><input type='text' name='7iid_6' id='iid_6'</td>
	                    <td><input type='text' name='7kills' id='kills'</td>
	                    <td><input type='text' name='7deaths' id='deaths'</td>
	                    <td><input type='text' name='7assists' id='assists'</td>
	                    <td><input type='text' name='7level' id='level'</td>
	                    <td><input type='text' name='7side' id='side'</td>
	                </tr>
	                <tr>
	                    <td><input type='text' name='8sid' id='sid'</td>
	                    <td><input type='text' name='8mid' id='mid'</td>
	                    <td><input type='text' name='8cid' id='cid'</td>
	                    <td><input type='text' name='8iid_1' id='iid_1'</td>
	                    <td><input type='text' name='8iid_2' id='iid_2'</td>
	                    <td><input type='text' name='8iid_3' id='iid_3'</td>
	                    <td><input type='text' name='8iid_4' id='iid_4'</td>
	                    <td><input type='text' name='8iid_5' id='iid_5'</td>
	                    <td><input type='text' name='8iid_6' id='iid_6'</td>
	                    <td><input type='text' name='8kills' id='kills'</td>
	                    <td><input type='text' name='8deaths' id='deaths'</td>
	                    <td><input type='text' name='8assists' id='assists'</td>
	                    <td><input type='text' name='8level' id='level'</td>
	                    <td><input type='text' name='8side' id='side'</td>
	                </tr>
	                <tr>
	                    <td><input type='text' name='9sid' id='sid'</td>
	                    <td><input type='text' name='9mid' id='mid'</td>
	                    <td><input type='text' name='9cid' id='cid'</td>
	                    <td><input type='text' name='9iid_1' id='iid_1'</td>
	                    <td><input type='text' name='9iid_2' id='iid_2'</td>
	                    <td><input type='text' name='9iid_3' id='iid_3'</td>
	                    <td><input type='text' name='9iid_4' id='iid_4'</td>
	                    <td><input type='text' name='9iid_5' id='iid_5'</td>
	                    <td><input type='text' name='9iid_6' id='iid_6'</td>
	                    <td><input type='text' name='9kills' id='kills'</td>
	                    <td><input type='text' name='9deaths' id='deaths'</td>
	                    <td><input type='text' name='9assists' id='assists'</td>
	                    <td><input type='text' name='9level' id='level'</td>
	                    <td><input type='text' name='9side' id='side'</td>
	                </tr>
	                <tr>
	                	<td></td>
	                	<td></td>
	                	<td></td>
	                	<td></td>
	                	<td></td>
	                	<td></td>
	                	<td></td>
	                	<td></td>
	                	<td></td>
	                	<td></td>
	                	<td></td>
	                	<td colspan = "2"><a class href="champions.php">Champions </a>
						<a class href="items.php">- Items</a></td>
	                	<td colspan="2">
	                	<div id="wrapper">
    						<input id="button" type="submit" name="Submit" value="Next">
						</div>
						</td>
	                </tr>
	                
		        </tbody>
	   		 </table>
	   		</form>
	   	</div>
	</body>        	

</html>