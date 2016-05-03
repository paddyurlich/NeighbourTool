<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

   
 <!-- neighbour tool includes -->
<?php //include "./functions/getMMLValue.php" ?>
<?php include 'includes/layouts/header.php';?>
<?php include "databaseconnection.php" ?>  
   
   
<html lang="en">
	<head>
		<title>Neighbour Tool - prod - 17/09/2015</title>
		

	<style type="text/css">
		html, body {
    		height: 100%;
    		margin: 0px;
			Padding: 5px;
    	}

    	#container {
    		min-height: 100%; 
			Padding: 5px;
    	}

	</style>
	
	
	<script type="text/javascript" language="javascript" class="init">

		$(document).ready(function() {
			$('#example').dataTable( {
				"scrollY": 500,
				"scrollX": true
			} );
		} );

	</script>	
	
</head>
		
<body>




		
<div id="container">

			<div class="panel panel-primary">
				<div class="panel-heading"><h4>Neighbour Input List Selection</h4></div>
				<div class="panel-body">
						<?php
							// define variables and set to empty values
							$name = $email = $gender = $comment = $website = "";

							if ($_SERVER["REQUEST_METHOD"] == "POST") {
							   $neighbourlistinputfile = test_input($_POST["neighbourlistinputfile"]);
							}

							function test_input($data) {
							   $data = trim($data);
							   $data = stripslashes($data);
							   $data = htmlspecialchars($data);
							   return $data;
							}
						?>
						
					
						<form class="form-inline" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
						   <label class="control-label col-sm-2" for="email">Neighbour List input file name:</label>
							<div class="col-sm-10">
								<input type="text" name="neighbourlistinputfile">
							</div>
						   </br></br>
						  <!-- <input type="submit" name="submit" value="Submit"> 	-->	
						   
							<div class="form-group"> 
								<div class="col-sm-offset-1 col-sm-10">
									<button type="submit" class="btn btn-success">Submit</button>
							    </div>
							</div>		
						</form>					
						
							
						<hr>					


						<?php

							
							if (!isset($neighbourlistinputfile)){
								$neighbourInputFileName = "neighbours.csv";
							} else $neighbourInputFileName = $neighbourlistinputfile;
							
							echo "<h6>Neighbour List Input Selected:</h6> ".$neighbourInputFileName;
							
							echo "<br>";
						?>
					
				</div>
			</div>
		
		
		


<?php
//================================================	
//open input file 
//================================================

	$neighbourInputFolderName = "../../../NeighbourInputFiles/";
	//$neighbourInputFileName = "neighbours.csv";
	
	$file = $neighbourInputFolderName.$neighbourInputFileName;
	
	//echo $file;
	
	$f = fopen($file, "r");
	$neighbour = array();

	while ( $line = fgets($f, 1000) )
	{
		$nl = mb_strtoupper($line,'UTF-8');
		$exp = (explode(",",$nl));
		$neighbour[] = $exp;
	}
	
//**********************************************
//print the output - debug

	$print_neighbour_input = false;
	
		if ($print_neighbour_input == true) {
			
			echo '<pre>';
			print_r($neighbour);
			echo '</pre>';
					
			$counts = count($neighbour);
			//print_r($array1);	
			for ($row = 0; $row < $counts; $row++) {
			   echo "Source cell = ".$neighbour[$row][0]." Neighbour Cell = ".$neighbour[$row][1];
			   echo "</br>";
			} 			
		}
		$counts = count($neighbour);
//**********************************************
?>

<?php
//==================================
//get data from Raido_UCELL table and put in array
//==================================     

$sql = "SELECT CELLNAME,CELLID,neid,UARFCNDOWNLINK,UARFCNUPLINK, PSCRAMBCODE,LAC, RAC FROM Radio_UCELL";
$result = mysqli_query($conn, $sql);
$result_array_Radio_UCELL = array();
//echo $sql;
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
			$result_array_Radio_UCELL[$row['CELLNAME']] = $row;
    }
} else {
    echo "0 results from Radio_UCELL table";
} 
	//echo '<pre>';
	// print_r($result_array_Radio_UCELL['PRE-000-CW04-U09-1-1']['CELLID']);
	//print_r($result_array_Radio_UCELL);    
	// echo '</pre>';	
?>

<?php
//==================================
//get data from Radio_UEXT2GCELL table and put in array
//==================================     

$sql = "SELECT neid,CID,GSMCELLINDEX,GSMCELLNAME FROM Radio_UEXT2GCELL";
$result = mysqli_query($conn, $sql);
$result_array_Radio_UEXT2GCELL = array();
//echo $sql;
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
			$result_array_Radio_UEXT2GCELL[$row['GSMCELLNAME']] = $row;
    }
} else {
    echo "0 results from Radio_UEXT2GCELL table";
} 
	//echo '<pre>';
	// print_r($result_array_Radio_UEXT2GCELL['PRE-000-CW04-U09-1-1']['CELLID']);
	 //print_r($result_array_Radio_UEXT2GCELL);    
	 //echo '</pre>';	
?>


