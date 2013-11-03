<?php

// Connection's Parameters
$db_host="localhost";

// $db_user="database_username";
// $db_pass="database_password";
// $db_name="database_name";
// $tb_name="tb_name";

$db_user="root";
$db_pass="root";
$db_name="dfup";
$tb_name="logins";

// connect to MySQL
$mysqli = new mysqli($db_host, $db_user, $db_pass);
if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

// create DATABASE if not exists
if (!$mysqli->query("CREATE DATABASE IF NOT EXISTS $db_name")) {
  echo "db creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

$mysqli->close();

// create TABLE if not exists
$db = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($db->connect_errno) {
	echo "Failed to connect to MySQL: (" 
    . $db->connect_errno . ") " . $db->connect_error;
}
$create_table = "CREATE TABLE IF NOT EXISTS $tb_name  
                (
                  id INT NOT NULL AUTO_INCREMENT,
                  site VARCHAR(200) NOT NULL,
                  email VARCHAR(200) NOT NULL,
                  password VARCHAR(200) NOT NULL,
                  PRIMARY KEY(id)
                )";
if (!$db->query($create_table)) {
  echo "table creation failed: (" . $db->errno . ") " . $db->error;
}

// Error reporting. 
ini_set("error_reporting", "true");  
error_reporting(E_ALL|E_STRCT);  
  
?>
