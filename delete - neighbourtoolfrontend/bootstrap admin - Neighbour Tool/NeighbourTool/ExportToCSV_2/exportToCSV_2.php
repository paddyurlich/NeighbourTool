
<form action='' method='post'> 
<input type='submit' name='use_button' value='something' /> 
</form>


<?php 

if(isset($_POST['use_button'])) 
{ 
			$myArray = array (
				'm' => 'monkey', 
				'foo' => 'bar', 
				);

			$filename = "mylog12.txt";
			$text = "";
			foreach($myArray as $key => $value)
			{
				//$text .= $key." : ".$value."\r\n";
				$text .= $value."\r\n";
			}
			$fh = fopen($filename, "w") or die("Could not open log file.");
			fwrite($fh, $text) or die("Could not write file!");
			fclose($fh);
			echo "export complete for: ".$filename;
} 

?>