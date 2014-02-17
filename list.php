<?php      
// load up config file  
require_once("config/config.php");  

require_once("templates/header.php");

require_once("functions/paginate.php");

// list query
$query = "SELECT * FROM $tb_name LIMIT $start, $limit";

?>  

<div class="container">

  <legend>Logins list</legend>

  <?php if ($result = $db->query($query)) { ?>

    <?php if (mysqli_num_rows($result) > 0) { ?>
    
      <?php echo $pagination; ?>

      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Website</th>
              <th>Email</th>
              <th>Password</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
              /* fetch associative array */
              while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
              <td><?php echo $row["site"]; ?></td>
              <td><?php echo $row["email"]; ?></td>
              <td><?php echo $row["password"]; ?></td>
              <td>
                <a class="btn btn-xs btn-default" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
              </td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>

      <?php echo $pagination; ?>
    
    <?php } else { ?>

      <p class="lead">You haven't add any login item yet. <a href="new.php">Add item.</a></p>

    <?php } ?>

  <?php 
    /* free result set */
    $result->free();
  }
  ?>

</div> <!-- /container -->

<?php  
require_once("templates/footer.php");  
?>  
