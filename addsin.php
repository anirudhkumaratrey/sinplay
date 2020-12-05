<?php 
include 'db_connection.php';
session_start();
if(isset($_POST['s_id']))
{
$sid=$_POST['s_id'];
$uid=$_SESSION['u_id'];
$check=mysqli_query($db_connection,"SELECT sinboard from songs where s_id=".$sid);
$check1=mysqli_fetch_assoc($check);
$checklikes=mysqli_query($db_connection,"SELECT Likes from songs where s_id=".$sid);
$checklikes1=mysqli_fetch_assoc($checklikes);
if($check1['sinboard']==1)
{ if($checklikes1['Likes']>30)
    {
$timestamp=mysqli_query($db_connection,"SELECT sin_time from sinboard WHERE Ind='1' ");
$start_date1=mysqli_fetch_assoc($timestamp);
$date = date('Y-m-d H:i:s');
$start_date= new DateTime($start_date1['sin_time']);
$since_start = $start_date->diff(new DateTime($date));
$year=$since_start->m*12*30*24;
$month=$since_start->m*30*24;
$days=$since_start ->d*24;
$hours=$since_start->h;
$diff=$hours+$days+$month+$year;
$select=mysqli_query($db_connection,"SELECT * from sinboard ");
$Ind=mysqli_num_rows($select);
if($diff>1){
        $count=0;
        $position=0;
        $Ind=0;
        $flag=0;
        $select=mysqli_query($db_connection,"SELECT * from sinboard ");
        
        $Ind=mysqli_num_rows($select);
        
        if($Ind>10){
                 $delete=mysqli_query($db_connection,"DELETE FROM sinboard WHERE Ind= '1'");
                 $flag=1;
             }
         
        
         $select1=mysqli_query($db_connection,"SELECT * from sinboard ");
         if($flag==1){
            $Ind=1;
            $position=1;
             while($sql2=mysqli_fetch_array($select1)){
                 $Ind++;
                 $update=mysqli_query($db_connection,"UPDATE sinboard SET Ind = ".$position.",sin_time=".$date."  WHERE   Ind = '".$Ind."'" );
                $position++;
             }
             $update=mysqli_query($db_connection,"INSERT INTO sinboard(Ind,s_id,u_id) VALUES('.$Ind.','".$sid."','".$uid."')");
         }
        
        else{
            $Ind++;
            $update=mysqli_query($db_connection,"INSERT INTO sinboard(Ind,s_id,u_id) VALUES('.$Ind.','".$sid."','".$uid."')");
        }
        echo "Added to sinboard";
    }
    else {
        echo "Song Will be on Sinboard Soon";
        }
}
else{
    echo "Song Already Uploaded Once Get More Likes To Upload Again";
}
}

else if($checklikes1['Likes']>15)
{

    $timestamp=mysqli_query($db_connection,"SELECT sin_time from sinboard WHERE Ind='1'");
    $start_date1=mysqli_fetch_assoc($timestamp);
    $date = date('Y-m-d H:i:s');
    $start_date= new DateTime($start_date1['sin_time']);
    $since_start = $start_date->diff(new DateTime($date));
    $year=$since_start->m*12*30*24;
    $month=$since_start->m*30*24;
    $days=$since_start ->d*24;
    $hours=$since_start->h;
    $diff=$hours+$days+$month+$year;
    $select=mysqli_query($db_connection,"SELECT * from sinboard ");
    $Ind=mysqli_num_rows($select);
    if($diff>1){
            $count=0;
            $position=0;
            $Ind=0;
            $flag=0;
            $select=mysqli_query($db_connection,"SELECT * from sinboard ");
            $Ind=mysqli_num_rows($select);
            if($Ind>10){
                     $delete=mysqli_query($db_connection,"DELETE FROM sinboard WHERE Ind= '1'");
                     $flag=1;

                 }
             $select1=mysqli_query($db_connection,"SELECT * from sinboard ");
             
             if($flag==1){
                $Ind=1;
                $position=1;
                 while($sql2=mysqli_fetch_array($select1)){
                     $Ind++;
                     $update=mysqli_query($db_connection,"UPDATE sinboard SET Ind = ".$position.",sin_time=".$date."  WHERE   Ind = '".$Ind."'" );
                    $position++;
                 }
                
                $update=mysqli_query($db_connection,"INSERT INTO sinboard (Ind,s_id,u_id) VALUES('.$Ind.','".$sid."','".$uid."')");
                $update1=mysqli_query($db_connection,"UPDATE songs SET sinboard = '1' WHERE   s_id = '".$sid."'");
                }
            else{
                $Ind++;
                $update=mysqli_query($db_connection,"INSERT INTO sinboard (Ind,s_id,u_id) VALUES('.$Ind.','".$sid."','".$uid."')");
                $update1=mysqli_query($db_connection,"UPDATE songs SET sinboard = '1' WHERE   s_id = '".$sid."'");
        
            }
        }
        echo "Added To sinboard";
}
else
{
echo "GET More Likes For Sinboard";
}

}

?>