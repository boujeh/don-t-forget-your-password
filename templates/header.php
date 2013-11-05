<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Don't Forget Your Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

  </head>

  <body>
    <div id="wrap">
      
      <nav class="navbar navbar-default navbar-static-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">DontForgetYourPassword</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li>
              <a href="list.php"><i class="glyphicon glyphicon-list"></i> My list</a>
            </li>
            <li>
              <a href="new.php"><i class="glyphicon glyphicon-plus"></i> Add to list</a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <form class="navbar-form navbar-left" role="search" action="search.php" method="post">
              <div class="form-group">
                <input type="text" class="form-control" name="q" placeholder="Website name">
              </div>
              <button type="submit" class="btn btn-default">Search</button>
            </form>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>