<?php
//==================================
//get data from Radio_GEXT3GCELL table and put in array
//==================================     

$sql = "SELECT neid,EXT3GCELLID,EXT3GCELLNAME FROM Radio_GEXT3GCELL";
$result = mysqli_query($conn, $sql);
$result_array_Radio_GEXT3GCELL = array();
//echo $sql;
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
			$result_array_Radio_GEXT3GCELL[$row['EXT3GCELLNAME']] = $row;
    }
} else {
    echo "0 results from Radio_GEXT3GCELL table";
} 
	//echo '<pre>';
	//print_r($result_array_Radio_GEXT3GCELL['PRE-000-CW04-U09-1-1']['CELLID']);
	 //print_r($result_array_Radio_GEXT3GCELL);    
	 //echo '</pre>';	

?>

<?php
//==================================
//get data from Raio_GCELL table and put in array
//==================================     

$sql = "SELECT CELLNAME,CELLID,neid FROM Radio_GCELL";
$result = mysqli_query($conn, $sql);
$result_array_Radio_GCELL = array();
//echo $sql;
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
			$result_array_Radio_GCELL[$row['CELLNAME']] = $row;
    }
} else {
    echo "0 results from Radio_GCELL table";
}
	//echo '<pre>';
	// print_r($result_array_Radio_GCELL['PRE-000-CW04-U09-1-1']['CELLID']);
	 //print_r($result_array_Radio_GCELL);    
	// echo '</pre>';	

?>

<?php
//==================================
//get data from L_CELL table and put in array
//==================================     

$sql = "SELECT CELLNAME,CELLID,neid,DLEARFCN, PHYCELLID FROM L_CELL";
$result = mysqli_query($conn, $sql);
$result_array_L_CELL = array();
//echo $sql;
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
			$result_array_L_CELL[$row['CELLNAME']] = $row;
    }
} else {
    echo "0 results from L_CELL table";
}
	//echo '<pre>';
	// print_r($result_array_L_CELL['PRE-000-CW04-U09-1-1']['CELLID']);
	 //print_r($result_array_L_CELL);    
	 //echo '</pre>';
?>

<?php
//==================================
//get data from L_CNOPERATORTA table and put in array
//==================================     

$sql = "SELECT neid, TAC, flacode FROM L_CNOPERATORTA";
$result = mysqli_query($conn, $sql);
$result_array_L_CNOPERATORTA = array();
//echo $sql;
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
			$result_array_L_CNOPERATORTA[$row['flacode']] = $row;
    }
} else {
    echo "0 results from L_CNOPERATORTA table";
}
	//echo '<pre>';
	// print_r($result_array_L_CNOPERATORTA['PRE-000-CW04-U09-1-1']['CELLID']);
	 //print_r($result_array_L_CNOPERATORTA);    
	 //echo '</pre>';
?>

<?php
//==================================
//get data from L_ENODEBFUNCTION table and put in array
//==================================     

$sql = "SELECT neid, ENODEBID, flacode FROM L_ENODEBFUNCTION";
$result = mysqli_query($conn, $sql);
$result_array_L_ENODEBFUNCTION = array();
//echo $sql;
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
			$result_array_L_ENODEBFUNCTION[$row['flacode']] = $row;
    }              
} else {
    echo "0 results from L_ENODEBFUNCTION table";
}
	 // echo '<pre>';
	 // print_r($result_array_L_ENODEBFUNCTION['PRE-000-CW04-U09-1-1']['CELLID']);
	 // print_r($result_array_L_ENODEBFUNCTION);    
	 // echo '</pre>';	

?>

<?php
//==================================
//get data from neighbour_config table and put in array
//==================================     

$sql = "SELECT * FROM neighbour_config";
$result = mysqli_query($conn, $sql);
$result_array_neighbour_config = array();
//echo $sql;
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
			//echo "CellName: " . $row["CELLNAME"]. " - CellID: " . $row["CELLID"]. "<br>";
			//$result_array_neighbour_config[] = $row;
			//$result_array_neighbour_config[$row['CELLNAME']] = $row["CELLID"];
			$result_array_neighbour_config[$row['RelTYPE_name']] = $row;
    }  

		// print result from each array row 
		//echo '<pre>';	
		//print_r($result_array_neighbour_config);    
		//print_r(array_keys($result_array_neighbour_config));
		//echo '</pre>';
		//echo array_keys($result_array_neighbour_config)[0];
              
} else {
    echo "0 neighbour config table results";
}
?>

<?php
//==================================
//get data from neighbour_config_table_lookup table and put in array
//==================================     

$sql = "SELECT * FROM neighbour_config_table_lookup";
$result = mysqli_query($conn, $sql);
$result_array_neighbour_config_table_lookup = array();
//echo $sql;
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
			$result_array_neighbour_config_table_lookup[$row['MMLValueName']] = $row;
    }
    
		//print result from each array row 
		//echo '<pre>';	
		//print_r($result_array_neighbour_config_table_lookup);    
		//print_r(array_keys($result_array_neighbour_config_table_lookup));
		//echo '</pre>';
		//echo array_keys($result_array_neighbour_config_table_lookup)[0];

              
} else {
    echo "no data collected from neighbour_config_table_lookup";
}
?>

