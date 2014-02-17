<?php      
// load up config file  
require_once("config/config.php");  

require_once("templates/header.php");

// url parameters
$q = $_POST['q'];

// search query
$query = "SELECT * FROM $tb_name WHERE site LIKE '%$q%'";
?>  

<div class="container">

  <?php if ($result = $db->query($query)) { ?>

    <?php if (mysqli_num_rows($result) > 0) { ?>

      <legend>Logins including "<em><strong><?php echo $q; ?></strong></em>" term</legend>
  
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
  
    <?php } else { ?>
      
      <p class="lead">Your search - <em><strong><?php echo $q; ?></strong></em> - did not match any item.</p>
          
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
