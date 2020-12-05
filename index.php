<?php
session_start();
require 'db_connection.php';
require 'insert_user.php';
require 'login.php';
// IF USER LOGGED IN

if(isset($_SESSION['u_id'])&&!isset($_GET['song'])){
  header('Location: redashboard.php');
}



?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- fonts -->
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">

<!-- bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

 <!-- font-awesome -->

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>


<!-- css -->
<link rel="stylesheet" href="login.css"> 

<!-- favicon -->
<!-- <link rel="apple-touch-icon" type="image/png" href="https://static.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />
<meta name="apple-mobile-web-app-title" content="CodePen"> -->
<!-- <link rel="mask-icon" type="" href="https://static.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111" /> -->






<title>Sinplay</title>

</head>
<body >
<!-- sidebar   -->
<section id="sidebar">

      <div class="bgcolor" >
        <ul class=" text-center">
              <div class="row brand">
                <div class="col-3 full-height full" >
                  <div class="row " >
                  <div class="col-12">
                   <img src="img/logo.png">
                   </div>
                 </div>
                </div>
               </div>
            </li>

            <form action="" method="post">
            <li class=" mar">
              <button class="loginBtn zoom2 loginBtn--facebook" > Login with Facebook</button>
          </li>
        
        
        
        
          <li>
          <button class="loginBtn zoom2  loginBtn--google"> Login with Google</button>
          </li>



        <li>
           <input class="loginphone zoom2 mar-top" type="number" name="phone_no" placeholder="Phone No">
         </li>



         <li>
          <div class="row " >
             <div class="col-5 padd" >
              <hr class="line">
            </div>
            <div class="col-2 padd" >
              <p id="or">OR</p>
            </div>
            <div class="col-5 padd" >
                <hr class="line">
            </div>
          </div>
         </li>

         <li>
           <input class="loginphone zoom2" type="text" name="email" placeholder="Email" required>
         </li>

         <li>
           <input class="loginphone zoom2" type="password" name="password" placeholder="Password " required>
         </li>

         <li >
           <input type="submit" name="login" class="login zoom2" value="Login" />
      
         </li>
         <span class="text-danger"><?php 
      
      if(isset($error_message)){
        echo $error_message;
        }
        ?>
         
         <li>
           <a href="#" id="forget"> Forget ?</a>
        </li>
        
        
        <li>
           <li id=" ">
           <button class="log zoom2 mar-top" id="popup">Sign up for Sinplay</button>
           </li>
        </li>
        
            </form>
      </ul>
      </div>

      
     
    
</section>








<!-- popup -->

<div class="bg-modal">

  <div class="modal-content">
    <button type="button" class="close"><i class="fa fa-times" aria-hidden="true"></i>
    </button>
    <img src="img/logo.png" alt="">
    <form action="" method="POST" id="popup"  method="post"  name="myForm" >
    
      <input class="loginphone zoom2" type="text" name="name"  placeholder="Name" required>
      <input class="loginphone zoom2" type="text" name="email"  placeholder="Email" required >
      <input class="loginphone zoom2" type="text" name="password" placeholder="Password" required >
      <label class="radio-inline"><input type="radio" name="optradio"  >Artist</label>
      <label class="radio-inline"><input type="radio" name="optradio"checked>Fan</label>
      <input class="loginphone zoom2" type="number" name="number"  placeholder="Mobile Number" required >
      <!--<input class="loginphone zoom2" type="text" name=" address"  placeholder="Address" >
      <input class="loginphone zoom2" type="number"  name="zip"  placeholder="Zip Code"   >-->
      <input type="submit" name="register" class="login zoom2" value="Register" />
      <span class="text-danger"><?php 
      if(isset($success_message1)){
      echo $success_message1;
      }
      if(isset($message)){
        echo $message;
        }
       ?></span>
    </form>
  </div>
</div>
<?php  ?>
<section id="cards" >
<!-- cards -->
  <?php
    $sql=mysqli_query($db_connection,"SELECT * FROM songs ORDER BY Likes DESC LIMIT 5");
    while($row=mysqli_fetch_array($sql)){
      ?>
      

      
      <div class="card ">
<div >
    
    <div>
        <h1><?php echo $row['name'];?></h1>
        <h4><?php echo $row['singer'];?></h4>
        <img src="<?php echo $row['image']?>">
        <input id="range" class="level" type="range" value="0" min="0">
        <div class="buttons">
            <button id="pre"><i class="fa fa-arrow-left" style="font-size:24px"></i></button>
            <button id="play"><i class="fa fa-play" style="font-size:24px"></i></button>
            <button id="next"><i class="fa fa-arrow-right" style="font-size:24px"></i></button>
        </div>
        </div>
      </div>
      </div>
   
   
    
  <?php }
     ?>
    </section>
