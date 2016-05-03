<?php
    require("config.php");
    if(empty($_SESSION['user'])) 
    {
        header("Location: index.php");
        die("Redirecting to index.php"); 
    }
?>


<?php
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: grid.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM configtracker where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>
 
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Config Tracker</title>
    <meta name="description" content="Bootstrap Tab + Fixed Sidebar Tutorial with HTML5 / CSS3 / JavaScript">
    <meta name="author" content="Untame.net">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="assets/bootstrap.min.js"></script>
	
    <link href="assets/bootstrap.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">	
</head>

<body>

<div class="navbar navbar-fixed-top navbar-inverse">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand">Config Tracker</a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
			<li><a>logged in as: <?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?></a></li>
			<li class="divider-vertical"></li>
			<li><a href="register.php">Register</a></li>
			<li class="divider-vertical"></li>
			<li><a href="logout.php">Log Out</a></li>
        </ul>
      </div>
    </div>
  </div>
</div> 

    <div class="container hero-unit">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Details of Change</h3>
                    </div>
                     
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label"><strong>MML: </strong></label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['location_of_mml'];?>
                            </label>
                        </div>
                      </div>					  


					  
					  
					  
                      <!--)<div class="control-group">
                        <label class="control-label">Controller</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php// echo $data['controller'];?>
                            </label>
                        </div>
                      </div>
					  
                      <div class="control-group">
                        <label class="control-label">Sites</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php// echo $data['sites'];?>
                            </label>
                        </div>
						
                      </div> --> 
					  
                        <div class="form-actions">
                          <a class="btn" href="grid.php">Back</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>