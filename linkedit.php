<?php 
  require 'db_connection.php';
  session_start();
  if(isset($_POST['update']))
  {
    if(isset($_POST['facebooklink'])) 
    {    $sql=mysqli_query($db_connection," UPDATE users SET facebooklink = '".$_POST['facebooklink']."' WHERE user_id = ".$_SESSION['u_id']);
echo $_POST['facebooklink'];
    }
    if(isset($_POST['twitterlink'])) 
    {    $sql=mysqli_query($db_connection,"UPDATE users  SET twitterlink = '".$_POST['twitterlink']."'
        WHERE user_id = ".$_SESSION['u_id']);
    }
    if(isset($_POST['pinterestlink'])) 
    {    $sql=mysqli_query($db_connection,"UPDATE users  SET pinterestlink = '".$_POST['pinterestlink']."'
        WHERE user_id = ".$_SESSION['u_id']);
    }
    if(isset($_POST['youtubelink'])) 
    {    $sql=mysqli_query($db_connection,"UPDATE users  SET youtubelink = '".$_POST['youtubelink']."'
        WHERE user_id = ".$_SESSION['u_id']);
    }
      if(isset($_FILES['coverimage']))
      {
        $imagepath='img/';      // directory to store the uploaded files
        $max_size = 30000;          // maximum file size, in KiloBytes
        $alwidth = 900;            // maximum allowed width, in pixels
        $alheight = 800;

        $query1 = mysqli_query($db_connection, "SELECT profile_cover FROM `users` WHERE user_id = ".$_SESSION['u_id']);
         $querys1=mysqli_fetch_assoc($query1);
     

        if(isset($_FILES['coverimage'])) {
         
          $imagepath = $imagepath . basename( $_FILES['coverimage']['name']); 
          list($width, $height) = getimagesize($_FILES['coverimage']['tmp_name']);
          $err = '';
          echo $imagepath;
          $upload_image = mysqli_query($db_connection, "UPDATE users  SET profile_cover = '".$imagepath."'
          WHERE user_id = ".$_SESSION['u_id']);
          echo $upload_image;
          if($upload_image=== TRUE){
            echo "Thanks! You have successfully updated the Profile Picture.";
            unlink($querys1['profile_cover']);
            }
            else{
            echo "Oops! something wrong.";
            }
            if($err == '') {
              if(move_uploaded_file($_FILES['coverimage']['tmp_name'], $imagepath)) {
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
      
      // IF FIELDS ARE EMPTY
      $error_message = "Please fill in all the required fields.";
      }
      
      