<?php
//==================================
//get data from RNC_Lookup table and put in array
//==================================     

$sql = "SELECT * FROM RNC_Lookup";
$result = mysqli_query($conn, $sql);
$result_array_RNC_Lookup = array();
//echo $sql;
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
			$result_array_RNC_Lookup[$row['RNC_name']] = $row;
    }
    
		//print result from each array row 
		//echo '<pre>';	
		//print_r($result_array_RNC_Lookup);    
		//print_r(array_keys($result_array_RNC_Lookup));
		//echo '</pre>';
		//echo array_keys($result_array_RNC_Lookup)[0];

              
} else {
    echo "no data collected from RNC_Lookup";
}
?>





<?php
//==================================
//get data from sql_audit_nw_ucells table and put in array - CELL TYPE ARRAY 
//==================================     

$sql = "SELECT * FROM sql_audit_nw_ucells";
$result = mysqli_query($conn, $sql);
$result_array_sql_audit_nw_ucells = array();
//echo $sql;
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
			$result_array_sql_audit_nw_ucells[$row['flacode']] = $row;
    }
    
		//print result from each array row 
		//echo '<pre>';	
		//print_r($result_array_sql_audit_nw_ucells);    
		//print_r(array_keys($result_array_sql_audit_nw_ucells));
		//echo '</pre>';
		//echo array_keys($result_array_sql_audit_nw_ucells)[0];

              
} else {
    echo "no data collected from sql_audit_nw_ucells";
}
?>




<?php
//==============================================================

//MAIN BODY OF PROGRAM =======>  for each reltype ....... do something.......

