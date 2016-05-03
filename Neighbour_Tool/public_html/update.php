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
    }
     
    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $emailError = null;
        $mobileError = null;
         
        // keep track post values
		
		
		$date_loaded = $_POST['date_loaded'];
		$time_loaded = $_POST['time_loaded'];
		$engineer = $_POST['engineer'];
		$controller = $_POST['controller'];		
		$sites = $_POST['sites'];
		$region = $_POST['region'];
		$project = $_POST['project'];
		$modification = $_POST['modification'];
		$comments = $_POST['comments'];
		$location_of_mml = $_POST['location_of_mml'];
		$datetimenow = date("Y-m-d H:i:s"); 		
         
        // validate input
        $valid = true;
        // if (empty($name)) {
            // $nameError = 'Please enter Name';
            // $valid = false;
        // }
         
        // if (empty($email)) {
            // $emailError = 'Please enter Email Address';
            // $valid = false;
        // } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            // $emailError = 'Please enter a valid Email Address';
            // $valid = false;
        // }
         
        // if (empty($mobile)) {
            // $mobileError = 'Please enter Mobile Number';
            // $valid = false;
        // }
         
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE configtracker set date_loaded = ?,time_loaded = ?, engineer = ?, controller = ?, sites = ?, region = ?, project = ?, modification = ?, comments = ?, location_of_mml = ? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($date_loaded,$time_loaded,$engineer,$controller,$sites,$region,$project,$modification,$comments,$location_of_mml,$id));
            Database::disconnect();
            header("Location: grid.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM configtracker where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        
		$date_loaded = $data['date_loaded'];
		$time_loaded = $data['time_loaded'];
		$engineer = $data['engineer'];
        $controller = $data['controller'];
        $sites = $data['sites'];
		$region = $data['region'];
		$project = $data['project'];		
		$modification = $data['modification'];
		$comments = $data['comments'];
		$location_of_mml = $data['location_of_mml'];  
		
        Database::disconnect();
    }
?>



<!DOCTYPE html>
<html lang="en">
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
                        <h3>Update Config change Record</h3>
                    </div>
             
                    <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
					

					<div class="control-group <?php echo !empty($date_loadedError)?'error':'';?>">
					    <label class="control-label">Date Change performed</label>
					    <div class="controls">
					      	<input name="date_loaded" type="date"  placeholder="format = 2015-07-04" value="<?php echo !empty($date_loaded)?$date_loaded:'';?>">
					      	<?php if (!empty($date_loadedError)): ?>
					      		<span class="help-inline"><?php echo $date_loadedError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>


					<div class="control-group <?php echo !empty($time_loadedError)?'error':'';?>">
					    <label class="control-label">Time Change performed</label>
					    <div class="controls">
					      	<input name="time_loaded" type="time"  placeholder="time loaded" value="<?php echo !empty($time_loaded)?$time_loaded:'';?>">
					      	<?php if (!empty($time_loadedError)): ?>
					      		<span class="help-inline"><?php echo $time_loadedError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>	
					
					
					<div class="control-group <?php echo !empty($engineerError)?'error':'';?>">
					    <label class="control-label">Engineer</label>
					    <div class="controls">
					      	<input name="engineer" type="text"  placeholder="Engineer" value="<?php echo !empty($engineer)?$engineer:'';?>">
					      	<?php if (!empty($engineerError)): ?>
					      		<span class="help-inline"><?php echo $engineerError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  
					  <div class="control-group <?php echo !empty($controllerError)?'error':'';?>">
					    <label class="control-label">Controller</label>
					    <div class="controls">
					      	<input name="controller" type="text" placeholder="Controller" value="<?php echo !empty($controller)?$controller:'';?>">
					      	<?php if (!empty($controllerError)): ?>
					      		<span class="help-inline"><?php echo $controllerError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>		  

					<div class="control-group <?php echo !empty($sitesError)?'error':'';?>">
					    <label class="control-label">Sites</label>
					    <div class="controls">
					      	<input name="sites" type="text"  placeholder="Sites" value="<?php echo !empty($sites)?$sites:'';?>">
					      	<?php if (!empty($sitesError)): ?>
					      		<span class="help-inline"><?php echo $sitesError;?></span>
					      	<?php endif;?>
					    </div>
					</div>	
					
					
					<div class="control-group <?php echo !empty($regionError)?'error':'';?>">
							<label class="control-label">Region</label>
							<div class="controls">
							<input name="region" type="text"  placeholder="Region" value="<?php echo !empty($region)?$region:'';?>">
							<?php if (!empty($regionError)): ?>
								<span class="help-inline"><?php echo $regionError;?></span>
							<?php endif;?>
					    </div>
					  </div>		  
	
					  
					  
						<div class="control-group <?php echo !empty($projectError)?'error':'';?>">
							<label class="control-label">Project</label>
							<div class="controls">
							<input name="project" type="text"  placeholder="Region" value="<?php echo !empty($project)?$project:'';?>">
							<?php if (!empty($projectError)): ?>
								<span class="help-inline"><?php echo $projectError;?></span>
							<?php endif;?>
					    </div>
					  </div>
					  
						<div class="control-group <?php echo !empty($modificationError)?'error':'';?>">
							<label class="control-label">Modification</label>
							<div class="controls">
							<input name="modification" type="text"  placeholder="Mod" value="<?php echo !empty($modification)?$modification:'';?>">
							<?php if (!empty($modificationError)): ?>
								<span class="help-inline"><?php echo $modificationError;?></span>
							<?php endif;?>
					    </div>
					  </div>
					  
					  
					  
					  


						<div class="control-group <?php echo !empty($changeError)?'error':'';?>">
							<label class="control-label">Comments</label>
							<div class="controls">
							<!--<input name="comments" type="text"  placeholder="Comments" value="<?php //echo !empty($comments)?$comments:'';?>">-->
							<textarea class="form-control" id="styled" rows="5" name="comments" type="text"  placeholder="Comments" value=""><?php echo !empty($comments)?$comments:'';?></textarea>
							<?php if (!empty($commentsError)): ?>
								<span class="help-inline"><?php echo $commentsError;?></span>
							<?php endif;?>
							<?php echo !empty($comments)?$comments:'';?>

					    </div>
					  </div>					  
					  
					  
						<div class="control-group <?php echo !empty($location_of_mmlError)?'error':'';?>">
							<label class="control-label">MML (or location)</label>
							<div class="controls">
							<!--<input name="location_of_mml" type="text"  placeholder="MML or MML (or location)" value="<?php //echo !empty($location_of_mml)?$location_of_mml:'';?>">-->
							<textarea class="form-control" id="styled" rows="5" name="location_of_mml" type="text" placeholder="MML (or location)"  value=""><?php echo !empty($location_of_mml)?$location_of_mml:'';?></textarea>
							<?php if (!empty($location_of_mmlError)): ?>
								<span class="help-inline"><?php echo $location_of_mmlError;?></span>
							<?php endif;?>
					    </div>
					  </div>
					
					
					
					

					  
						<div class="form-actions">
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn" href=" grid.php">Back</a>
                        </div>
						

						
						
						
						
						
						
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>

