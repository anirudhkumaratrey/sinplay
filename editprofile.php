<?php 
  require 'db_connection.php';
  if(isset($_POST['edit']))
  {
    if(isset($_POST['username'])) //update name field
    {    $sql=mysqli_query($db_connection,"UPDATE users  SET username = $_POST
                WHERE user_id = $_SESSION[uid]");
          

    }

    if(isset($_POST['phoneno'])) //update name field
    {    $sql=mysqli_query($db_connection,"UPDATE users  SET user_phoneno = $_POST
                WHERE user_id = $_SESSION[uid]");
          

    }

    if(isset($_POST['update_password']))
    {
    $query = mysqli_query($db_connection, "SELECT * FROM `users`   WHERE user_id = $_SESSION[uid]");

    if(mysqli_num_rows($query) > 0){
    
    $row = mysqli_fetch_assoc($query);
    $user_db_pass = $row['user_password'];
    
      
      // VERIFY PASSWORD
      $check_password = password_verify($_POST['old_password'], $user_db_pass);
      
      if($check_password === TRUE){
        $sql=mysqli_query($db_connection,"UPDATE users  SET user_password = $_POST
                WHERE user_id = $_SESSION[uid]");
            $error_message = "Password is Updated";
      
       exit;
      
      }
      else{
      // INCORRECT PASSWORD
      $error_message = "Incorrect old Password.";
      
      }
      
      }
      else{
    
      }
    }
      if(isset($_POST['image']))
      {
        $imagepath='img/';      // directory to store the uploaded files
        $max_size = 30000;          // maximum file size, in KiloBytes
        $alwidth = 900;            // maximum allowed width, in pixels
        $alheight = 800;

        $query1 = mysqli_query($db_connection, "SELECT profile_cover FROM `users` WHERE user_id = '$_session[u_id]'");
         $querys1=mysqli_fetch_array($query1);
     

        if(isset($_FILES['sthumbnail']) && strlen($_FILES['sthumbnail']['name'])> 1) {
          $imagepath = $imagepath . basename( $_FILES['sthumbnail']['name']); 
          list($width, $height) = getimagesize($_FILES['sthumbnail']['tmp_name']);
          $err = '';
          $upload_image = mysqli_query($db_connection, "UPDATE users  SET profile_cover ='$imagepath'");
          if($upload_image=== TRUE){
            echo "Thanks! You have successfully updated the Profile Picture.";
            unlink($querys1);
            }
            else{
            echo "Oops! something wrong.";
            }
            if(isset($width) && isset($height) && ($width >= $alwidth || $height >= $alheight)) $err .= '<br/>The maximum Width x Height must be: '. $alwidth. ' x '. $alheight;
            if($err == '') {
              if(move_uploaded_file($_FILES['sthumbnail']['tmp_name'], $imagepath)) {
                if(isset($width) && isset($height)) 
                {echo '<br/>Image Width x Height: '. $width. ' x '. $height;
                echo '<br/><br/>Image address: <b>http://'.$_SERVER['HTTP_HOST'].rtrim(dirname($_SERVER['REQUEST_URI']), '\\\\/').'/'.$imagepath.'</b>';
                }
              } 
            }
          }
        }



    }
     else{
      
      // IF FIELDS ARE EMPTY
      $error_message = "Please fill in all the required fields.";
      }
      
      
