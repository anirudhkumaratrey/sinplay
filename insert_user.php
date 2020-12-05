<?php
if(isset($_POST['register']))
{// CHECK IF FIELDS ARE NOT EMPTY
if(!empty(trim($_POST['name'])) && !empty(trim($_POST['email'])) && !empty($_POST['password'])  && !empty(trim($_POST['email']))){


// Escape special characters.

$username = mysqli_real_escape_string($db_connection, htmlspecialchars($_POST['name']));
$user_email = mysqli_real_escape_string($db_connection, htmlspecialchars($_POST['email']));
$user_phoneno = mysqli_real_escape_string($db_connection, htmlspecialchars($_POST['number']));

//IF EMAIL IS VALID
if (filter_var($user_email, FILTER_VALIDATE_EMAIL)) {  

// CHECK IF EMAIL IS ALREADY REGISTERED
$check_email = mysqli_query($db_connection, "SELECT `user_email` FROM `users` WHERE user_email = '$user_email'");

if(mysqli_num_rows($check_email) > 0){    
$message = "This Email Address is already registered. Please Try another.";
}
else{
// IF EMAIL IS NOT REGISTERED
/* -- 

-- */

$user_hash_password = password_hash($_POST['password'],PASSWORD_DEFAULT);

// INSER USER INTO THE DATABASE
$insert_user = mysqli_query($db_connection, "INSERT INTO `users` (username, user_email, user_password,user_phoneno) VALUES ('$username', '$user_email', '$user_hash_password','$user_phoneno')");

if($insert_user === TRUE){
$success_message1 = "Thanks! You have successfully signed up.";
}
else{
$message = "Oops! something wrong.";
}
}
}
else{
// IF EMAIL IS INVALID
$message = "Invalid email address";
}
}
else{
// IF FIELDS ARE EMPTY
$message = "Please fill in all the required fields.";
}
}

?>