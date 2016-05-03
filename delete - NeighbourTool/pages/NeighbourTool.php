<?php 
function get($name){
	return isset($_REQUEST[$name]) ? $_REQUEST[$name] : " ";
}

function is_valid_index($index,$array) {
	return $index >= 0 && $index < count ($array);
}
?>



<!DOCTYPE html>
<html lang="en">

<?php include '../NeighbourTool/neighbourtoolFunction.php';?>
<?php include '../NeighbourTool/includes/layouts/header.php';?>


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Neighbour Tool</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->









</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">RAN TOOL 2000 v2.0</a>
            </div>
            <!-- /.navbar-header -->			
			

            <ul class="nav navbar-top-links navbar-right">  				
				<!-- /navbar-top-links -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
			
			
			
			<!-- nav sidebar -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       
					   
					   <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
							
							
                            <!-- /input-group -->
                        </li>
						
						
                        <li>
                            <a href="NeighbourTool.php"><i class="fa fa-sitemap fa-fw"></i> Neighbour Tool</a>
                        </li>

                        <li>
                       		 <a href="../NeighbourTool/neighbour_config_grid.php"><i class="fa fa-sitemap fa-fw"></i> Neighbour Confg Table</a>
                        </li>
						
						 <li>
                            <a href="http://172.21.200.37/~patrick/index.php"><i class="fa fa-bar-chart-o fa-fw"></i> Config Tracker</a>
                        </li>
						
						
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
		<!-- /.Navigation -->
		
		

        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Neighbour Tool</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>File Management</h4>
                        </div>
                        <div class="panel-body">
                            <div class="row">
								<div class="col-lg-6">
								<h1>Neighbour list Select</h1>
                                    <form role="form">                                       
                                        <div class="form-group">
                                            <label>Select Neighour list to run</label>
											
												<?php
													//$directory = 'C:/wamp/www/neighbourtoolfrontend/bootstrap admin - Neighbour Tool\NeighbourTool/NeighbourInputFiles';													
													$directory = '../../DataFiles/NeighbourInputFiles';

													$scanned_directory = array_diff(scandir($directory), array('..', '.'));

													 // echo "<pre>";
													 // print_r($scanned_directory);
													 // echo "</pre>";


													echo '<select class="form-control" name="filefromdownloaddir">';
														for ($i = 0; $i<count($scanned_directory);$i++)
														{
															echo '<option value ='. ($i + 1). '>'. $scanned_directory[$i].'</option>';
														}
														echo "</select>"
												?>
												<br>
												<input type="submit" class="btn btn-success">
												
													<?php	
														if(get("filefromdownloaddir")) {
															$filefromdownloaddir_id = get("filefromdownloaddir");
															if(is_valid_index($filefromdownloaddir_id -1,$scanned_directory)) {
															 $selectedFile = $scanned_directory[$filefromdownloaddir_id -1];
															 echo "   you have selected: ". $selectedFile;
															} else {
																echo '<span style="color:red">Invalid file index</span>';
															}
														}
													?>
                                 
                                        </div>
								  </form>
								</div>                                    
							
								<!-- UPLOAD FILES -->								
								
								<?php include '../php-file-uploader/upload.php';?>
								
								<div class="col-lg-6">
								<h1>Upload new input list</h1>
								
                                   <!-- <form role="form">  -->                                     
								  	<form class="well" action="../php-file-uploader/upload.php" method="post" enctype="multipart/form-data">
											  <div class="form-group">
												<label for="file">Select a file to upload</label>
												<input type="file" name="file">
												<p class="help-block">Only .txt and .csv with maximum size of 2 MB is allowed.</p>
											  </div>
											  <input type="submit" class="btn btn-lg btn-primary" value="Upload">							
									</form>
							
                                </div>                                					
								
							</div>
                         
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			
			<!-- ================================= -->
			<!-- second div box - neighbour output -->
			<!-- ================================= -->
			
			<?php
				//set neighbours.csv as default
				if (!isset($selectedFile)){
					//$selectedFile = "neighbours.csv";
					$selectedFile = "";
				} 
			?>						
			
            
			
			
        	<?php
        	$neighbourOutputArray = createNeighbourListMML($selectedFile);
    		?>



        	<div class="panel panel-primary">
				<div class="panel-heading"><h4>Output Table</h4></div>
				<div class="panel-body">

					<!--<h3 class="text-muted">Neighbour Tool output table</h3>-->

					<table id="example" class="display" cellspacing="0" width="100%">
					  <thead>
						<tr>
							<th>Source Cell</th>
							<th>Neighbour Cell</th>
							<th>Relationship Type</th>
							<th>MML</th>							
						</tr>
					  </thead>
					  <tbody>					  
			  			<?php			
						   foreach ($neighbourOutputArray as $k => $v){
								echo '<tr>';
								echo '<td>'. $neighbourOutputArray[$k]['SourceCell'] . '</td>';
								echo '<td>'. $neighbourOutputArray[$k]['NeighbourCell'] . '</td>';
								echo '<td>'. $neighbourOutputArray[$k]['RelationshipType'] . '</td>';
								echo '<td>'. $neighbourOutputArray[$k]['MML'] . '</td>';
								echo '</tr>'; 
						   }        
				   		?>
					  </tbody>
					</table>
					
				</div>
			</div>	
					
					
					
					
				
			<div class="panel panel-primary">
				<div class="panel-heading"><h4> Output Summary  </h4></div>
				<div class="panel-body">
					<?php
						echo "Number of Neighbour Relationship types = ".$numberOfRelTypes."</br>";
						echo "Total Number of Neighbour Relationship types = ".$countsof_result_array_neighbour_config."</br>";
						echo "Number of neighbours from input file = ".$numberOfNeighbours."</br>";
						echo "Total number of neighbour MML rows created = ".$numberOfNeighboursTotal."</br>";
					?>
				</div>
			</div>				
			
			
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4>RAW MML for: <?php echo " ".$selectedFile?> </h4>	
					
					
					<form action='' method='post'> 
					<!--<input type='submit' name='use_button' value='Export to CSV' /> 
					<input type='submit' name='use_button' value='Export to CSV' /> 
					<button type="submit" class="btn btn-success" >Export to CSV</button>-->
					<button type="submit" class="btn btn-success" name='use_button' >Export to CSV</button>
					</form>
					
					
				</div>
				
				<div class="panel-body">
					<?php
								
									
						$neighbourOutputArray = createNeighbourListMML($selectedFile);

						//PRINT ENTIRE ARRAY
						//======================
						 // echo '<pre>';
						 // print_r($neighbourOutputArray);
						 // echo '</pre>';

						//PRINT JUST MML FROM ARRAY
						//======================
							
						if(isset($selectedFile))	
							foreach ($neighbourOutputArray as $k => $v){
								echo $neighbourOutputArray[$k]['MML']."</br>";
							}	else echo "No input file selected"
									
									 	
					?>
				</div>
			</div>
        

	















	</div> <!-- /container -->   
			
			
			
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


		<!-- EXPORT TO TEXT FILE -->
		<!-- =================== -->

		<?php
			function saveToText_Append($fileName, $textToExport){
				file_put_contents($fileName, $textToExport, FILE_APPEND | LOCK_EX);
			}

			function saveToText($fileName, $textToExport){
				//file_put_contents($file, $textToExport | LOCK_EX);
				file_put_contents($fileName, $textToExport);
			}
		?>

   

		<?php



			$userName = "PU";
			$outputFolder = "../../DataFiles/NeighboutExportFiles/";
			$fileName = $selectedFile;
			$datetime =  date("Ymd")."_".date("hi");
			$fileExt = ".txt";


			$fullfinename = $outputFolder.$userName."-".$fileName."-".$datetime.$fileExt;
			

					if(isset($selectedFile))	
						foreach ($neighbourOutputArray as $k => $v){
							$newText = $neighbourOutputArray[$k]['MML']."\r\n";
							saveToText_Append($fullfinename, $newText);							
					}	


		?>

		<!-- /EXPORT TO TEXT FILE -->
		<!-- =================== -->
















    <!-- jQuery -->
    <!--<script src="../bower_components/jquery/dist/jquery.min.js"></script>-->

    <!-- Bootstrap Core JavaScript -->
   	<!--<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>-->

    <!-- Metis Menu Plugin JavaScript -->
    <!--<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>-->

    <!-- Custom Theme JavaScript -->
    <!--<script  src="../dist/js/sb-admin-2.js"></script>-->






	<script // type="text/javascript" language="javascript" class="init">

		$(document).ready(function() {
			$('#example').dataTable( {
				"scrollY": 500,
				"scrollX": true
				//buttons: [
        		//	'copy', 'excel', 'pdf'
        		//]
			} );
		} );

	</script>

</body>

</html>


