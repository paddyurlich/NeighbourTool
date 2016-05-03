<?php 
function get($name){
	return isset($_REQUEST[$name]) ? $_REQUEST[$name] : " ";
}

function is_valid_index($index,$array) {
	return $index >= 0 && $index < count ($array);
}


?>

<!doctype html>
<html>
 <head>
 <title>Neighbour Tool</title>

 <meta charset="utf-8" />
 <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1" />

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

 <style>

 </style>

 </head>

 <body>

	<form>
		<?php

			$directory = 'c:';
			$scanned_directory = array_diff(scandir($directory), array('..', '.'));

			 // echo "<pre>";
			 // print_r($scanned_directory);
			 // echo "</pre>";


			echo '<select name="filefromdownloaddir">';
				for ($i = 0; $i<count($scanned_directory);$i++)
				{
					echo '<option value ='. ($i + 1). '>'. $scanned_directory[$i].'</option>';
				}
				echo "</select>"
		?>
		<input type="submit">
	</form>


	<?php	
		if(get("filefromdownloaddir")) {
			$filefromdownloaddir_id = get("filefromdownloaddir");
			if(is_valid_index($filefromdownloaddir_id -1,$scanned_directory)) {
			 echo "you have selected ". $scanned_directory[$filefromdownloaddir_id -1];
			} else {
				echo '<span style="color:red">Invalid file index</span>';
			}
		}
	?>





 </body>
</html>