<?php //include '../neighbourtool/includes/layouts/header.php';?>
<?php include "../neighbourtool/databaseconnection.php" ;?>


    <script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>


<div class="row">
	<div class="col-xs-12">	
		
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<!--<i class="fa fa-linux"></i>-->
					<span>Neighbour Tool </span>
				</div>
				<div class="box-icons">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
					<a class="close-link">
						<i class="fa fa-times"></i>
					</a>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content no-padding table-responsive">
				<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-2">
				
				
				
					<thead>
						<tr>
							<th><label><input type="text" name="Source_Carrier" value="Source_Carrier"class="search_init" /></label></th>
							<th><label><input type="text" name="tech" value="tech"class="search_init" /></label></th>
							<th><label><input type="text" name="aStatus" value="aStatus"class="search_init" /></label></th>
							<th><label><input type="text" name="AddRmvMod" value="AddRmvMod"class="search_init" /></label></th>
							<th><label><input type="text" name="RelTYPE_name" value="RelTYPE_name"class="search_init" /></label></th>
							<th><label><input type="text" name="SOURCE_type" value="SOURCE_type"class="search_init" /></label></th>
							<th><label><input type="text" name="NEIGBOUR_type" value="NEIGBOUR_type"class="search_init" /></label></th>
							<th><label><input type="text" name="RelTYPE_ADJ" value="RelTYPE_ADJ"class="search_init" /></label></th>
							<th><label><input type="text" name="CellType_1" value="CellType_1"class="search_init" /></label></th>
							<th><label><input type="text" name="CellType_2" value="CellType_2"class="search_init" /></label></th>
							<th><label><input type="text" name="CellType_3" value="CellType_3"class="search_init" /></label></th>
							<th><label><input type="text" name="CellType_4" value="CellType_4"class="search_init" /></label></th>
							<th><label><input type="text" name="CellType_5" value="CellType_5"class="search_init" /></label></th>
							<th><label><input type="text" name="CellType_6" value="CellType_6"class="search_init" /></label></th>
							<th><label><input type="text" name="CellType_7" value="CellType_7"class="search_init" /></label></th>
							<th><label><input type="text" name="CellType_8" value="CellType_8"class="search_init" /></label></th>
							<th><label><input type="text" name="CellType_9" value="CellType_9"class="search_init" /></label></th>
							<th><label><input type="text" name="CellType_10" value="CellType_10"class="search_init" /></label></th>
							<th><label><input type="text" name="CellType_11" value="CellType_11"class="search_init" /></label></th>
							<th><label><input type="text" name="CellType_12" value="CellType_12"class="search_init" /></label></th>
							<th><label><input type="text" name="CellType_13" value="CellType_13"class="search_init" /></label></th>
							<th><label><input type="text" name="CellType_14" value="CellType_14"class="search_init" /></label></th>
							<th><label><input type="text" name="CellType_15" value="CellType_15"class="search_init" /></label></th>
							<th><label><input type="text" name="CellType_16" value="CellType_16"class="search_init" /></label></th>
							<th><label><input type="text" name="CellType_17" value="CellType_17"class="search_init" /></label></th>
							<th><label><input type="text" name="CellType_18" value="CellType_18"class="search_init" /></label></th>
							<th><label><input type="text" name="CellType_19" value="CellType_19"class="search_init" /></label></th>
							<th><label><input type="text" name="CellType_20" value="CellType_20"class="search_init" /></label></th>
							<th><label><input type="text" name="MMLString_First" value="MMLString_First"class="search_init" /></label></th>
							<th><label><input type="text" name="MMLValueName_First" value="MMLValueName_First"class="search_init" /></label></th>
							<th><label><input type="text" name="MMLString_Second" value="MMLString_Second"class="search_init" /></label></th>
							<th><label><input type="text" name="MMLValueName_Second" value="MMLValueName_Second"class="search_init" /></label></th>
							<th><label><input type="text" name="MMLString_Third" value="MMLString_Third"class="search_init" /></label></th>
							<th><label><input type="text" name="MMLValueName_Third" value="MMLValueName_Third"class="search_init" /></label></th>
							<th><label><input type="text" name="MMLString_Fourth" value="MMLString_Fourth"class="search_init" /></label></th>
							<th><label><input type="text" name="MMLValueName_Fourth" value="MMLValueName_Fourth"class="search_init" /></label></th>
							<th><label><input type="text" name="MMLString_Fifth" value="MMLString_Fifth"class="search_init" /></label></th>
							<th><label><input type="text" name="MMLValueName_Fifth" value="MMLValueName_Fifth"class="search_init" /></label></th>
							<th><label><input type="text" name="MMLString_Sixth" value="MMLString_Sixth"class="search_init" /></label></th>
							<th><label><input type="text" name="MMLValueName_Sixth" value="MMLValueName_Sixth"class="search_init" /></label></th>
							<th><label><input type="text" name="MMLString_Seventh" value="MMLString_Seventh"class="search_init" /></label></th>
							<th><label><input type="text" name="MMLValueName_Seventh" value="MMLValueName_Seventh"class="search_init" /></label></th>
							<th><label><input type="text" name="MMLString_Eighth" value="MMLString_Eighth"class="search_init" /></label></th>
							<th><label><input type="text" name="MMLValueName_Eighth" value="MMLValueName_Eighth"class="search_init" /></label></th>
							<th><label><input type="text" name="MMLString_Ninth" value="MMLString_Ninth"class="search_init" /></label></th>
							<th><label><input type="text" name="MMLValueName_Ninth" value="MMLValueName_Ninth"class="search_init" /></label></th>
							<th><label><input type="text" name="MMLString_Tenth" value="MMLString_Tenth"class="search_init" /></label></th>
							<th><label><input type="text" name="MMLValueName_Tenth" value="MMLValueName_Tenth"class="search_init" /></label></th>
							<th><label><input type="text" name="BHO" value="BHO"class="search_init" /></label></th>
							<th><label><input type="text" name="SIB11Ind" value="SIB11Ind"class="search_init" /></label></th>
							<th><label><input type="text" name="IdleQoffset1sn_or_Qoffset1sn" value="IdleQoffset1sn_or_Qoffset1sn"class="search_init" /></label></th>
							<th><label><input type="text" name="IdleQoffset2sn_or_Qrxlevmin" value="IdleQoffset2sn_or_Qrxlevmin"class="search_init" /></label></th>
							<th><label><input type="text" name="SIB12Ind" value="SIB12Ind"class="search_init" /></label></th>
							<th><label><input type="text" name="HOCovPrio_or_BlindHOPrio" value="HOCovPrio_or_BlindHOPrio"class="search_init" /></label></th>
							<th><label><input type="text" name="BlindHOQualityCondition" value="BlindHOQualityCondition"class="search_init" /></label></th>
							<th><label><input type="text" name="DRDEcN0Threshhold" value="DRDEcN0Threshhold"class="search_init" /></label></th>
							<th><label><input type="text" name="DrdOrLdrFlag" value="DrdOrLdrFlag"class="search_init" /></label></th>
							<th><label><input type="text" name="MBDRFLAG" value="MBDRFLAG"class="search_init" /></label></th>
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
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
// Run Datables plugin and create 3 variants of settings
 function AllTables(){
	//TestTable1();
	TestTable2();
	//TestTable3();
	 //LoadSelect2Script(MakeSelect2);
 }
 // function MakeSelect2(){
	// $('select').select2();
	// $('.dataTables_filter').each(function(){
	// $(this).find('label input[type=text]').attr('placeholder', 'Search');
 // });
 //}
 $(document).ready(function() {
	//Load Datatables and run plugin on tables 
	LoadDataTablesScripts(AllTables);

	//Add Drag-n-Drop feature
	//WinMove(); 

 });



 </script>

 
 
