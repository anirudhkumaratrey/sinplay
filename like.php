<?php 
  require 'db_connection.php';
  session_start();
  
  if(isset($_POST['s_id'])){ 
	$s_id=$_POST['s_id'];
  $row=mysqli_query($db_connection,"SELECT likes from songs WHERE s_id='".$s_id."'");
	$li=mysqli_fetch_assoc($row);
	$like=$li['likes'];
	$like=$like +1;
   $query=mysqli_query($db_connection,"UPDATE songs SET Likes = '".$like."'WHERE s_id=".$s_id );
    $query1= mysqli_query($db_connection,"INSERT INTO likes (s_id,userid) VALUES ('".$s_id."' , '".$_SESSION['u_id']."')"); 
  
   echo $like;
}
else{
	$sid=$_POST['sid'];
  $row=mysqli_query($db_connection,"SELECT likes from songs WHERE s_id=".$sid);
	$li=mysqli_fetch_assoc($row);
	$like=$li['likes'];
	$like=$like -1;
   $query = mysqli_query($db_connection,"DELETE FROM likes  WHERE userid = '".$_SESSION['u_id']."'  AND s_id = ".$sid);
   $query1 = mysqli_query($db_connection,"UPDATE songs SET Likes = '".$like."'WHERE s_id=".$sid) ;
   echo $like;
  }
?>