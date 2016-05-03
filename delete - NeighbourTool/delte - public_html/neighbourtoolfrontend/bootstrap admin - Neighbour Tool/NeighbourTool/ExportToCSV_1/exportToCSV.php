

<?php
if (!empty($_GET['act'])) {
    echo "Hello world!"; //Your code here
			$myArray = array (
				'm' => 'monkey', 
				'foo' => 'bar', 
				);

			$filename = "mylog9.txt";
			$text = "";
			foreach($myArray as $key => $value)
			{
				//$text .= $key." : ".$value."\r\n";
				$text .= $value."\r\n";
			}
			$fh = fopen($filename, "w") or die("Could not open log file.");
			fwrite($fh, $text) or die("Could not write file!");
			fclose($fh);	
  } else {
	  
?>	
	<form action="exportToCSV.php" method="get">
	  <input type="hidden" name="act" value="run">
	  <input type="submit" value="Run me now!">
	</form>

<?php
  }
?>



