<?php

$link = "";
if ( isset($_GET['l'])){
	$link = $_GET['l'];
}

if (strlen($link) != 0){
		include_once("dbManager.php");

		$dbm = new dbManager();

		$goto = $dbm->visit($link);

		header("Location: $goto");
		die();
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="style.css" />
		<title>LogLog</title>
	</head>
<body>
	<div>
	<h1>Log log</h1>
		<form action="create.php" method="POST">
			<input type="text" name="link" id="" />
			<input type="submit" value="Create" />
		</form>
	</div>
</body>
<script>
	const urlParams = new URLSearchParams(window.location.search);
	const error = urlParams.get('error');
	error && window.alert(error);
</script>
</html>
