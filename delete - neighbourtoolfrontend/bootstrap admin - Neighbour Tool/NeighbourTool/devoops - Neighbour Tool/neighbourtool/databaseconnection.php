<?php   

 //==================================
 //DATABASE CONNECTION
 //==================================
$which_server = "work";
 
 if ($which_server == "work") {	 
	//WORK DATABASE
	$servername = "172.21.200.37";
	$username = "patrickurlich";
	$password = "forPUonly";
	$dbname = "ranPU";
} else if ($which_server == "ecoweb") {	
	//ECO DATABASE
     $servername = "79.170.44.87";
     $username = "cl40-urlich";
     $password = "pr0d1gy";
     $dbname = "cl40-urlich";
}
    
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>