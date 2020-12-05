<?php
session_start();
require 'db_connection.php';
// CHECK USER IF LOGGED IN
if(!isset($_SESSION['u_id'])){
    header('Location: index.php');
    }
include 'navbar1.html';
$sql="select * from users where user_id =".$_SESSION['u_id'];
$sql1="select * from songs where a_id =".$_SESSION['u_id'];
$rows=mysqli_query($db_connection,$sql);
$row2s=mysqli_query($db_connection,$sql);
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Sinplay</title>
	<!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
    
<!-- jquery-->
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>

<!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    

<!-- bootstrap4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   
<!-- css -->
    <link rel="stylesheet"  href="profileview.css">
    <link rel="stylesheet" href="css/style.css" > 
 
 <!-- libraries -->

    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script src="./slick/slick.js" type="text/javascript" charset="utf-8"></script>
  <link rel="stylesheet" type="text/css" href="./slick/slick.css">
  <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css">
  <!-- <link rel="stylesheet" href="loderdesign.css"> -->


<!------ Include the above in your HEAD tag ---------->
</head>

<style>
  /* img:before {
    content: ' ';
    display: block;
    position: absolute;
    height: 50px;
    width: 50px;
    background-image: url('img/2.jpg');
  } */
  </style>  

<body  >

<div class="flex-container" id="loader">
          <div class="unit">
              <div class="heart">
                  <div class="heart-piece-0"></div>
                  <div class="heart-piece-1"></div>
                  <div class="heart-piece-2"></div>
                  <div class="heart-piece-3"></div>
                  <div class="heart-piece-4"></div>
                  <div class="heart-piece-5"></div>
                  <div class="heart-piece-6"></div>
                  <div class="heart-piece-7"></div>
                  <div class="heart-piece-8"></div>
                </div>
                <p>Sinplay Music</p>
            </div>
        </div>
  
 
         <script> 
        document.onreadystatechange = function() { 
            if (document.readyState !== "complete") { 
                document.querySelector( 
                  "body").style.visibility = "hidden"; 
                document.querySelector( 
                  "#loader").style.visibility = "visible"; 
            } else { 
                document.querySelector( 
                  "#loader").style.display = "none"; 
                document.querySelector( 
                  "body").style.visibility = "visible"; 
            } 
        }; 
    </script>
<!------ Include the above in your HEAD tag ---------->


<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="row pos1" >
                <div class="col-md-12 ma-auto">
                    <div class="text-center" style="text-align: center;"> 
                    <img src="<?php while($row=mysqli_fetch_array($rows)){
                    echo $row['profile_cover'];}?>" alt="" class="rounded-circle m4-sm-2 mt-1 mx-auto d-block" width="60" height="60    ">
          	
                <label id="colour">  <h3><?php ;
                 while($row=mysqli_fetch_array($row2s))
{
echo $row['username'];
}?> </h3></label> </div>
            <div class="panel panel-primary" style="height: max-content;" >
                <div class="panel-heading">
                    <h3 class="panel-title"></h3>
                    <div class="pos1">
                    <span class="">
                        <!-- Tabs -->
                        <ul class="nav panels-tabs mx-auto "  id= 'tab'style= ' position: inherit;padding: 0rem 12rem;'>
                        
                          
                            <li class="a " ><a href="#tab2" data-toggle="tab">Upload</a></li>
                            <!-- <li class="a"><a href="#tab3" data-toggle="tab">Uploaded songs </a></li> -->
                            <!-- <li class="a"><a href="#tab4" data-toggle="tab">Wishlist</a></li> -->
                            <li class="a active"><a href="#tab7" data-toggle="tab">Clap</a></li>
                            <li class="a "><a href="#tab5" data-toggle="tab">Follow</a></li>
                            <li class="a"><a href="#tab6" data-toggle="tab">Share</a></li>
                        </ul>
                    </span>
                </div>
                </div>
               <!--  tabs -->
                <div class="panel-body" style="overflow: scroll; height:80%; min-height:75vh">
                    <div class="tab-content">
                        
                    
                        <div class="tab-pane " id="tab2">
                        	
                        <div class="row " >
