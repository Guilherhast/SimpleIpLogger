<?php

$link = $_POST['link'];

if(strlen($link) > 256){
	header("Location: /?error=Url+too+long");
	die();
}

if (!filter_var($link, FILTER_VALIDATE_URL)) {
	header("Location: /?error=Invalid+url");
	die();
}

include_once("dbManager.php");
$dbm = new dbManager();
$wid  = $dbm->add_entry($link);

header("Location: /watch.php?id=$wid");

?>
