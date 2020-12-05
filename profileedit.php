<?php 
  require 'db_connection.php';
  session_start();
  if(isset($_POST['profile']))
  { 
    if(isset($_POST['username'])) 
    {    $sql=mysqli_query($db_connection,"UPDATE `users` SET `username` = '".$_POST['username']."' WHERE `user_id` = ".$_SESSION['u_id']);
      
    }
    if(isset($_POST['phoneno'])) 
    {    $sql=mysqli_query($db_connection,"UPDATE users  SET user_phoneno = '".$_POST['phoneno']."'
        WHERE user_id = ".$_SESSION['u_id']);
    }
    if(isset($_POST['email'])) 
    {    $sql=mysqli_query($db_connection,"UPDATE users  SET user_email = '".$_POST['email']."'
        WHERE user_id = ".$_SESSION['u_id']);
    }
    if(isset($_POST['country'])) 
    {    $sql=mysqli_query($db_connection,"UPDATE users  SET country = '".$_POST['country']."'
        WHERE user_id = ".$_SESSION['u_id']);
    }
    if(isset($_POST['state'])) 
    {    $sql=mysqli_query($db_connection,"UPDATE users  SET 'state' = '".$_POST['state']."'
        WHERE user_id = ".$_SESSION['u_id']);
    }
      // header("location: artistprofile (2).php");
      }
     else{
      
      // IF FIELDS ARE EMPTY
      $error_message = "Please fill in all the required fields.";
      }
      
      
