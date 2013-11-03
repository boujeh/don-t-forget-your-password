<?php      
// load up config file
require_once("config/config.php");

require_once("templates/header.php");
?>  

<div class="container">

  <legend>New Login Details</legend>
  
  <form class="form-horizontal" role="form" action="create.php" method="post">
    <div class="form-group">
      <label for="website" class="col-sm-2 control-label">Website</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="website" id="website" placeholder="Website name.">
      </div>
    </div>
    <div class="form-group">
      <label for="email" class="col-sm-2 control-label">Email</label>
      <div class="col-sm-4">
        <input type="email" class="form-control" name="email" id="email" placeholder="Email.">
      </div>
    </div>
    <div class="form-group">
      <label for="password" class="col-sm-2 control-label">Password</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="password" id="password" placeholder="Password.">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
    
</div> <!-- /container -->

<?php  
require_once("templates/footer.php");
?>  
