<?php
error_reporting(E_ALL);

$success = false;
   if(isset($_FILES['upload'])){
      $errors= array();
      $file_name = $_FILES['upload']['name'];
      $file_size = $_FILES['upload']['size'];
      $file_tmp = $_FILES['upload']['tmp_name'];
      $file_type = $_FILES['upload']['type'];
      //$file_ext=strtolower(end(explode('.',$_FILES['upload']['name'])));
      
      $extensions= array("txt","csv","jpg","jepg");
      
      //if(in_array($file_ext,$extensions)=== false){
       //  $errors[]="extension not allowed, please choose a TXT or CSV file.";
      //}

      sftp://patrick@172.21.200.37/home/patrick/public_html/Neighbour_Tool/kartik_plugin_fileuploader/bootstrap-fileinput-master/examples/uploads
      
      if($file_size > 9999999) {
         $errors[]='File size must be less than 10 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"../../../../NeighbourInputFiles/".$file_name);   
         //move_uploaded_file($file_tmp,"172.21.200.37/home/patrick/public_html/Neighbour_Tool/kartik_plugin_fileuploader/bootstrap-fileinput-master/examples/uploads/".$file_name);
         //echo "Success";
         
         $message = "Success - file uploaded !!";
         $success = true;
         echo "<script type='text/javascript'>alert('$message');</script>";
         

      }else{
         $message = $errors;
         echo "<script type='text/javascript'>alert('$message');</script>";

      print_r($message);

      }
   }

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    	  <script src="../js/fileinput.js" type="text/javascript"></script>
    	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>
    </head>

    <body>
        <div class="container kv-main">
            <div class="page-header">
            <h1> Neighbour Input List Upload  </h1>
            <form action = "" method = "POST" enctype = "multipart/form-data">
                <input id="file-0a" name="upload" class="file" type="file" multiple data-min-file-count="1">
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-default">Reset</button>                
            </form>        
        </div>
    </body>

</html>