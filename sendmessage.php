<?php

include "db_connection.php";
session_start();
if($_POST)
{
	if(isset($_POST['msg'])&&$_POST['msg']!=""){
		$Sendername=$_SESSION['u_id'];
    $msg=$_POST['msg'];
    $rid=$_POST['reciver_id'];
    
	$sql="INSERT INTO `chat`(`sender_name`, `messages`,`reciever_name`) VALUES ('".$Sendername."', '".$msg."','".$rid."')";

	$query = mysqli_query($db_connection,$sql);
	if($query)
	{	
	}
	else
	{
		echo "Something went wrong";
	}
	
	}else{
	header('Location:profile view (2).php');

    }
	}
?>
<script>
	setTimeout(sharma,1000);
	 function sharma(){
		$.ajax({
			url: "test.php",
			data: {selected:<?php echo $rid?>},
			type: "POST",
			 success:function(data){
			  console.log(data);
			  $('#messagebox').html(data);
			  },
			error:function (value){
			  console.log(value);
			}
		});
	}
	</script>