<?php

$db_file =  "database.db";
$table_entries =  "entries";
$table_visits =  "visits";

class  DataBase extends SQLite3 {
	function __construct($db_file){
		$this->open($db_file);
	}
}

class dbManager {
	private $db;

	function __construct(){
		global $db_file;
		$this->db = new DataBase($db_file);
	}

	function add_entry($url){
		global $table_entries;

		$watcher = uniqid();
		$trap = uniqid();
		$created = date("Y-m-d H:i:s");

		$values = "'$watcher','$trap','$url','$created'";

		$sql_command = "INSERT INTO $table_entries VALUES($values)";

		$this->db->exec($sql_command);

		return $watcher;
	}

	function get_entry($id){
		global $table_entries;
		$query = "select * from $table_entries where id = '$id'";
		return $this->db->querySingle($query,true);
	}

	function get_goto($link){
		global $table_entries;
		$query = "select goto from $table_entries where link = '$link'";
		return $this->db->querySingle($query);
	}

	function add_visit($link){
		global $table_visits;


		$ip  = $_SERVER['HTTP_X_FORWARDED_FOR'];//Work behind a proxy
		if(!$ip){
			$ip  = $_SERVER['REMOTE_ADDR'];
		}

		$stamp = date("Y-m-d H:i:s");

		$fields = "link, stamp, ip";
		$values_str = "'$link', '$stamp', '$ip'";

		$sql_command = "INSERT INTO $table_visits ($fields) VALUES($values_str)";

		$this->db->exec($sql_command);
	}

	function visit($link){
		$this->add_visit($link);
		return $this->get_goto($link);
	}

	function get_visits($link){
		global $table_visits;

		$res = Array();
		$query = "select * from $table_visits where link == '$link'";

		$select = $this->db->query($query);

		while( $row = $select->fetchArray(SQLITE3_ASSOC)){
			$res[]=$row;
		}
		return $res;
	}

}
