<?php include //'includes/layouts/header.php';?>
<?php include "databaseconnection.php" ;?>

<html>
<head>
	<title>Neighbour Config table</title>
	<style type="text/css">

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

        <h3 class="text-muted">Neighbour Config Table</h3>

					<table id="example" class="display" cellspacing="0" width="100%">
					  <thead>
						<tr>
							<th>Source_Carrier</th>
							<th>tech</th>
							<th>aStatus</th>
							<th>AddRmvMod</th>
							<th>RelTYPE_name</th>
							<th>SOURCE_type</th>
							<th>NEIGBOUR_type</th>	
							<th>RelTYPE_ADJ</th>
							<th>CellType_1</th>
							<th>CellType_2</th>
							<th>CellType_3</th>
							<th>CellType_4</th>
							<th>CellType_5</th>
							<th>CellType_6</th>
							<th>CellType_7</th>
							<th>CellType_8</th>
							<th>CellType_9</th>
							<th>CellType_10</th>
							<th>CellType_11</th>
							<th>CellType_12</th>
							<th>CellType_13</th>
							<th>CellType_14</th>
							<th>CellType_15</th>
							<th>CellType_16</th>
							<th>CellType_17</th>
							<th>CellType_18</th>
							<th>CellType_19</th>
							<th>CellType_20</th>
							<th>MMLString_First</th>					  
							<th>MMLValueName_First</th>
							<th>MMLString_Second</th>
							<th>MMLValueName_Second</th>
							<th>MMLString_Third</th>
							<th>MMLValueName_Third</th>
							<th>MMLString_Fourth</th>
							<th>MMLValueName_Fourth</th>
							<th>MMLString_Fifth</th>
							<th>MMLValueName_Fifth</th>					  
							<th>MMLString_Sixth</th>
							<th>MMLValueName_Sixth</th>
							<th>MMLString_Seventh</th>
							<th>MMLValueName_Seventh</th>
							<th>MMLString_Eighth</th>
							<th>MMLValueName_Eighth</th>
							<th>MMLString_Ninth</th>
							<th>MMLValueName_Ninth</th>
							<th>MMLString_Tenth</th>					  
							<th>MMLValueName_Tenth</th>
							<th>BHO</th>
							<th>SIB11Ind</th>
							<th>IdleQoffset1sn_or_Qoffset1sn</th>
							<th>IdleQoffset2sn_or_Qrxlevmin</th>
							<th>SIB12Ind</th>
							<th>HOCovPrio_or_BlindHOPrio</th>
							<th>BlindHOQualityCondition</th>
							<th>DRDEcN0Threshhold</th>					  
							<th>DrdOrLdrFlag</th>
							<th>MBDRFLAG</th>
						</tr>
					  </thead>
					  
					  <tbody>
					  <?php
						$sql = 'SELECT * FROM neighbour_config ORDER BY id DESC';
						$result = mysqli_query($conn, $sql);
						$result_array = array();
						//echo $sql;
						if (mysqli_num_rows($result) > 0) {
							// output data of each row
							while($row = mysqli_fetch_assoc($result)) {
									//echo "CellName: " . $row["CELLNAME"]. " - CellID: " . $row["CELLID"]. "<br>";
									//$result_array[] = $row;
									//$result_array[$row['CELLNAME']] = $row["CELLID"];
									$result_array[] = $row;
							}
							
							// print result from each array row 
							// echo '<pre>';	
							// print_r($result_array);    
							// echo '</pre>';

						} else {
							echo "0 results from neighbour config table";
						}
					 
					   foreach ($result_array as $row) {
								echo '<tr>';
								echo '<td>'. $row['Source_Carrier'] . '</td>';
								echo '<td>'. $row['tech'] . '</td>';
								echo '<td>'. $row['aStatus'] . '</td>';
								echo '<td>'. $row['AddRmvMod'] . '</td>';
								echo '<td>'. $row['RelTYPE_name'] . '</td>';
								echo '<td>'. $row['SOURCE_type'] . '</td>';
								echo '<td>'. $row['NEIGHBOUR_type'] . '</td>';	
								echo '<td>'. $row['RelTYPE_ADJ'] . '</td>';	
								echo '<td>'. $row['CellType_1'] . '</td>';	
								echo '<td>'. $row['CellType_2'] . '</td>';	
								echo '<td>'. $row['CellType_3'] . '</td>';	
								echo '<td>'. $row['CellType_4'] . '</td>';	
								echo '<td>'. $row['CellType_5'] . '</td>';	
								echo '<td>'. $row['CellType_6'] . '</td>';	
								echo '<td>'. $row['CellType_7'] . '</td>';	
								echo '<td>'. $row['CellType_8'] . '</td>';	
								echo '<td>'. $row['CellType_9'] . '</td>';	
								echo '<td>'. $row['CellType_10'] . '</td>';	
								echo '<td>'. $row['CellType_11'] . '</td>';	
								echo '<td>'. $row['CellType_12'] . '</td>';	
								echo '<td>'. $row['CellType_13'] . '</td>';	
								echo '<td>'. $row['CellType_14'] . '</td>';	
								echo '<td>'. $row['CellType_15'] . '</td>';	
								echo '<td>'. $row['CellType_16'] . '</td>';	
								echo '<td>'. $row['CellType_17'] . '</td>';	
								echo '<td>'. $row['CellType_18'] . '</td>';
								echo '<td>'. $row['CellType_19'] . '</td>';
								echo '<td>'. $row['CellType_20'] . '</td>';
								echo '<td>'. $row['MMLString_First'] . '</td>';
								echo '<td>'. $row['MMLValueName_First'] . '</td>';							
								echo '<td>'. $row['MMLString_Second'] . '</td>';
								echo '<td>'. $row['MMLValueName_Second'] . '</td>';
								echo '<td>'. $row['MMLString_Third'] . '</td>';
								echo '<td>'. $row['MMLValueName_Third'] . '</td>';
								echo '<td>'. $row['MMLString_Fourth'] . '</td>';
								echo '<td>'. $row['MMLValueName_Fourth'] . '</td>';
								echo '<td>'. $row['MMLString_Fifth'] . '</td>';
								echo '<td>'. $row['MMLValueName_Fifth'] . '</td>';
								echo '<td>'. $row['MMLString_Sixth'] . '</td>';
								echo '<td>'. $row['MMLValueName_Sixth'] . '</td>';
								echo '<td>'. $row['MMLString_Seventh'] . '</td>';
								echo '<td>'. $row['MMLValueName_Seventh'] . '</td>';
								echo '<td>'. $row['MMLString_Eighth'] . '</td>';
								echo '<td>'. $row['MMLValueName_Eighth'] . '</td>';
								echo '<td>'. $row['MMLString_Ninth'] . '</td>';							
								echo '<td>'. $row['MMLValueName_Ninth'] . '</td>';
								echo '<td>'. $row['MMLString_Tenth'] . '</td>';
								echo '<td>'. $row['MMLValueName_Tenth'] . '</td>';
								echo '<td>'. $row['BHO'] . '</td>';
								echo '<td>'. $row['SIB11Ind'] . '</td>';
								echo '<td>'. $row['IdleQoffset1sn_or_Qoffset1sn'] . '</td>';
								echo '<td>'. $row['IdleQoffset2sn_or_Qrxlevmin'] . '</td>';
								echo '<td>'. $row['SIB12Ind'] . '</td>';
								echo '<td>'. $row['HOCovPrio_or_BlindHOPrio'] . '</td>';
								echo '<td>'. $row['BlindHOQualityCondition'] . '</td>';
								echo '<td>'. $row['DRDEcN0Threshhold'] . '</td>';
								echo '<td>'. $row['DrdOrLdrFlag'] . '</td>';
								echo '<td>'. $row['MBDRFLAG'] . '</td>';
								echo '</tr>';
					   }          
					  ?>
					  </tbody>
					</table>
				
				
	
			<div class="panel panel-default">
				<div class="panel-heading">Neighbour Config table</div>
				<div class="panel-body">
				The table can be modified using SQLs
				</div>
			</div>
        

	</div> <!-- /container -->   

</body>
</html>

<?php //include 'includes/layouts/footer.php';?>