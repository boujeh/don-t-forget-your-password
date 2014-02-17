<?php      
// load up config file  
require_once("config/config.php");

// url parameters
$id = $_GET['id'];

$query = "DELETE FROM $tb_name WHERE id = $id";
if (!$db->query($query)) {
  echo "Delete failed: (" . $db->errno . ") " . $db->error;
}
$db->close();

header("location:list.php");
?>