<html>
<?php
 session_start();
 // CHECK USER IF LOGGED IN
if(!isset($_SESSION['u_id'])){
  header('Location: index.php');
  }
include "db_connection.php";
include "navbar1.html";


$sql="select * from users where user_id =".$_GET['a_id'];
$sql1="select * from songs where a_id =".$_GET['a_id'];
$rows=mysqli_query($db_connection,$sql);
$row2s=mysqli_query($db_connection,$sql);
$rows1=mysqli_query($db_connection,$sql1);
$rows2=mysqli_query($db_connection,$sql1);

?>
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
    
	
</head>
<body>


    
        

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
}?> </h3></label> </div> <form action="follow.php" style="text-align: center;" method="POST"> 
    <?php $query = "
	SELECT * FROM follow 
	WHERE sender = ".$_SESSION['u_id']." 
	AND receiver = 
    ".$_GET['a_id'];
    $total_row=0;
    $rows=mysqli_query($db_connection,$query);
    while($row=mysqli_fetch_array($rows)){
        $total_row++;
    }
 
	$output = '';
	if($total_row > 0)
	{ 
		$output = '<button type="button ml-5" name="follow_button"class="follow btn btn-primary  mt-1" id="followbtn1"data-action="unfollow" data-sender_id="'.$_SESSION['u_id'].'"> Following</button>';
	}
	else
	{ 
		$output = '<button type="button ml-5" name="follow_button" class="follow btn btn-primary mt-1"  id="followbtn1"data-action="follow" data-sender_id="'.$_SESSION['u_id'].'"><i class="glyphicon glyphicon-plus"></i> Follow</button>';
    } 
     echo $output;
     ?>
    <input type="hidden" name="follow" value="<?php echo $_GET['a_id']?>">
</form>
                                
            </div>
			</div>
            <div class="panel panel-primary" style="height: fit-content;">
                <div class="panel-heading">
                    <h3 class="panel-title"></h3>
                    <div class="pos1">
                    <span class="">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs mx-auto "  id= 'tab'style= ' position: inherit;padding: 0rem 10rem;'>
                          
                            <li class="a active" ><a href="#tab2" data-toggle="tab">Music</a></li>
                            <li class="a " ><a href="#tab5" data-toggle="tab">Follow</a></li>
                            <li class="a" ><a href="#tab6"  data-toggle="tab">Connect</a></li>
                            <li class="a" ><a href="#tab7"  data-toggle="tab">Clap Artist</a></li>
                          

                        </ul>
                    </span>
                </div>
                </div>
               <!--  tabs -->
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab2">
                        	
<div class="container" >
<div class="col-md-5" style="margin-top: 2rem;">
  <h1 id="recent"> Recent Upload</h1></div>
<div class="" style="position: relative;left: 12%;" id="padd">
  
<div class="container" style="right: 52%; position: relative;" >

<section class="customer-logos slider" style="width: 134%; height:45%;" id="mar2">
    <?php while($row1=mysqli_fetch_array($rows1)){?>
<div class="slide boxshadow br"><img src="<?php echo $row1['image'];?>" style="height:12vh;" class="br"> <p><h4 style="font-size:0.5rem"></h4></p>
    <p><h4 style="font-size:12px"><center><?php echo $row1['singer'];?></center></p></h4></div>
<?php } ?>
</section>
  </div>
  <div class="container" id="pos2">
    <div class="col-md-5" style="margin-top: 2rem;position: relative;right: 14%; ">
  <h1 id="all" style="margin: inherit;" > All Upload</h1></div>
<div class=""  style="right: 54%; position: relative;">
<section class="customer-logos slider" style="width: 134%; height:45% " id="mar3" >

<?php while($row2=mysqli_fetch_array($rows2)){?>
<div class="slide boxshadow br"><img src="<?php echo $row2['image'];?>" style="height:12vh;" class="br"><p><h4 style="font-size:0.5rem"></h4></p>
    <p><h4 style="font-size:12px;text-align:center"><strong><?php echo $row2['singer'];?></strong></p></h4></div>
<?php } ?>
</section>


  
                  
  </div>
          </div>




  
  




<script type="text/javascript">
$(document).ready(function(){
$('.customer-logos').slick({
  slidesToShow: 5,
  slidesToScroll: 1,
  autoplay:true,
  autoplaySpeed: 1500,
  arrows:false,
  dots:false,
  pauseOnHover: false,
  responsive: [{
      breakpoint: 768,
      settings: {
          slidesToShow: 4
      }
  }, {
      breakpoint: 520,
      settings: {
          slidesToShow: 3
      }
  }]
});
});

