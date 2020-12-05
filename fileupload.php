<?php
include("db_connection.php");


$uploadpath = 'mp31/';
$imagepath='img/';      // directory to store the uploaded files
$max_size = 30000;          // maximum file size, in KiloBytes
$alwidth = 900;            // maximum allowed width, in pixels
$alheight = 800;           // maximum allowed height, in pixels
$allowtype = array('wav', 'mp3');        // allowed extensions

if(isset($_FILES['song']) && strlen($_FILES['song']['name']) && isset($_FILES['sthumbnail']) && strlen($_FILES['sthumbnail']['name'])> 1) {
  $imagepath = $imagepath . basename( $_FILES['sthumbnail']['name']);       // gets the file name
  $uploadpath = $uploadpath . basename( $_FILES['song']['name']);       // gets the file name
  $sepext = explode('.', strtolower($_FILES['song']['name']));
  $type = end($sepext);       // gets extension
  list($width, $height) = getimagesize($_FILES['sthumbnail']['tmp_name']);     // gets image width and height
  $err = '';         // to store the errors
  $name=mysqli_real_escape_string($db_connection, htmlspecialchars($_POST['name']));
  $feat=mysqli_real_escape_string($db_connection, htmlspecialchars($_POST['category']));
  $singer=mysqli_real_escape_string($db_connection, htmlspecialchars($_POST['singer']));
  $upload_song = mysqli_query($db_connection, "INSERT INTO `songs` ( name, feat, singer,audio,image) VALUES ('$name', '$feat', '$singer','$uploadpath','$imagepath')");
  if($upload_song === TRUE){
    echo "Thanks! You have successfully signed up.";
    }
    else{
    echo "Oops! something wrong.";
    }

  // Checks if the file has allowed type, size, width and height (for images)
  if(!in_array($type, $allowtype)) $err .= 'The file: <b>'. $_FILES['song']['name']. '</b> not has the allowed extension type.';
  if($_FILES['song']['size'] > $max_size*1000) $err .= '<br/>Maximum file size must be: '. $max_size. ' KB.';
  if(isset($width) && isset($height) && ($width >= $alwidth || $height >= $alheight)) $err .= '<br/>The maximum Width x Height must be: '. $alwidth. ' x '. $alheight;

  // If no errors, upload the image, else, output the errors
  if($err == '') {
    if(move_uploaded_file($_FILES['song']['tmp_name'], $uploadpath)) {
      if(move_uploaded_file($_FILES['sthumbnail']['tmp_name'], $uploadpath)) { 
     
      echo 'File: <b>'. basename( $_FILES['song']['name']). '</b> successfully uploaded:';
      echo '<br/>File type: <b>'. $_FILES['song']['type'] .'</b>';
      echo '<br />Size: <b>'. number_format($_FILES['song']['size']/1024, 3, '.', '') .'</b> KB';
      if(isset($width) && isset($height)) echo '<br/>Image Width x Height: '. $width. ' x '. $height;
      echo '<br/><br/>Image address: <b>http://'.$_SERVER['HTTP_HOST'].rtrim(dirname($_SERVER['REQUEST_URI']), '\\\\/').'/'.$imagepath.'</b>';
      echo '<br/><br/>song address: <b>http://'.$_SERVER['HTTP_HOST'].rtrim(dirname($_SERVER['REQUEST_URI']), '\\\\/').'/'.$uploadpath.'</b>';
    }
    
  }
else echo '<b>Unable to upload the file.</b>';
}

  else echo $err;
}
?> 