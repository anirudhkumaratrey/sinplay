<?php
include 'db_connection.php';
session_start();
$selected=$_POST['selected'];

$sql="SELECT * FROM chat Where reciever_name=$selected OR  sender_name=$selected";
// echo $selected;
                 
$query = mysqli_query($db_connection,$sql);
if($selected!=0){
	if(mysqli_num_rows($query)>0)
	{
		while($row= mysqli_fetch_assoc($query))	
		{
      if($row['reciever_name']==$_SESSION['u_id']&&$row['sender_name']==$selected)
      {
          $sql2="SELECT profile_cover FROM `users` Where user_id='".$row['sender_name']."'";
        $query2 = mysqli_query($db_connection,$sql2);
        while($row2= mysqli_fetch_assoc($query2))	
        {
          $row2=$row2['profile_cover'];
        } 
  echo"

        <div class='media w-50 mb-3'><img src='.$row2.' alt='user' width='50' class='rounded-circle'>
          <div class='media-body ml-3'>
            <div class='bg-light rounded py-2 px-3 mb-2'>
              <p class='text-small mb-0 text-muted'>".$row['messages']."</p>
            </div>
            <p class='small text-muted'>".$row['created_on']."</p>
          </div>
        </div>
      ";}
      else if($row['sender_name']==$_SESSION['u_id']&&$row['reciever_name']==$selected){
      echo"
        <!-- Reciever Message-->
        <div class='media w-50 ml-auto mb-3'>
          <div class='media-body'>
            <div class='bg-primary rounded py-2 px-3 mb-2'>
              <p class='text-small mb-0 text-white' style='overflow: none; text: no-wrap;'>". $row['messages']."</p>
            </div>
            <p class='small text-muted' style='overflow: none; text: no-wrap;'>".$row['created_on']."</p>
          </div>
        </div>
        "

        ;}
            }
            echo
            "<div style='background:white;'>
            <form  onsubmit='return send()'  method='post' style='bottom: 0px; width:94%; position: absolute;  ' class='bg-light'>
            <div class='input-group ' style='text-align-last:left'>
            <div class='row'>
              <input  type='hidden' id='reciver_id' name='reciver_id' value=".$selected." >
              <input  type='text' id='msg' name='msg' placeholder='Type a message' aria-describedby='button-addon2' class='py-2 bg-light ml-4 ' style='width: 27.5vw;'>
                <button onclick=''   type='submit' name='submit' class='btn btn-link'> <i class='fa fa-paper-plane'></i></button>
            </div>  
            </div>
          </form>
          </div>
            "
    
      
        ;}
    }

?>