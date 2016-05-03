


<?php 
include "neighbourtoolFunction.php";

$neighbourOutputArray = createNeighbourListMML("neighbours.csv");

//PRINT ENTIRE ARRAY
//======================
// echo '<pre>';
// print_r($neighbourOutputArray);
// echo '</pre>';

//PRINT JUST MML FROM ARRAY
//======================
	foreach ($neighbourOutputArray as $k => $v){
		echo $neighbourOutputArray[$k]['MML']."</br>";
	}		 
 ?>