</script>
</div>
</div>
                        </div>

                        <!-- <div class="tab-pane" id="tab3">
                          <div class="row">
                            <h1 class="pos1"> Your Songs </h1>
                                         </div>
                            <div class="col-md-12 padd10 profile-access pos1" >
                                 <div class="col-md-2"></div>
                                 <div class="col-md-8">
                                    <section class="song-player" id="tan1"> 
                                     
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
                                    </section>
                                 </div>
                                  <div class="col-md-2"></div>
                                 
 
                             </div>
                            </div> -->



                        <!-- <div class="tab-pane" id="tab4">
                        	<div class="row">
      			               <h1 class="pos1">Your Wishlist </h1>
                                        </div>
                            <div class="col-md-12 padd10 profile-access pos1">
                                <div class="col-md-2"></div>
                                                                   
                               <div class="col-md-8">
                               <section class="song-player" id="ken1">

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
                                    </section>
                                </div>
                                 <div class="col-md-2"></div>
                                

                            </div>



      
                        </div> -->
                        <?php  $run= mysqli_query($db_connection,"SELECT COUNT(receiver) as total from follow where sender =".$_GET['a_id']);
                        $pic= mysqli_query($db_connection,"SELECT * from follow where sender =".$_GET['a_id']);

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
                 <?php $run= mysqli_query($db_connection,"SELECT COUNT(sender) as total from follow where receiver =".$_GET['a_id']);
                        $pic= mysqli_query($db_connection,"SELECT * from follow where receiver =".$_GET['a_id']);

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
                              <h1 class="text-center">SHARE  </h1>
                               <section class="share" id="ken5">
                                <div class="row" id="pad-top">
                              <div class="col-md-12 text-center" >
   

                                     <div id= "google" class="social google-plus">
                                        <i class="fa fa-google-plus fa-5x"></i>
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
                        <div class="tab-pane" id="tab7">
                          <div class="row" id="mar1">
                                <section class="container" id="ken2">
                                <div class="px-4 py-5 chat-box bg-white">
        <!-- Sender Message-->
    
        <div class="media w-50 mb-3"><img src="<?php
        $sql2="SELECT profile_cover FROM `users` Where user_id='".$_GET['a_id']."'";

        $query2 = mysqli_query($db_connection,$sql2);
        while($row2= mysqli_fetch_assoc($query2))	
        {
          echo $row2['profile_cover'];
        }          
        ?>" alt="user" width="50" class="rounded-circle">
          <div class="media-body ml-3">
            <div class="bg-light rounded py-2 px-3 mb-2">
              <p class="text-small mb-0 text-muted">Type Your Message You Want to say to Your Fav Artist and Support Them by click on ClAP </p>
            </div>
          </div>
        </div>
        <!-- Reciever Message-->
        <div class="media w-50 ml-auto mb-3">
          <div class="media-body">
            <div class="bg-primary rounded py-2 px-3 mb-2">
              <p class="text-small mb-0 text-white" style="overflow: none; text: no-wrap;">xaaxasxaxaax</p>
            </div>
            <p class="small text-muted" style="overflow: none; text: no-wrap;">sdcds</p>
          </div>
        </div>
        

       

      
       <!-- Typing area -->
       <form action="sendmessage.php" method="post" style="bottom: 0px; position: absolute; margin: 1px 5px; " class="bg-light">
        <div class="input-group " style="text-align-last:left">
        <div class="row">
          <input type="hidden" name="reciver_id" value="" />
          <input type="text"  name="msg" placeholder="Type a message" aria-describedby="button-addon2" class="py-2 bg-light ml-4 " style="width: 27rem;">
            <button  type="submit" name="submit" class="btn btn-link"> <i class="fa fa-paper-plane"></i></button>
        </div>  
        </div>
      </form>
      </div>
        <?php  ?>  
    </section>
                                  </div>
                            </div>
                        </div>
                    </div> 
    </div>
    <div class="col-md-1"></div>
</div>
</div>
		</div>
	
         


<script>
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

 

const following = [
{  today:   6 ,
last7days: 12 , 
total: 18 ,
image:   "./img/1.jpg",
added: 15}
];

const followers = [
{  today:   20,
last7days: 10 , 
total: 30 ,
image:   "./img/3.jpg",
added: 258}
];

const share = [
{name:"google-plus",  link:"https://www.google.co.in/"},

{name:"youtube" , link:"https://www.youtube.com/"
}
];





function followTemplate({today,last7days,total, image , added}){
return      `                                      <div class="chatbox">
                                           <div class="row">
                                                   
                                               <div class="col-md-4 col-xs-4">
                                                   <span class="display-block fon28">${today}</span>
                                                   <span>Today</span>
                                               </div>
                                               <div class="col-md-4 col-xs-4">
                                                   <span class="display-block fon28">${last7days}</span>
                                                    <span>Last 7 days</span>
                                               </div>
                                                <div class="col-md-4 col-xs-4">
                                                   <span class="display-block fon28">${total}</span>
                                                   <span>Total Following</span>
                                               </div>
                                           </div>   
                                           <div class="row">
                                               <div class="speech-bubble">
                                                   <img src="${image}" class=" chatboximg br">
                                                   
                                                   <span class="chatboximg maringmin special-box">+${added}</span>
                                               </div>
                                           </div>
                                       </div>`;
}


function shareTemplate({name, link}){
return  `                           
                                    <div class="social ${name}">
                                     <a href="${link}"><i class="fa fa-${name} fa-5x"></i></a>       
                                    </div>
                                   `;}








        


</script>
<script src="follow.js" type="text/javascript" ></script>
 

</body>
</html>