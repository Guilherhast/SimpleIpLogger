<?php
include_once("dbManager.php");

$wid = $_GET['id'];

$dbm = new dbManager();

$entry = $dbm->get_entry($wid);

$trap = $_SERVER['HTTP_HOST'] ."/?l=" . $entry['link'] ;
$target = $entry['goto'] ;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo "log: $wid"; ?></title>
<link rel="stylesheet" href="../style.css">
</head>
<body>
	<div>
		<?php
echo "<h1>watching: $wid</h1>";
//Watcher id, trap link, points to
echo "<br>";

echo "target: <a href='$target' target='_blank'>$target</a><br>";
echo "Trap: <a id='trap' onclick='navigator.clipboard.writeText(this.innerHTML)' href='#'>$trap</a> (click to copy)<br>";
$allVisits = $dbm->get_visits($entry['link']);
?>
<div class="tableContainer">
	<table>
		<?php
		echo "<tr>\n";
		foreach($allVisits[0] as $key => $value){
			echo"<td>\n";
			echo "$key";
			echo"</td>\n";
		}
		echo "</tr>\n";
		foreach($allVisits as $col){
			echo "<tr>\n";
			foreach($col as $key => $value){
				
				echo"<td>\n";
				if ( $key == "ip"){
					echo "<a target='_blank' href='https://geoiplookup.net/ip/$value'>$value</a>";
				}else{
					echo "$value";
				}
				echo"</td>\n";
			}
			echo "</tr>\n";
		}
		?>
	</table>
</div>
</body>
</html>
