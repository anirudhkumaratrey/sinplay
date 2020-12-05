<?php
require "db_connection.php";
session_start();



$a=$_POST['checkbox'];
$sid=$_POST['s_id'];
$report=$_POST['report'];
$uid=$_SESSION['u_id']; 
$comment=$_POST['comment'];
if( isset($_POST['report']))
{
    foreach ($a as $value) {
        $reported=$reported."-".$value;

   
      }
      $sql="INSERT into report (s_id,u_id,content,comment) values('$sid','$uid','$reported','$comment')";
      if(mysqli_query($db_connection,$sql))
  {
      header('Location:redashboard.php?suc');
  }
  else
  {

    header('Location:redashboard.php?msg');
  }


}
    
?>