<?php

include_once("dbManager.php");

$db = new DataBase($db_file);

		$qry_create_entries = "
CREATE TABLE
IF NOT EXISTS $table_entries(
id VARCHAR(13) PRIMARY KEY,
link VARCHAR(13),
goto VARCHAR(1024),
created TIMESTAMP
);";


		$qry_create_vistis = "
CREATE TABLE
IF NOT EXISTS $table_visits(
id INTEGER PRIMARY KEY AUTOINCREMENT,
link VARCHAR(13),
stamp TIMESTAMP,
ip VARCHAR(16),
FOREIGN KEY (link) REFERENCES entries(link)
);";

//Use this to gather more information
/*
HTTP_USER_AGENT VARCHAR(256),
HTTP_ACCEPT_LANGUAGE VARCHAR(256),
HTTP_SEC_CH_UA VARCHAR(256),
HTTP_SEC_CH_UA_MOBILE VARCHAR(256),
HTTP_SEC_CH_UA_PLATFORM VARCHAR(256),
HTTP_X_FORWARDED_FOR VARCHAR(256),
*/

		$db->exec($qry_create_entries);
		$db->exec($qry_create_vistis);

?>