<form class="text-center form-group mx-auto my-2" action="fileupload.php" method="POST" enctype="multipart/form-data"> 
                            <h4>Music name</h4></span><span></span>
                                  <input class="form-control rounde" type="text" id="Song name" class="field-sty" placeholder="Music Name" name="name"><br> 
                                  <h4>Add Genre</h4>
                                      <input class="form-control rounde" type="text" id="Genre"  class="field-sty"placeholder="Genre"  name="category"><br>                    
                                    <h4>Song Language</h4>   
                                  <input class="form-control rounde" type="link" id="Language" class="field-sty" placeholder="Language" name="language"><br>
                                      </button>
                                      <div class="col-md-12">
                                      <h4>Song</h4>
                                      <label class="btn-outline-info mb-3 py-1 btn-rounded btn-block col-md-5 "  style="margin: 5px 0px 0px 115px;border-radius: 15rem;height: 3rem;" >
      <i class="fa fa-music  fa-2x mr-3 text-primary"  aria-hidden="true" ></i> Song
      <input type="file"  name="song" aria-label="File browser example" value="" style="  filter: alpha(opacity=0); opacity: 0; " accept="*/image">
    </label>
</div>
     <h4>Thumbnail</h4>
<div class="row"><label class="btn-outline-info mb-3 py-1 btn-rounded btn-block col-md-5 "  style="border-radius: 15rem; margin-top:1.5%; margin-left: 75px;" >
      <i class="fa fa-image  fa-2x mr-3 text-primary"  aria-hidden="true" ></i> Thumbnail
      <input type="file" id="uploadimg"  name="sthumbnail" aria-label="File browser example" value="" style="   filter: alpha(opacity=0); opacity: 0; " accept="*/image">
      </label>                            
      <img  id="blah" style="height: 60px; margin-top:3%;" class="rounded-circle" src="#" alt="your image">
      
</div>
<input class="btn btn-outline-info btn-rounded btn-block z-depth-1 my-2 waves-effect" type="submit" name='submit' value="Upload" >
</form>
                        </div>
