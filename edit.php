<?php      
// load up config file  
require_once("config/config.php");  

require_once("templates/header.php");

// url parameters
$id = $_GET['id'];
?>  

<div class="container">

  <legend>Edit Login Details</legend>
  
  <form class="form-horizontal" role="form" action="update.php" method="post">
    
    <?php
    $query = "SELECT * FROM $tb_name WHERE id = $id";

    if ($result = $db->query($query)) {

      /* fetch associative array */
      while ($row = $result->fetch_assoc()) {
    ?>
    
    <div class="form-group">
      <label for="website" class="col-sm-2 control-label">Website</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="website" id="website" value="<?php echo $row['site'] ?>">
      </div>
    </div>
    <div class="form-group">
      <label for="email" class="col-sm-2 control-label">Email</label>
      <div class="col-sm-4">
        <input type="email" class="form-control" name="email" id="email" value="<?php echo $row['email'] ?>">
      </div>
    </div>
    <div class="form-group">
      <label for="password" class="col-sm-2 control-label">Password</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="password" id="password" value="<?php echo $row['password'] ?>">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
    <input type="hidden" name="id" value="<?php echo $id; ?>" id="id">
    
    <?php
      }

      /* free result set */
      $result->free();
    }
    ?>
    
  </form>
    
</div> <!-- /container -->

<?php  
    require_once("templates/footer.php");  
?>  
