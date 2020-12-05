<?php 
  require 'db_connection.php';
  session_start();
  
  if(isset($_POST['change']))
  { 
    if(isset($_POST['oldpassword'])&& isset($_POST['newpassword']))//update name field
    {    $password=$_POST['oldpassword'];
  $newwpassword=$_POST['newpassword'];

$query = mysqli_query($db_connection, "SELECT * FROM `users` WHERE user_id = ".$_SESSION['u_id']);
$row = mysqli_fetch_assoc($query);
$user_db_pass = $row['user_password'];
$check_password = password_verify($password, $user_db_pass);
if($check_password === TRUE){
  $user_hash_password = password_hash($newwpassword,PASSWORD_DEFAULT);
  $sql=mysqli_query($db_connection,"UPDATE users SET user_password = '".$user_hash_password."' WHERE user_id = ".$_SESSION['u_id']);
                echo "password changed";
}
else{
  echo "wrong old password ";
}
  }
}
     else{
      
      // IF FIELDS ARE EMPTY
      $error_message = "Please fill in all the required fields.";
      }
      
      
