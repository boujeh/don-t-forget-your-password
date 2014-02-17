<?php      
// load up config file  
require_once("config/config.php");

// post parameters
$id = $_POST['id'];
$site = $_POST['website'];
$email = $_POST['email'];
$password = $_POST['password'];

// "UPDATE `logins` SET `id`=[value-1],`site`=[value-2],`email`=[value-3],`password`=[value-4] WHERE 1"

$query = "UPDATE $tb_name SET site='$site', email='$email', password='$password' WHERE id = $id";
if (!$db->query($query)) {
  echo "Insertion failed: (" . $db->errno . ") " . $db->error;
}
$db->close();

header("location:list.php");
?>