</div>



                        <!-- <div class="tab-pane" id="tab3">
                          <div class="col-md-12">
                            <h1 class="pos1"> Your Songs </h1>
                                         </div>
                            <div class="col-md-12 profile-access pos1"  style="padding: 2rem 4rem;">
                                 <div class="col-md-2"></div>
                                 
                                    <section class="song-player" id=""> 
                                    <div class="row">
                                    <div class="col-md-2 zoom2">
                                         <img src="img/19.jpg" class="br">
                                         <span class="fix"><i class="fa fa-caret-right"></i></span>
                                     </div>
                                     <div class="col-md-2 zoom2">
                                         <img src="img/13.jpg" class="br">
                                         <span class="fix"><i class="fa fa-caret-right"></i></span>
                                     </div>
                                     <div class="col-md-2 zoom2">
                                         <img src="img/12.jpg" class="br">
                                         <span class="fix"><i class="fa fa-caret-right"></i></span>
                                     </div>
                                     <div class="col-md-2 zoom2">
                                         <img src="img/11.jpg" class="br">
                                         <span class="fix"><i class="fa fa-caret-right"></i></span>
                                     </div>
                                     <div class="col-md-2 zoom2">
                                         <img src="img/18.jpg" class="br">
                                         <span class="fix"><i class="fa fa-caret-right"></i></span>
                                     </div>
                                     <div class="col-md-2 zoom2">
                                         <img src="img/13.jpg" class="br">
                                         <span class="fix"><i class="fa fa-caret-right"></i></span>
                                     </div>
                                    </div>
                                    </section>
                                 </div>
                                  <div class="col-md-2"></div>
                                 
 
                             
                            </div> -->



                        <div class="tab-pane" id="tab4">
                        	<div class="row">
      			               <h1 class="pos1">Your Wishlist </h1>
                                        </div>
                            <div class="col-md-12 padd10 profile-access pos1">
                                <div class="col-md-2"></div>
                                                                   
                               <div class="col-md-8">
                               <section class="song-player" id="ken1">

                                    <!--<div class="col-md-2 zoom2">
                                        <img src="img/19.jpg" class="br">
                                        <span class="fix"><i class="fa fa-caret-right"></i></span>
                                    </div>
                                    <div class="col-md-2 zoom2">
                                        <img src="img/13.jpg" class="br">
                                        <span class="fix"><i class="fa fa-caret-right"></i></span>
                                    </div>
                                    <div class="col-md-2 zoom2">
                                        <img src="img/12.jpg" class="br">
                                        <span class="fix"><i class="fa fa-caret-right"></i></span>
                                    </div>
                                    <div class="col-md-2 zoom2">
                                        <img src="img/11.jpg" class="br">
                                        <span class="fix"><i class="fa fa-caret-right"></i></span>
                                    </div>
                                    <div class="col-md-2 zoom2">
                                        <img src="img/18.jpg" class="br">
                                        <span class="fix"><i class="fa fa-caret-right"></i></span>
                                    </div>
                                    <div class="col-md-2 zoom2">
                                        <img src="img/13.jpg" class="br">
                                        <span class="fix"><i class="fa fa-caret-right"></i></span>
                                    </div>-->
                                    </section>
                                </div>
                                 <div class="col-md-2"></div>
                                

                            </div>



      
                        </div>
                        <?php  $run= mysqli_query($db_connection,"SELECT COUNT(receiver) as total from follow where sender =".$_SESSION['u_id']);
                        $pic= mysqli_query($db_connection,"SELECT * from follow where sender =".$_SESSION['u_id']);

                        $run1=mysqli_fetch_assoc($run);
                        ?> 
                        <div class="tab-pane " id="tab5">
                          <div class="row mar-top" >
                                
                            <div class="col-md-6 textcenter" style="padding-left: 3rem;" >
                                  <div class="col-md-12 textcenter boxshadow" > <h1>Following</h1>
                                  <section class="chatbox" style="height: 40.5rem;padding: 0 0 0 0;" >
                                     <div class="chatbox">
                                           <div class="row">
                                                   
                                               <!-- <div class="col-md-4 col-xs-4">
                                                   <span class="display-block fon28">47</span>
                                                   <span>Today</span>
                                               </div>
                                               <div class="col-md-4 col-xs-4">
                                                   <span class="display-block fon28">258</span>
                                                    <span>Last 7 days</span>
      
                                                  </div> -->

                                                <div class="col-md-4 col-xs-4 mx-auto">
                                                   <span class="display-block fon28"><?php echo $run1['total'];?></span>
                                                   <span>Total Following</span>
                                               </div>
                                           </div>  
                                           
                                           <div class="row" style="padding: 0px 28px 0;" >
                                               <div class="speech-bubble  pl-3 container-fluid" style="margin-bottom: 0px;">
                                                   <?php $no=0; while($pic1=mysqli_fetch_array($pic)){
                       $pic2= mysqli_query($db_connection,"SELECT profile_cover from users where user_id =".$pic1['sender']);
                    
                         while($pic3=mysqli_fetch_array($pic2) ){  if($no<5){ $no++;?>
                                                   <img src="<?php echo $pic3['profile_cover'];  ?> "class=" chatboximg br  maringmin ">
                                                   <?php } }}?>
                                                   <?php if($run1['total']>5){?>
                                                   <span class="chatboximg maringmin special-box"><?php  echo "+".($run1['total']-$no); ?></span>
                                               <?php } ?>
                                                </div>
                                            </div>
                                       </div>
                                </div>
                               </div>
                 <div class="col-md-6">  
                 <?php $run= mysqli_query($db_connection,"SELECT COUNT(sender) as total from follow where receiver =".$_SESSION['u_id']);
                        $pic= mysqli_query($db_connection,"SELECT * from follow where receiver =".$_SESSION['u_id']);

                        $run1=mysqli_fetch_assoc($run);
                        ?>
                     <div class="col-md-11 textcenter boxshadow" > <h1>Follower</h1>
                       <section class="chatbox" style="height: 40.5rem;" >

                        <div class="chatbox" style="padding: 0 0 0 0;">
                                 <div class="row">
                                              
                                                <div class="col-md-4 col-xs-4 mx-auto">
                                                   <span class="display-block fon28"><?php echo $run1['total'];?></span>
                                                   <span>Total Follower</span>
                                               </div>
                                           </div>    
                                           <div class="row">
                                               <div class="speech-bubble pl-3 container-fluid " style="margin-bottom: 0px;">
                                                   <?php $no=0; 
                                                   while($pic1=mysqli_fetch_array($pic)){
                       $pic2= mysqli_query($db_connection,"SELECT profile_cover from users where user_id =".$pic1['sender']);
                      while($pic3=mysqli_fetch_array($pic2))
                      { $no++; ?>
                                                   <img src="<?php echo $pic3['profile_cover'];  ?> "class=" chatboximg br  maringmin ">
                                                   <?php }}?>
                                                   <?php if($run1['total']>5){?>
                                                   <span class="chatboximg maringmin special-box"><?php  echo $run1['total']-$no; ?></span>
                                               <?php } ?>
                                                </div>
                                            </div>
                                         </div>





                                </div>
                          </div>
                             
                    </div>
                     
                  </div>
                         <div class="tab-pane" id="tab6">
                              <h1 class="text-center">SHARE </h1>
                               <section class="share" id="">
                                <div class="row" id="pad-top">
                              <div class="col-md-12 text-center" id="" >
   

                                     <div class="social facebook btn-ins" >
                                        <i  class="fa fa-instagram fa-5x" ></i>
                                    
                                    </div>
                                    <div class="social facebook">
                                        <i class="fa fa-facebook fa-5x"></i>       
                                    </div>
                                    <div class="social twitter">
                                        <i class="fa fa-twitter fa-5x"></i>   
                                    </div>
                                    <div class="social pinterest">
                                        <i class="fa fa-pinterest fa-5x"></i>  
                                    </div> 
                                    
                                    <div class="social youtube">
                                        <i class="fa fa-youtube fa-5x"></i>     
                                    </div>
                                    </div>
                                </div>
                                </section>
                            </div>


                        <div class="tab-pane active" id="tab7">
                            
                          
                                <section class="Message col-md-12" id="ken2">  
                                    <div class="container py-5 px-4">
  <!-- For demo purpose-->


  <div class="row rounded-lg overflow-hidden shadow">
    <!-- Users box-->
    <div class="col-5 px-0">
      <div class="bg-white">

        <div class="bg-gray px-4 py-2 bg-light">
          <p class="h5 mb-0 py-1">Recent</p>
        </div>
        <div class="messages-box">
          <div class="list-group rounded-0">
        <?php
