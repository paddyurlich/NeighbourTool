<?PHP

include 'getFileList_function.php';

  // list files in the current directory
  //$dirlist = getFileList(".");
  //$dirlist = getFileList("./");

  // a subdirectory of the current directory called images
  //$dirlist = getFileList("images");
  //$dirlist = getFileList("images/");
  //$dirlist = getFileList("./images");
  $dirlist = getFileList("../../NeighbourInputFiles/");
  //$dirlist = getFileList("../../../");

  // using an absolute path
  //$dirlist = getFileList("{$_SERVER['DOCUMENT_ROOT']}/images");
  //$dirlist = getFileList("{$_SERVER['DOCUMENT_ROOT']}/images/");
  
  
  //print_r ($dirlist) ;
  
  //echo '<pre>'; print_r($dirlist); echo '</pre>';
  
?>



<?php
//echo $dirlist[1]["name"]; 
?>

<?php 

  	echo '<select class="form-control" name="filefromdownloaddir">';
    foreach($dirlist as $k => $v){
  		echo $v["name"];
  		echo "<br>";
  	}
    echo "</select>"

?>


<input type="submit" class="btn btn-success">
                        
                          <?php 
                            //if(get("filefromdownloaddir")) {
                             
                              // echo "   you have selected: ". $selectedFile;
                                                         
                              //}
                            
                          ?>