//==============================================================
	
	//***************************************
	//debugging - show neighbour config table array 
	//***************************************
	
	$showneighbourConfigArray = false;
	if ($showneighbourConfigArray == true){
			$RelTYPE_name_temp = "INTRA - U21f1 -> U21f1";
			echo '<pre>';
			//print_r($result_array_neighbour_config['INTRA - U21f1 -> U21f1']['MMLString_First']);
			print_r($result_array_neighbour_config);    
			//print_r($result_array_neighbour_config[$RelTYPE_name_temp]);
			echo '</pre>';
	}
	//***************************************
		$numberOfRelTypes = 0;
		$numberOfNeighbours = $counts;
		$numberOfNeighboursTotal = 0;
	
		foreach ($result_array_neighbour_config as $relType => $value){
				
			// perform check to see if run value in config table is selected. 
			if ($result_array_neighbour_config[$relType]['run'] == 1) {
				
				$countsof_result_array_neighbour_config = count($result_array_neighbour_config);
				$numberOfRelTypes++;					
				
				$MMLString_AddRmvMod = $result_array_neighbour_config[$relType]["AddRmvMod"];
				$MMLString_First = $result_array_neighbour_config[$relType]["MMLString_First"];
				$MMLString_Second = $result_array_neighbour_config[$relType]["MMLString_Second"];
				$MMLString_Third = $result_array_neighbour_config[$relType]["MMLString_Third"];
				$MMLString_Fourth = $result_array_neighbour_config[$relType]["MMLString_Fourth"];
				$MMLString_Fifth = $result_array_neighbour_config[$relType]["MMLString_Fifth"];
				$MMLString_Sixth = $result_array_neighbour_config[$relType]["MMLString_Sixth"];
				$MMLString_Seventh = $result_array_neighbour_config[$relType]["MMLString_Seventh"];
				$MMLString_Eighth = $result_array_neighbour_config[$relType]["MMLString_Eighth"];
				$MMLString_Ninth = $result_array_neighbour_config[$relType]["MMLString_Ninth"];
				$MMLString_Tenth = $result_array_neighbour_config[$relType]["MMLString_Tenth"]; 
				
				$mmlStringArray = array(
							//trim($MMLString_AddRmvMod),
							trim($MMLString_First),
							trim($MMLString_Second),
							trim($MMLString_Third), 
							trim($MMLString_Fourth), 
							trim($MMLString_Fifth), 
							trim($MMLString_Sixth), 
							trim($MMLString_Seventh), 
							trim($MMLString_Eighth), 
							trim($MMLString_Ninth), 
							trim($MMLString_Tenth)
							);
				
				// echo "<pre>";
				// print_r($mmlStringArray);
				// echo "</pre>";	
				
				$MMLValueName_First = $result_array_neighbour_config[$relType]["MMLValueName_First"];   
				$MMLValueName_Second = $result_array_neighbour_config[$relType]["MMLValueName_Second"];        
				$MMLValueName_Third = $result_array_neighbour_config[$relType]["MMLValueName_Third"];                
				$MMLValueName_Fourth = $result_array_neighbour_config[$relType]["MMLValueName_Fourth"];        
				$MMLValueName_Fifth = $result_array_neighbour_config[$relType]["MMLValueName_Fifth"];        
				$MMLValueName_Sixth = $result_array_neighbour_config[$relType]["MMLValueName_Sixth"];        
				$MMLValueName_Seventh = $result_array_neighbour_config[$relType]["MMLValueName_Seventh"];        
				$MMLValueName_Eighth = $result_array_neighbour_config[$relType]["MMLValueName_Eighth"];        
				$MMLValueName_Ninth = $result_array_neighbour_config[$relType]["MMLValueName_Ninth"];        
				$MMLValueName_Tenth = $result_array_neighbour_config[$relType]["MMLValueName_Tenth"]; 
			
				$mmlValue = array(
							trim($MMLValueName_First),
							trim($MMLValueName_Second),
							trim($MMLValueName_Third), 
							trim($MMLValueName_Fourth), 
							trim($MMLValueName_Fifth), 
							trim($MMLValueName_Sixth), 
							trim($MMLValueName_Seventh), 
							trim($MMLValueName_Eighth), 
							trim($MMLValueName_Ninth), 
							trim($MMLValueName_Tenth)
							);
							
				 //echo "<pre>";
				 //print_r($mmlValue);
				 //echo "</pre>";	

				//reassign mmlValue to SQL table mmlValueNewest table (config table lookup)
				for ( $x = 0; $x <= 9; $x += 1) {
						//echo $mmlValue[$x]."<br>";
						if ($mmlValue[$x] ==  null){
							$mmlValueNewest[$x] = null;
						} else {
							$mmlValueNewest[$x] = $result_array_neighbour_config_table_lookup[$mmlValue[$x]];	
						} 
				}	 
						 
				  //echo "<pre>";
				  //print_r($mmlValueNewest);
				  //echo "</pre>";
					
				//==========================================================================
				// LOOP THROUGH EACH ROW OF NEIGHBOUR INPUT LIST	
				//==========================================================================
				for ($row = 0; $row < $counts; $row++) {			
					// get original source and neighbour cellnames from input
					$Source_cellName = trim($neighbour[$row][0]);							
					$Neighbour_cellName = trim($neighbour[$row][1]);	

					// get cell id for original source and neighbour cellname			
					//$Source_ID = $result_array_Radio_UCELL[$Source_cellName]['CELLID'];
					//$Neighbour_ID = $result_array_Radio_UCELL[$Neighbour_cellName]['CELLID'];				
														
					// get source and neighbour replace string
					$sourceCellStringRaplaceString =  $result_array_neighbour_config[$relType]['SOURCE_type'];
					$neighbourCellStringRaplaceString = $result_array_neighbour_config[$relType]['NEIGHBOUR_type'];					
				
					// replace cellnames with replace string
					$repalacedSource_cellName = substr_replace($Source_cellName,$sourceCellStringRaplaceString, 9, -2);
					$repalacedNeighbour_cellName = substr_replace($Neighbour_cellName,$neighbourCellStringRaplaceString, 9, -2);
					
					$sourceCellFLA = substr($Source_cellName,4,4);
					$neighbourCellFLA = substr($Neighbour_cellName,4,4);
					
					
					// SOURCE CELL TYPE LOGIC - ie match source cell type for each neighbour input row with source cell type from each neighbour-config type. 
								
					$sourceCellType = $result_array_sql_audit_nw_ucells[$sourceCellFLA];	

					$sourceCellType_u09 = $sourceCellType['u09'];
					$sourceCellType_u21_1 = $sourceCellType['u21-f1'];
					$sourceCellType_u21_2 = $sourceCellType['u21-f2'];
					$sourceCellType_u21_3 = $sourceCellType['u21-f3'];
					
					if ((isset($sourceCellType_u09)) && (empty($sourceCellType_u21_1)) && (empty($sourceCellType_u21_2)) && (empty($sourceCellType_u21_3))){
						$finalsourceCellType = "U09-1";
					} else if ((isset($sourceCellType_u09)) && (isset($sourceCellType_u21_1)) && (empty($sourceCellType_u21_2)) && (empty($sourceCellType_u21_3))){
						$finalsourceCellType = "U09-1 U21-1";
					} else if ((isset($sourceCellType_u09)) && (isset($sourceCellType_u21_1)) && (isset($sourceCellType_u21_2)) && (empty($sourceCellType_u21_3))){
						$finalsourceCellType = "U09-1 U21-1 U21-2";
					} else if ((isset($sourceCellType_u09)) && (isset($sourceCellType_u21_1)) && (isset($sourceCellType_u21_2)) && (isset($sourceCellType_u21_3))){
						$finalsourceCellType = "U09-1 U21-1 U21-2 U21-3";			
					} else if ((empty($sourceCellType_u09)) && (isset($sourceCellType_u21_1)) && (empty($sourceCellType_u21_2)) && (empty($sourceCellType_u21_3))){
						$finalsourceCellType = "U21-1";
					} else if ((empty($sourceCellType_u09)) && (isset($sourceCellType_u21_1)) && (isset($sourceCellType_u21_2)) && (empty($sourceCellType_u21_3))){
						$finalsourceCellType = "U21-1 U21-2";
					} else if ((empty($sourceCellType_u09)) && (isset($sourceCellType_u21_1)) && (isset($sourceCellType_u21_2)) && (isset($sourceCellType_u21_3))){
						$finalsourceCellType = "U21-1 U21-2 U21-3";
					} else $finalsourceCellType="Source type not defined";
								
					// echo "The source cell type from neighbour config table are: </br>"
						// . $result_array_neighbour_config[$relType]['CellType_1']."</br>"
						// . $result_array_neighbour_config[$relType]['CellType_2']."</br>"
						// . $result_array_neighbour_config[$relType]['CellType_3']."</br>"
						// . $result_array_neighbour_config[$relType]['CellType_4']."</br>"
						// . $result_array_neighbour_config[$relType]['CellType_5']."</br>"
						// . $result_array_neighbour_config[$relType]['CellType_6']."</br>"
						// . $result_array_neighbour_config[$relType]['CellType_7']."</br>"
						// . $result_array_neighbour_config[$relType]['CellType_8']."</br>"
						// . $result_array_neighbour_config[$relType]['CellType_9']."</br>"
						// . $result_array_neighbour_config[$relType]['CellType_10']."</br>"
						// . $result_array_neighbour_config[$relType]['CellType_11']."</br>"
						// . $result_array_neighbour_config[$relType]['CellType_12']."</br>"
						// . $result_array_neighbour_config[$relType]['CellType_13']."</br>"
						// . $result_array_neighbour_config[$relType]['CellType_14']."</br>"
						// . $result_array_neighbour_config[$relType]['CellType_15']."</br>"
						// . $result_array_neighbour_config[$relType]['CellType_16']."</br>"
						// . $result_array_neighbour_config[$relType]['CellType_17']."</br>"
						// . $result_array_neighbour_config[$relType]['CellType_18']."</br>"
						// . $result_array_neighbour_config[$relType]['CellType_19']."</br>"
						// . $result_array_neighbour_config[$relType]['CellType_20']."</br>";						
						
					if 	(($finalsourceCellType == $result_array_neighbour_config[$relType]['CellType_1']) OR
						($finalsourceCellType == $result_array_neighbour_config[$relType]['CellType_2']) OR
						($finalsourceCellType == $result_array_neighbour_config[$relType]['CellType_3']) OR
						($finalsourceCellType == $result_array_neighbour_config[$relType]['CellType_4']) OR
						($finalsourceCellType == $result_array_neighbour_config[$relType]['CellType_5']) OR
						($finalsourceCellType == $result_array_neighbour_config[$relType]['CellType_6']) OR
						($finalsourceCellType == $result_array_neighbour_config[$relType]['CellType_7']) OR
						($finalsourceCellType == $result_array_neighbour_config[$relType]['CellType_8']) OR
						($finalsourceCellType == $result_array_neighbour_config[$relType]['CellType_9']) OR
						($finalsourceCellType == $result_array_neighbour_config[$relType]['CellType_10']) OR
						($finalsourceCellType == $result_array_neighbour_config[$relType]['CellType_11'])) {
							
						//echo "cell types match</br>";
						$celltypeMatch = true;
					 } else $celltypeMatch = false;			
					
					// END OF SOURCE CELL TYPE LOGIC. 
					//-------------------------------------------------
					
					
					// START OF ADJ OR CO LOGIC - for each neighbour input row.	
					//======================================================================		
					$sourceCellcompare = substr($Source_cellName,4,4).substr($Source_cellName,-1,1);
					$neighbourCellcompare = substr($Neighbour_cellName,4,4).substr($Neighbour_cellName,-1,1);
					//echo "Source Cell compare = ".$sourceCellcompare."</br>";
					//echo "Neighbour Cell compare = ".$neighbourCellcompare."</br>";
					
					if ($sourceCellcompare == $neighbourCellcompare) {
						$ADJorCO = "CO SECTOR";
					} else $ADJorCO = "ADJ CELL";
					//END OF ADJ OR CO LOGIC.
					//------------------------------------------------------------------------
					
					// ADJ OR CO CELL TYPE FROM NEIHGBOUR CONFIG TABLE
					//========================================================
					$Neighbour_config_table_ADJorCO = $result_array_neighbour_config[$relType]['RelTYPE_ADJ'];								
					
					if ($ADJorCO == $Neighbour_config_table_ADJorCO) {
						$ADJorCOMatch = true;
					} else $ADJorCOMatch = false;						
					//-------------------------------------------------------

					// check aStatus from neighbour_config table
					//===========================================
					$aStatusFromNieghbour_config = $result_array_neighbour_config[$relType]['aStatus'];	
					
					
					
					
						
						switch ($sourceCellStringRaplaceString){
								
								case "U09-1":
									$sourceTableToUse = $result_array_Radio_UCELL;
									break;
								case "U21-1":
									$sourceTableToUse = $result_array_Radio_UCELL;
									break;
								case "U21-2":
									$sourceTableToUse = $result_array_Radio_UCELL;
									break;
								case "U21-3":
									$sourceTableToUse = $result_array_Radio_UCELL;
									break;
								case "G09-1":
									$sourceTableToUse = $result_array_Radio_GCELL;
									break;
								case "G18-1":
									$sourceTableToUse = $result_array_Radio_GCELL;
									break;
								case "L18-1":
									$sourceTableToUse = $result_array_L_CELL;
									break;
								default:
									echo "replace value not recognized?? ";
								}
					
					
						switch ($neighbourCellStringRaplaceString){
								
								case "U09-1":
									$neighbourTableToUse = $result_array_Radio_UCELL;
									break;
								case "U21-1":
									$neighbourTableToUse = $result_array_Radio_UCELL;
									break;
								case "U21-2":
									$neighbourTableToUse = $result_array_Radio_UCELL;
									break;
								case "U21-3":
									$neighbourTableToUse = $result_array_Radio_UCELL;
									break;
								case "G09-1":
									$neighbourTableToUse = $result_array_Radio_GCELL;
									break;
								case "G18-1":
									$neighbourTableToUse = $result_array_Radio_GCELL;
									break;
								case "L18-1":
									$neighbourTableToUse = $result_array_L_CELL;
									break;
								default:
									echo "replace value not recognized?? ";
								}										
					
					// check if replaced source cell id exists and if so assign to variable					
					if (!isset($sourceTableToUse[$repalacedSource_cellName]['CELLID'])){
						$replacedSource_ID = null;
					} else $replacedSource_ID = $sourceTableToUse[$repalacedSource_cellName]['CELLID'];					
					
					// check if replaced neighbour cell id exists and if so assign to variables						
					if (!isset($neighbourTableToUse[$repalacedNeighbour_cellName]['CELLID'])){
						$replacedNeighbour_ID = null;
					} else $replacedNeighbour_ID = $neighbourTableToUse[$repalacedNeighbour_cellName]['CELLID'];	

					

					
						
					// THE MAIN IF STATEMENT - if replace source cell and neighbour cell exists
					//============================================================================				
					
					//$replacedSource_ID = TRUE;
					//$replacedNeighbour_ID = TRUE;
					//$ADJorCOMatch = TRUE;
					//$celltypeMatch = TRUE;
					//$aStatusFromNieghbour_config = "CREATE";
					
					
					
					
					
					
					if (isset($replacedSource_ID) && isset($replacedNeighbour_ID) && $ADJorCOMatch == true && $celltypeMatch == true && $aStatusFromNieghbour_config == "CREATE"){
						
						
						$debug = false;
						if ($debug == true) {						
							echo $relType."</br>";
							echo "run value in config table is ".$result_array_neighbour_config[$relType]['run']." for ".$relType."</br>";
							echo "Source cell name = ".$Source_cellName." Neighbour Cell name = ".$Neighbour_cellName."</br>" ;
							//echo "Source cell = ".$Source_ID." Neighbour Cell = ".$Neighbour_ID."</br>" ;
							echo "Replaced Source cell name = ".$repalacedSource_cellName." Replaced Neighbour Cell name = ".$repalacedNeighbour_cellName."</br>" ;
							echo "Replaced Source cell = ".$replacedSource_ID." Replaced Neighbour Cell = ".$replacedNeighbour_ID."</br>" ;	
							echo "Source cell FLA = ".$sourceCellFLA."</br>";
							echo "Neighbour cell FLA = ".$neighbourCellFLA."</br>";
							echo "Neighbour type ADJ CELL or CO SECTOR = ".$ADJorCO."</br>";
							echo "Neighbour type ADJ CELL or CO SECTOR from Neighbour Config table = ".$Neighbour_config_table_ADJorCO."</br>";	
							echo "Neighbour type ADJ CELL or CO SECTOR match = ".$ADJorCOMatch."</br>";
							echo "Source type = ". $finalsourceCellType."</br>";
							echo "Source type match = ".$celltypeMatch."</br>";
							//echo "<hr>";
						}
						
						
							
							//for each MMLValue Part
							for ( $y = 0; $y <= 9; $y+= 1) {																
								// echo '<pre>';	
								// print_r($result_array_neighbour_config_table_lookup);    
								// echo '</pre>';
								$celltable = (isset($mmlValueNewest[$y]['table'])) ? $mmlValueNewest[$y]['table'] : null;
								$theMMLValue = (isset($mmlValueNewest[$y]['actualTableValue'])) ? $mmlValueNewest[$y]['actualTableValue'] : null;				
								$stringReplaceValue = (isset($mmlValueNewest[$y]['replaceString'])) ? $mmlValueNewest[$y]['replaceString'] : null;
								$sourceORneighbour = (isset($mmlValueNewest[$y]['sourceORneighbour'])) ? $mmlValueNewest[$y]['sourceORneighbour'] : null;
							
								//set [0] for source and [1] for neighbour.
								if ($sourceORneighbour == "source") {
									$sourceORneighbour = "0"; 
								} if ($sourceORneighbour == "neighbour") {
									$sourceORneighbour = "1";
									} if (!isset($sourceORneighbour)) {
									$sourceORneighbour = null;
									}
																	
								$cellName = (isset($neighbour[$row][$sourceORneighbour])) ? trim($neighbour[$row][$sourceORneighbour]): null;									
								$repalacedcellName = substr_replace($cellName,$stringReplaceValue, 9, -2);		
								$repalacedFLA = substr($cellName, 4, 4);						
																						
																										
								//===========================================
								//Main  - build the value MML
								//===========================================
									 
									switch ($celltable){
									
									case "Radio_UCELL":
										$neighbourTableToUseForMMLValueLookup = $result_array_Radio_UCELL;
										break;
									case "Radio_GCELL":
										$neighbourTableToUseForMMLValueLookup = $result_array_Radio_GCELL;
										break;
									case "Radio_GEXT3GCELL":
										$neighbourTableToUseForMMLValueLookup = $result_array_Radio_GEXT3GCELL;
										break;
									case "Radio_UEXT2GCELL":
										$neighbourTableToUseForMMLValueLookup = $result_array_Radio_UEXT2GCELL;
										break;
									case "L_CELL":
										$neighbourTableToUseForMMLValueLookup = $result_array_L_CELL;
										break;
									case "L_ENODEBFUNCTION":
										$neighbourTableToUseForMMLValueLookup = $result_array_L_ENODEBFUNCTION;
										break;
									case "L_CNOPERATORTA":
										$neighbourTableToUseForMMLValueLookup = $result_array_L_CNOPERATORTA;
										break;	
									default:
										//echo $celltable." cell Table not defined !! </br>";
									}
									
									
								
								//LOGIC TO DECIDE WETHER TO USE FLA OF FULL CELLNAME IN LOOKUP
								//==========================================================
								//echo "Cellname or fla = ".$mmlValueNewest[$y]['FLAorCELLNAME']."</br>"; 	
									
								$FLAorCELLNAME = $mmlValueNewest[$y]['FLAorCELLNAME'];
								
								if ($FLAorCELLNAME == "FLA") {
									$FLAorCELLNameToLookup = $repalacedFLA;									
								} if ($FLAorCELLNAME == "CELLNAME")	{
									$FLAorCELLNameToLookup = $repalacedcellName;
								}					
								//======================================================	
									
								
								
								// if statement for RNC_ID ie 1,2,3,4,5 instead of RNC name (RNC01SJH)
								if  ($theMMLValue == "RNC_ID" or $theMMLValue == "nRNC_ID")  {
									$theMMLValue = 'neid';
									$actualMMLValue = isset($neighbourTableToUseForMMLValueLookup[$FLAorCELLNameToLookup][$theMMLValue]) ? $neighbourTableToUseForMMLValueLookup[$FLAorCELLNameToLookup][$theMMLValue] : null;
									$actualMMLValue = $result_array_RNC_Lookup[$actualMMLValue]['RNC_ID'];
									
								} else {
									// MAIN => mml value creation (for each 0 -> 9 values)
									$actualMMLValue = isset($neighbourTableToUseForMMLValueLookup[$FLAorCELLNameToLookup][$theMMLValue]) ? $neighbourTableToUseForMMLValueLookup[$FLAorCELLNameToLookup][$theMMLValue] : null;
								}					
									//TEST IF CELL AND ENTITY ARE PRESENT
									//echo $FLAorCELLNameToLookup;
									//echo "  NEID = ".$result_array_L_CELL[$FLAorCELLNameToLookup]['neid']."</br>";
									
								
								if ((isset($theMMLValue)) && (isset($actualMMLValue))) {
									$cellfound = true;
								} elseif ((isset($theMMLValue)) && (!isset($actualMMLValue))) {
									$cellfound = false;
									$actualMMLValue = "Cell ".$FLAorCELLNameToLookup." not found";
								} else {
									$cellfound = null;
								}
									
									
														
								// echo "Cell table ".$y." = ".$celltable."</br>";
								// echo "The MML value ".$y." = ".$theMMLValue."</br>";
								// echo "String replace value ".$y." = ".$stringReplaceValue."</br>";
								// echo "Source (0) or Neighbour (1) ".$y." = ". $sourceORneighbour."</br>";
								// echo "Cellname ".$y." = ". $cellName."</br>";	
								// echo "Replaced Cellname ".$y." = ". $FLAorCELLNameToLookup."</br>";						
								// echo "Actual MML Value ".$y." = ".$actualMMLValue."</br>";
								// echo "cell found ? = ".$cellfound."</br>"; 						
								// echo "<hr>";
								
								//put each mml value into ant array
								$actualMMLValueArray[$y] = $actualMMLValue;		

									
									//echo $theMMLValue."</br>";
									//echo $actualMMLValue."</br>";								
							}					
							
							// echo all 10 parts of MMLValue and MML String into one line
							
							$MMLstring = $MMLString_AddRmvMod." ".
								$mmlStringArray[0].$actualMMLValueArray[0].
								$mmlStringArray[1].$actualMMLValueArray[1].
								$mmlStringArray[2].$actualMMLValueArray[2].
								$mmlStringArray[3].$actualMMLValueArray[3].
								$mmlStringArray[4].$actualMMLValueArray[4].
								$mmlStringArray[5].$actualMMLValueArray[5].
								$mmlStringArray[6].$actualMMLValueArray[6].
								$mmlStringArray[7].$actualMMLValueArray[7].
								$mmlStringArray[8].$actualMMLValueArray[8].
								$mmlStringArray[9].$actualMMLValueArray[9];
								
								
							//echo $MMLstring."</br>";
							//echo "</br>";	
							
							// echo $MMLString_AddRmvMod." ";
							// for ( $y = 0; $y <= 9; $y+= 1) {
								// echo $mmlStringArray[$y].$actualMMLValueArray[$y];
							// }
							
							// $outputArray[] = [
								// "SourceCell" => $repalacedSource_cellName,
								// "NeighbourCell" => $repalacedNeighbour_cellName,
								// "RelationshipType" => $relType ,
								// "MML" => $MMLstring, 								 
							 // ];
							$outputArray[] = array(
								"SourceCell" => $repalacedSource_cellName,
								"NeighbourCell" => $repalacedNeighbour_cellName,
								"RelationshipType" => $relType ,
								"MML" => $MMLstring, 								 
							 );
							
							$numberOfNeighboursTotal++;
										
							//echo "<hr>";
							
					} // end of if loop = if replace source and neighbour cells are set. 
						
				}	//.........end of loop through each line of neighbour input table.txt

			} // end of if (if run of neighbour_config table =1 then do loop .....)
	
		}	//............end of foreach loop - loop though each neighbour config table line

	
			 // echo '<pre>';	
			 // print_r($outputArray);    
			 // echo '</pre>';
		
			
		//foreach ($outputArray as $k => $v){
		//	echo $outputArray[$k]['MML']."</br>";
		//}		
			
		//echo "<h3> OUTPUT SUMMARY </h3>";
		//echo "<hr>";
		//echo "Number of Neighbour Relationship types = ".$numberOfRelTypes."</br>";
		//echo "Total Number of Neighbour Relationship types = ".$countsof_result_array_neighbour_config."</br>";
		//echo "Number of neighbours from input file = ".$numberOfNeighbours."</br>";
		//echo "Total number of neghbour mml rows created = ".$numberOfNeighboursTotal."</br>";
		
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
						// $sql = 'SELECT * FROM neighbour_config ORDER BY id DESC';
						// $result = mysqli_query($conn, $sql);
						// $result_array = array();
						// //echo $sql;
						// if (mysqli_num_rows($result) > 0) {
							// // output data of each row
							// while($row = mysqli_fetch_assoc($result)) {
									// //echo "CellName: " . $row["CELLNAME"]. " - CellID: " . $row["CELLID"]. "<br>";
									// //$result_array[] = $row;
									// //$result_array[$row['CELLNAME']] = $row["CELLID"];
									// $result_array[] = $row;
							// }
							
							// // print result from each array row 
							// // echo '<pre>';	
							// // print_r($result_array);    
							// // echo '</pre>';

						// } else {
							// echo "0 results from neighbour config table";
						// }
					 
					   foreach ($outputArray as $k => $v){
						echo '<tr>';
						echo '<td>'. $outputArray[$k]['SourceCell'] . '</td>';
						echo '<td>'. $outputArray[$k]['NeighbourCell'] . '</td>';
						echo '<td>'. $outputArray[$k]['RelationshipType'] . '</td>';
						echo '<td>'. $outputArray[$k]['MML'] . '</td>';
						echo '</tr>'; 
					   }
        
					   ?>
					  </tbody>
					</table>
					
				</div>
			</div>	
					
					
					
					
				
			<div class="panel panel-primary">
				<div class="panel-heading"><h4>Output Summary</h4></div>
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
					<h4>RAW MML Data</h4>	
					
					
					<form action='' method='post'> 
					<!--<input type='submit' name='use_button' value='Export to CSV' /> 
					<input type='submit' name='use_button' value='Export to CSV' /> 
					<button type="submit" class="btn btn-success" >Export to CSV</button>-->
					<button type="submit" class="btn btn-success" name='use_button' >Export to CSV</button>
					</form>
					
					
				</div>
				
				<div class="panel-body">
					<?php
						foreach ($outputArray as $k => $v){
							echo $outputArray[$k]['MML']."</br>";
						}	
					?>
				</div>
			</div>
        

	</div> <!-- /container -->   




</body>

<?php 
	if(isset($_POST['use_button'])) 
	{ 
				$myArray = array (
					'm' => 'monkey', 
					'foo' => 'bar', 
					);

				$fileDirectory = "NeighboutExportFiles/";
				$filename = "mylog16.txt";
				$path = $fileDirectory.$filename;
				$text = "";
				
				// foreach($myArray as $key => $value)
				// {
					// //$text .= $key." : ".$value."\r\n";
					// $text .= $value."\r\n";
				// }
				
				
				foreach ($outputArray as $key => $value)		
				{
					//$text .= $key." : ".$value."\r\n";
					$text .= $value."\r\n";
				}
				$fh = fopen($path, "w") or die("Could not open log file.");
				fwrite($fh, $text) or die("Could not write file!");
				fclose($fh);
				echo "export complete for: ".$filename;
	} 
?>





<?php include 'includes/layouts/footer.php';?>