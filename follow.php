<?php 
  require 'db_connection.php';
  session_start();
  if(isset($_POST['follow']))
{ 
   $query = "INSERT INTO follow (sender,receiver) VALUES ('".$_SESSION['u_id']."', '".$_POST['follow']."')";
   $statement = $db_connection->prepare($query);
   if($statement->execute())
   {
      $sub_query = "
      UPDATE users SET followers_count = followers_count + 1 WHERE user_id = '".$_POST['follow']."'
      ";
      $statement = $db_connection->prepare($sub_query);
      $statement->execute();
      $sql="select * from users where user_id =".$_POST['follow'];
      $rows=mysqli_query($db_connection,$sql);
      $row=mysqli_fetch_array($rows);
      
      $notification_text = '<b>' .   $row['username'] . '</b> has follow you.';

      $insert_query = "
      INSERT INTO notification 
      (notification_receiver_id, notification_text, read_notification) 
      VALUES ('".$_POST['follow']."', '".$notification_text."', 'no')
      ";

      $statement = $db_connection->prepare($insert_query);
      $statement->execute();
    }
  }
else{
  
   $query = "
   DELETE FROM follow 
   WHERE sender = '".$_SESSION['u_id']."' 
   AND receiver = '".$_POST['Unfollow']."'
   ";
   $statement = $db_connection->prepare($query);
   if($statement->execute())
   {
    $sub_query = "
    UPDATE users SET followers_count = followers_count - 1 WHERE user_id = '".$_POST['unfollow']."'
    ";
    $statement = $db_connection->prepare($sub_query);
   $statement->execute();

      $sql="select * from users where user_id =".$_POST['unfollow'];
      $rows=mysqli_query($db_connection,$sql);
     $row = mysqli_fetch_array($rows);
      $notification_text = '<b>' .  $row['username'] . '</b> has unfollow you.';
      
      $insert_query = "
      INSERT INTO notification 
      (notification_receiver_id, notification_text, read_notification) 
      VALUES ('".$_POST['follow']."', '".$notification_text."', 'no')
      ";
      $statement = $db_connection->prepare($insert_query);

      $statement->execute();
   }
  }


  //  function Get_user_name($db_connection, $user_id)
  //  {
  //     $query = "
  //     SELECT username FROM users 
  //     WHERE user_id = '".$user_id."'
  //     ";
   
  //     $statement = $db_connection->prepare($query);
   
  //     $statement->execute();
   
  //     $result = $statement->fetchAll();
   
  //     foreach($result as $row)
  //     {
  //        return $row["username"];
  //     }
  //  }
   

function count_total_post_like($db_connection, $post_id)
{
	$query = "
	SELECT * FROM like 
	WHERE post_id = '".$post_id."'
	";

	$statement = $db_connection->prepare($query);

	$statement->execute();

	return $statement->rowCount();
}

?>
<!-- <script>
$(document).on('click', '.like_button', function(){
   var post_id = $(this).data('post_id');
   var action = 'like';
   $.ajax({
       url:"action.php",
       method:"POST",
       data:{post_id:post_id, action:action},
       success:function(data)
       {
           alert(data);
           fetch_post();
       }
   })
});

$('body').tooltip({
   selector: '.like_button',
   title: fetch_post_like_user_list,
   html: true,
   placement: 'right'
}); -->

// function fetch_post_like_user_list()
// {
//    var fetch_data = '';
//    var element = $(this);
//    var post_id = element.data('post_id');
//    var action = 'like_user_list';
//    $.ajax({
//        url:"action.php",
//        method:"POST",
//        async: false,
//        data:{post_id:post_id, action:action},
//        success:function(data)
//        {
//            fetch_data = data;
//        }
//    });
//    return fetch_data;
// }
