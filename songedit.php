<?php 
  require 'db_connection.php';
  session_start();
  $songid=$_POST['songid'];
  if(isset($_POST['edit']))
  {
    if($_POST['sname']!="") 
    {    $sql=mysqli_query($db_connection,"UPDATE `songs` SET `name` = '".$_POST['sname']."' WHERE `s_id` = ".$songid);

    }
    if($_POST['artist']!="") 
    {    $sql=mysqli_query($db_connection,"UPDATE `songs` SET `singer` = '".$_POST['artist']."' WHERE `s_id` = ".$songid);

    }
    if($_POST['feat']!="")
    {   $sql=mysqli_query($db_connection,"UPDATE `songs` SET `feat` = '".$_POST['feat']."' WHERE `s_id` = ".$songid);

    }
    if(isset($_FILES['thumbnail']) && strlen($_FILES["thumbnail"]["tmp_name"])> 1)
      {
        $imagepath='img/';      // directory to store the uploaded files
        $max_size = 30000;          // maximum file size, in KiloBytes
        $alwidth = 900;            // maximum allowed width, in pixels
        $alheight = 800;

        $query1 = mysqli_query($db_connection, "SELECT image FROM songs WHERE s_id = ".$songid);
         $querys1=mysqli_fetch_assoc($query1);
         echo $querys1['image'];
     

        if(isset($_FILES['thumbnail'])) {

          $imagepath = $imagepath . basename( $_FILES['thumbnail']['name']); 
          list($width, $height) = getimagesize($_FILES['thumbnail']['tmp_name']);
          $err = '';
        
          $upload_image = mysqli_query($db_connection, "UPDATE songs  SET image = '".$imagepath."'
          WHERE s_id = ".$songid);
        
          if($upload_image){

            echo "Thanks! You have successfully updated the Thumbnail.";
            unlink($querys1['image']);
            }
            else{
            echo "Oops! something wrong.";
            }
            if($err == '') {
              
              if(move_uploaded_file($_FILES['thumbnail']['tmp_name'], $imagepath)) {
                if(isset($width) && isset($height)) 
                {echo '<br/>Image Width x Height: '. $width. ' x '. $height;
                echo '<br/><br/>Image address: <b>http://'.$_SERVER['HTTP_HOST'].rtrim(dirname($_SERVER['REQUEST_URI']), '\\\\/').'/'.$imagepath.'</b>';
                }
              } 
            }
          }
        }
 header("location: artistprofile.php");
      }
     else{
      $delete=mysqli_query($db_connection,"DELETE FROM songs WHERE s_id=".$songid);
      header("location: artistprofile.php");
      }
      
      