$sql3="SELECT  sender_name , reciever_name , messages ,created_on FROM `chat` Where reciever_name='".$_SESSION['u_id']."' GROUP BY sender_name ASC  ";
if(isset($_POST['selected']))
{ 
  $selected=$_POST['selected'];}
else{$selected='';}
$query3 = mysqli_query($db_connection,$sql3);

      
	if(mysqli_num_rows($query3)>0)
	{
		while($row3= mysqli_fetch_assoc($query3))	
		{ $sql4=mysqli_query($db_connection,"SELECT * FROM `chat` Where (reciever_name='".$row3['sender_name']."' AND  sender_name='".$_SESSION['u_id']."') OR (reciever_name='".$_SESSION['u_id']."' AND  sender_name='".$row3['sender_name']."') ORDER BY created_on DESC LIMIT 1 ");
      $row5=mysqli_fetch_array($sql4);
      $dp=mysqli_query($db_connection,"SELECT * FROM `users` Where user_id=".$row3['sender_name']);
      $dp1=mysqli_fetch_array($dp);
      
      if( $row3['sender_name']==$selected){
  ?>
    <div class="list-group-item active text-white list-group-item-action rounded-0"  onclick="thefunction(<?php echo $row3['sender_name'];?>)">
              <div class="media"><img src="<?php echo $dp1['profile_cover']; ?>" alt="user" width="50" class="rounded-circle">
                <div class="media-body ml-4" style="overflow: hidden;" >
                  <div class="d-flex align-items-center justify-content-between mb-1">
                    <h6 class="mb-0"><?php echo $dp1['username'];?></h6><small class="small font-weight-bold"><?php echo $row3['created_on']?></small>
                    <div class="notifAmount">
                                        $20.2
                                    </div>
                  </div>
                  <p  class ="font-italic mb-0 text-light text-small" style=" white-space: nowrap;"><?php echo $row5['messages']; ?></p>
                </div>
              </div>
      </div>
  <?php
  }
  else{
  ?>

    <div class="btn list-group-item list-group-item-action rounded-0" id="<?php echo $row3['sender_name'];?>"  onclick="thefunction(<?php echo $row3['sender_name'];?>)">
              <div class="media"><img src="<?php echo $dp1['profile_cover']; ?>" alt="user" width="50" class="rounded-circle">
                <div class="media-body ml-4">
                  <div class="d-flex align-items-center justify-content-between mb-1">
                    <h6 class="mb-0"> <?php echo $dp1['username'];?></h6><small class="small font-weight-bold">25 Dec</small>
                    <div class="notifAmount">
                                        $20.2
                                    </div>
                  </div>
                  <p class="font-italic mb-0 text-small" style="overflow: none; text: no-wrap;">
                  <?php echo $row5['messages']; ?>
                   
                  <p>
                </div>
              </div>
  </div>

           
            <?php
            }
          }}
      else{ echo "no chats found";}
      ?>
         </div>
        </div>
      </div>
    </div>
    <!-- Chat Box-->

    <div class="col-7 px-0">
      <div class="px-4 py-5 chat-box bg-white">
        <div class="" id="messagebox">
        <div class="message">
			<p>
				No previous chat available.
			</p>
