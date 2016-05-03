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
			.patrickmod	{	font-size: 13px;		
							line-height: 1;
						}
		th, td {				
				overflow: hidden;
				width: 100px;
				}
    </style>
    
    <link rel="stylesheet" type="text/css" href="media/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="resources/syntax/shCore.css">
    <link rel="stylesheet" type="text/css" href="resources/demo.css">
    <style type="text/css" class="init">

    </style>
    <script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
    <<script type="text/javascript" language="javascript" src="resources/syntax/shCore.js"></script>
    <script type="text/javascript" language="javascript" src="resources/demo.js"></script>
    <script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
            $('#example').DataTable();
    } );
    </script> 
	
		<script type="text/javascript" language="javascript" class="init">
		// $(document).ready(function() {
			// // Setup - add a text input to each footer cell
			// $('#example tfoot th').each( function () {
				// var title = $('#example thead th').eq( $(this).index() ).text();
				// $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
			// } );

			// // DataTable
			// var table = $('#example').DataTable();

			// // Apply the search
			// table.columns().every( function () {
				// var that = this;

				// $( 'input', this.footer() ).on( 'keyup change', function () {
					// that
						// .search( this.value )
						// .draw();
				// } );
			// } );
		// } );
	</script>

</head>

<body>

<div class="navbar navbar-fixed-top navbar-inverse ">
  <div class="navbar-inner">
    <div class="container">
		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>
		       <!--<a class="navbar-brand" href="#">
                    <img src="http://placehold.it/150x50&text=Logo" alt="">
                </a> -->
		
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

</div> -->

  <!--  <div class="container hero-unit"> -->
        <div class="hero-unit patrickmod" >		
            <div class="row">
				<p>
                    <a href="create.php" class="btn btn-success">Create</a>
                </p>
			
			
                <!--<table id="configtable" class="table table-striped table-bordered table-condensed"> -->
				<table id="example" class="display" cellspacing="0" width="100%">
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
						<th>Comments</th>
						<th>Action</th>
						</tr>
                  </thead>
				  
					<tfoot>
					<tr>
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
						<th>Comments</th>
						<th>Action</th>
						</tr>
					</tr>
				</tfoot>
				  
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
                            echo '<td width=250>';
                            echo '<a class="btn" href="read.php?id='.$row['id'].'">MML</a>';
                            if ($row['engineer'] == $_SESSION['user']['username']) {
								echo '<a class="btn btn-danger width=20" href="update.php?id='.$row['id'].'">Edit</a>';
							}		
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