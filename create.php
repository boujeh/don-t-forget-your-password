<?php      
// load up config file  
require_once("config/config.php");

// url parameters
$site = $_POST['website'];
$email = $_POST['email'];
$password = $_POST['password'];

$query = "INSERT INTO $tb_name (site, email, password) VALUES ('$site', '$email', '$password')";
if (!$db->query($query)) {
  echo "Insertion failed: (" . $db->errno . ") " . $db->error;
}
$db->close();

header("location:list.php");
?>