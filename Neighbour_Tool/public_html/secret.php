<?php
    require("config.php");
    if(empty($_SESSION['user'])) 
    {
        header("Location: index.php");
        die("Redirecting to index.php"); 
    }
?>
<!-- Author: Michael Milstead / Mode87.com
     for Untame.net
     Bootstrap Tutorial, 2013
-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Config Tracker</title>
    <meta name="description" content="Bootstrap Tab + Fixed Sidebar Tutorial with HTML5 / CSS3 / JavaScript">
    <meta name="author" content="Untame.net">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="assets/bootstrap.min.js"></script>
    <link href="assets/bootstrap.min.css" rel="stylesheet" media="screen">
    <style type="text/css">
        body { background: url(assets/bglight.png); }
        .hero-unit { background-color: #fff; }
        .center { display: block; margin: 0 auto; }
    </style>
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

<!--<div class="container hero-unit">
    <!-- <h2>Hello <?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?>, welcome to the 2degrees Config Tracker !</h2>
   <p>Check out the change in the navbar! Use the new "Log Out" button to do just that. Oh, were you expecting something more exciting on the secret page? Here, have this charming picture of the Earthbound crew crossing a street in Abbey Road fashion.</p>
    <p><img src="assets/abbeybound.jpg" alt="" class="center" /></p>
</div> -->

    <div class="container hero-unit">
			
            <div class="row">
				<p>
                    <a href="create.php" class="btn btn-success">Create</a>
                </p>
			
			
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>DATE ENTERED</th>
                      <th>Date Change Performed</th>
                      <th>Time Change Performed</th>
					  <th>Engineer</th>
					  <th>Controller</th>
					  <th>Sites</th>
					  <th>Regions</th>
					  <th>Projects</th>
					  <th>Change</th>
					  <th>Comment.</th>
					  <!-- <th>MML (or location)</th>	-->
					  <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM configtracker ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['date_entered'] . '</td>';
                            echo '<td>'. $row['date_loaded'] . '</td>';
                            echo '<td>'. $row['time_loaded'] . '</td>';
							echo '<td>'. $row['engineer'] . '</td>';
							echo '<td>'. $row['controller'] . '</td>';
							echo '<td>'. $row['sites'] . '</td>';
							echo '<td>'. $row['region'] . '</td>';
							echo '<td>'. $row['project'] . '</td>';
							echo '<td>'. $row['modification'] . '</td>';
							echo '<td>'. $row['comments'] . '</td>';
							//echo '<td>'. $row['location_of_mml'] . '</td>';								
                            echo '<td width=250>';
							echo '<a class="btn" href="read.php?id='.$row['id'].'">Read</a>';
							echo '     ';
							echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
							//echo '     ';
							echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
							echo '</td>';
							echo '</tr>';

                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->

























</body>
</html>