</div>
        </div>
       <!-- Typing area -->        
      </div>
      


     
  

    </div>
  </div>
</div>

                                                   </div>
                        </div>
                    </div> 
                        </div>
    </div>
    
</div>
		</div>
	</div>
<script>
  
  function send()
  {
    var value=document.getElementById('reciver_id').value;
    var msg=document.getElementById('msg').value;
    
    $.ajax({
        url: "sendmessage.php",
        data: {reciver_id: value, msg: msg},
        type: "POST",
          success:function(data){
          console.log(data);
          document.getElementById('msg').value="";
          },
        error:function (data){
          console.log(data);
        }
    });
    thefunction(value);
    return false;
    
  }
  function thefunction(value)
  {
    $.ajax({
        url: "test.php",
        data: {selected: value},
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
var acc = document.getElementsByClassName("accordion");
var i;
for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel1 = this.nextElementSibling;
    if (panel1.style.display === "block") {
      panel1.style.display = "none";
    } else {
      panel1.style.display = "block";
    }
  });
}
function notifClicked(event){
    console.log('clicked',event.path[2]);
    window.open('/chat.html');
}
window.onload =()=> {
    var list = document.getElementsByClassName("notif");
    for(var i=0;i<list.length;i++){
        var notif = list[i];
        notif.onclick = notifClicked;
    }
};
</script>
</div>

<script type="text/javascript">
    $(document).on('ready', function() {
      
      $(".regular").slick({
        dots: true,
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 3,
        autoplay:false
      });
      
      
      $(".lazy").slick({
        lazyLoad: 'ondemand', // ondemand progressive anticipated
        infinite: true
      });
    });
    function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#uploadimg").change(function() {
  readURL(this);
});
</script>
<script src="profileview.js" type="text/javascript" charset="utf-8"></script>
 
</body>
</html>