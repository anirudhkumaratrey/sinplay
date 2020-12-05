<?php 
  require 'db_connection.php';
  session_start();
  if(isset($_POST['s_id'])){ 
    
   $sid= $_POST['s_id'];
   $count=0;
   $position=0;
   $index=0;
   $flag=0;
   $uid=$_SESSION['u_id'];
   $select=mysqli_query($db_connection,"SELECT * from rplaylist where u_id=".$uid);
   
   $se=mysqli_query($db_connection,"SELECT singer from songs where s_id=".$sid);
   while($sequl=mysqli_fetch_assoc($se)){
       echo $sequl['singer'];
   }
   
   
   if(mysqli_num_rows($select)<10){
      
    while($sql1=mysqli_fetch_array($select)){
        $position++;
        if($sid==$sql1['s_id'])
        { 
            $delete=mysqli_query($db_connection,"DELETE FROM rplaylist WHERE   s_id='".$sid."' AND u_id = ".$uid);
            $flag=1;
        break;
        }
    }
    $index=$position;
    $select1=mysqli_query($db_connection,"SELECT * from rplaylist where u_id=".$uid);
    if($flag==1){
        while($sql2=mysqli_fetch_array($select1)){
            $index++;
            $update=mysqli_query($db_connection,"UPDATE rplaylist SET ind = ".$position." WHERE   ind = '".$index."' AND u_id=".$uid);
           $position++;
        }
        $select2=mysqli_query($db_connection,"SELECT * from rplaylist where u_id=".$uid);
        $num=mysqli_num_rows($select2)+1;
        $update=mysqli_query($db_connection,"INSERT INTO rplaylist(ind,s_id,u_id) VALUES('".$num."','".$sid."','".$uid."')");
    }
        else{
            $select1=mysqli_query($db_connection,"SELECT * from rplaylist where u_id=".$uid);
            $num=mysqli_num_rows($select1)+1;

            $update=mysqli_query($db_connection,"INSERT INTO rplaylist(ind,s_id,u_id) VALUES('".$num."','".$sid."','".$uid."')");
            }
        
    }
else{
    $select=mysqli_query($db_connection,"SELECT * from rplaylist where u_id=".$uid);
      while($sql1=mysqli_fetch_array($select)){
        $position++;
        if($sid==$sql1['s_id'])
         { 
             $delete=mysqli_query($db_connection,"DELETE FROM rplaylist WHERE   s_id='".$sid."' AND u_id = ".$uid);
         $flag=1;
         break;
         }
     }
     $select1=mysqli_query($db_connection,"SELECT * from rplaylist where u_id=".$uid);
     $index=$position;
     if($flag==1){
         while($sql2=mysqli_fetch_array($select1)){
             $index++;
             
             $update=mysqli_query($db_connection,"UPDATE rplaylist SET ind = ".$position." WHERE   ind = '".$index."' AND u_id=".$uid);
           $position++;
           
         }
         $select2=mysqli_query($db_connection,"SELECT * from rplaylist where u_id=".$uid);
         $num=mysqli_num_rows($select2)+1;
         $update=mysqli_query($db_connection,"INSERT INTO rplaylist(ind,s_id,u_id) VALUES('".$num."','".$sid."','".$uid."')");
     }else{
        $delete=mysqli_query($db_connection,"DELETE FROM rplaylist WHERE ind ='1' AND u_id=".$uid);
        $index=1;
        $position=1;
        $select1=mysqli_query($db_connection,"SELECT * from rplaylist where u_id=".$uid);
            while($sql2=mysqli_fetch_array($select1)){
                $index++;
                $update=mysqli_query($db_connection,"UPDATE rplaylist SET ind = ".$position." WHERE   ind = '".$index."' AND u_id=".$uid);
            $position++;
            }
            $update=mysqli_query($db_connection,"INSERT INTO rplaylist(ind,s_id,u_id) VALUES('10','".$sid."','".$uid."')");
   
    }

}}
?>