<script>
  document.querySelector("#popup").addEventListener('click',function(){
      document.querySelector(".bg-modal").style.display='flex';
    });
    document.querySelector(".close").addEventListener('click',function close(){
      document.querySelector(".bg-modal").style.display='none';
      console.log(event)
    });
</script>
    <?php
    
     if(isset($_GET['song'])){
      echo  "<audio ontimeupdate='update(this)'  id='myAudio' style='position:fixed; z-index:99; width:110%;display:none; bottom:47px; height:20px; right:-30px;'>
      <source src='".$_GET['song']."' type='audio/ogg'>
      <source src='".$_GET['song']."' type='audio/mpeg'>
      Your browser does not support the audio element.
    </audio>";

      include "bigmusic.html";
       $sql="select * from songs where audio='".$_GET['song']."'";
      
               $rowws=mysqli_query($db_connection,$sql);
               $roww=mysqli_fetch_array($rowws);?>
               <script>
  var currentTime;
  var duration;

  var bigprogressbar = document.getElementById('bigseek-obj');

  var player=document.querySelector("audio");
  var music=document.getElementById("music");
  // var bigmusic=document.getElementById("bigmusic");

  var bigthumbnail=document.getElementById("bigimage");

  var bigsname=document.getElementById("bigsongname");

  var bigsinger=document.getElementById("bigsinger");

  var bigvolumeBar = document.getElementById('bigvolume-bar');

  var bigbtnMute = document.getElementById('bigbtnMute');
  const body =document.querySelector("body");

  var bignext=document.getElementById("bignext");

  var bigprevious=document.getElementById("bigpre");
  var share=document.getElementById("share");
  
  var pp=document.getElementById("play");
  var bigpp=document.getElementById("bigplay");
  var press=0;
  var count=0;
  var sindex=0;
  var d=document.querySelectorAll(".fa-pause");
 document.getElementById("cards").setAttribute("style","width:75% !important;");
  d.forEach(playpause);
  document.querySelector("#bigmusic").classList.remove("d-none");
  document.querySelector("#fun").classList.add("d-none");

		function	musicbar(){
  }
    function playpause(item, index) {
    item.addEventListener("click",()=>{
      count++;
      
      player.pause();
      if(count%2===0){
        item.classList.add("fa-pause");
        item.classList.remove("fa-play");
        player.play();
      }
      else{
        item.classList.add("fa-play");
        item.classList.remove("fa-pause");
        
      }
    });
    
  }

 
  bigprevious.addEventListener("click", function(){player.currentTime -=1500;});
  
  bignext.addEventListener("click", function(){player.currentTime +=1500;});
  share.classList.add("d-none");
  document.getElementById("funny").classList.add("d-none");

  
    player.src="<?php echo $roww['audio'];?>";
    player.play();
// now playing

// change values in musicbar

bigthumbnail.src="<?php echo $roww['image'];?>";

bigsname.innerHTML="<?php echo $roww['name'];?>";

bigsinger.innerHTML="<?php echo $roww['singer'];?>";
function update(element){
  
  currentTime=Math.floor(element.currentTime);
  duration=Math.floor(element.duration);

  bigprogressbar.setAttribute("value",(currentTime / duration));
   }
bigvolumeBar.addEventListener("change", function(evt) {function displayMessage(message, canPlay) {
    var element = document.querySelector('#message');
    element.innerHTML = message;
    element.className = canPlay ? 'info' : 'error';
}
  player.volume = parseInt(evt.target.value) / 10;
});
body.addEventListener('keydown', (event) => {
  if(event.keyCode==39){
                         player.currentTime+=1500;
                       }else if(event.keyCode==37){
                        player.currentTime-=1500;
                       }
                      });
body.addEventListener('keypress', (event) => {  
  if(event.keyCode==32){count++;  
      
     if(count%2==0){
       pp.classList.add("fa-pause");
       bigpp.classList.add("fa-pause");
            pp.classList.remove("fa-play");
            bigpp.classList.remove("fa-play");
       player.play();
     }
     else{
       pp.classList.add("fa-play");
       bigpp.classList.add("fa-play");
           pp.classList.remove("fa-pause");
           bigpp.classList.remove("fa-pause");
           player.pause();
       
     }
                       }
});
var muteclick=0;
bigbtnMute.addEventListener("click",()=>{muteclick++;
  if(muteclick%2===0){player.volume=1;
    }else{player.volume=0;}})


  </script>
 <?php

 
     }

    
  
?>


</body>


</html>
