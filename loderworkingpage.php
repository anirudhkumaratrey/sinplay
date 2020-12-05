<!DOCTYPE html>
<html>
<?php  
  
include 'db_connection.php';?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<!-- bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css" >  
<!-- <link rel="stylesheet" href="artistprofile.css" > -->

<title>Sinplay</title>
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="./slick/slick.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="./slick/slick.css">
  <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css"> <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="loderdesign.css">


<!------ Include the above in your HEAD tag ---------->
</head>

<body >

<div class="flex-container " id="loader">
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
                  "body").style.visibility    = "hidden"; 
                  document.querySelector( 
                    "#loader").style.visibility = "visible"; 
                   
                  
                 
                  
            } else { 
              setTimeout(callme, 5000);
                
            } 
        }; 

        function callme(){
          document.querySelector( 

"#loader").style.display = "none"; 
document.querySelector( 
"body").style.visibility = "visible"; 

 document.body.style.backgroundColor = "black";
document.body.style.fontStyle = "ariel";
document.body.style.fontWeight = "800";
        }
        document.body.style.backgroundColor = "black";
    </script>

    <?php
  
    include 'navbar.html';
    // include 'loderdesign.html';
    ?>
    
  <div class="container-fluid">
	 
   
    		<div class="row" style="background-color:black;">
             <div class="col-md-3 grey text-center mx-auto">
                <div class="h-100 d-inline-block" >
                   <ul class="">
             	       	<li class="listitem " >
             		          <span style="font-size: 1.5rem; ">
                        	 <img src="img/logo.png" width="100px"/>
                         	 <p>User name<br></p>
                          </span>
             	                     	<!-- <strong class="logotext"> Sinplay </strong>	 -->
             	        	</li>
             	      	<li class="listitem" >
                 
             		           <div class="btn-group ">
                              <button type="button" class="btn btn-dark"><em class="fa fa-bar-chart px-4 zoom2  " id="rank" style="font-size: 26px; padding-bottom: 21px;   padding-top: 25px;"></em><em class="fa fa-caret-right px-4 zoom2"  style="font-size: 26px; padding-bottom: 21px;padding-top: 25px;"></em></button>
                            </div>
                           <div class="ranknum"><p>54,880</p></div>
             		                       </span>	
             	           	</li>
                      <li class="listitem" style="margin-top: 2rem">
                        <div class="btn-group ">
                          <button type="button" class="btn btn-dark"><em class="fa fa-heart px-4 zoom2 " id="rank" style="font-size: 26px; padding-bottom: 21px;padding-top: 25px;"></em><em class="fa fa-caret-right px-4 zoom2 "  style="font-size: 26px; padding-bottom: 21px;padding-top: 25px;"></em></button>
                        </div>
                         <div><p>3000</p></div>
             	          	</span>	
             		     </li>
                       <li class="listitem" style="margin-top: 2rem">
                          <div class="btn-group px-0 ">
                             <button type="button" class="btn btn-dark"><img src="img/intro.png" style="width: 5.1rem; height: 3.6rem" class=" zoom2 " id="rank" ><em class="fa fa-caret-right px-4 zoom2 "  style="font-size: 26px; padding-bottom: 21px;padding-top: 25px;"></em></button>
                          </div>
                        </li>
                        <p>Not On Sinboard</p>
             	           	</span>	
             			
             		        </li>
                      <li>
                          <div class="px-3 py-3">
                                    <div class="social facebook">
                                        <i class="fa fa-facebook fa-4x"></i>       
                                    </div>
                                    <div class="social twitter">
                                        <i class="fa fa-twitter fa-4x"></i>   
                                    </div>
                                    </div>
                                    <div class="px-3 py-3">
                                    <div class="social pinterest">
                                        <i class="fa fa-pinterest fa-4x"></i>  
                                    </div> 
                                    
                                    <div class="social youtube">
                                        <i class="fa fa-youtube fa-4x"></i>     
                                    </div>
                                    </div>
                
                     </li>
                 
                    </ul>
               </div>
             </div>
  <div class="col-md-9 mt-5">

             		<div  style="height: 40px; margin-top: 10px;" class="container-fluid">

             			<div class="col-md-4" style="float: right;">

             					<div class="col-md-8">
             						<p style="padding: 5px; text-align: center;background-color: #00ace6;color: #fff;"> Rank  1234</p>
             					</div>
             					
                      </div>
                       
             			</div>
  

<!------ Include the above in your HEAD tag ---------->

                <div class="container">
                   <h1 style="text-align: center;padding: 20px;color: #e8edf3"> Most Liked Songs</h1>
                     <div class="row" style="padding: 20px;">
 
                        <div class="container">

                           <section class="customer-logos slider" id="man1">
     

<?php 
         $qu= "SELECT * FROM rplaylist  WHERE u_id =17 ";
          $res = mysqli_query($db_connection, $qu);
              
          while($s_id = mysqli_fetch_array($res))
        {
           ?>        
      
              


    <div class="music-box" >
                  <?php
                   $rows=mysqli_query($db_connection,"SELECT * from songs where s_id = ".$s_id['s_id']) ;
                  while($row = mysqli_fetch_array($rows))
                  {
                    ?>
                        <img src="<?php echo $row['image'];?>" alt="song-thumbnail" class="br parent rounded">
             <div class="child"> </div> 
        <div class="play-list">
        <div class="music-card__content "><a class="music-detail__link" href="#">
          <h3 class="music__heading text-center pt-2"><span class="music__heading--artist u-trunc u-d-block"><?php echo $row['name'];?></span></h3>
          </a>
            
            <li class="u-trunc u-ls-n-05 u-lh-13"><strong>Feat. <a href="#"><?php echo $row['feat'];?></a></strong></li>

                <li><span class="u-trunc u-ls-n-05 u-lh-13">by 
                  <a data-popover="true" href="artistview1.php?a_id=<?php echo $row['a_id'];?>"><strong><?php echo $row['singer'];?></strong></a>
  
               </li>
               <li>
                 <button onclick="play(this)" value="<?php echo $row['audio']?>" ><i class="fa fa-play" aria-hidden="true"></i></button>
               </li>
              
               
               
               
           

               <ul class="tooltip tooltip--down-right-arrow font14" id="tooltip-fav">
                  <li ><i class="fa fa-heart font14" aria-hidden="true"></i>Wishlist</li>
                  <li><i class="fa fa-retweet font14" aria-hidden="true"></i>Shuffle</li>
                </ul>

                <div class="music-card__interactions pt-2" style="position: relative; left:8vw;" id="interactions-trigger">
                  <button class="music-card__interactions-trigger " onclick="myFunction(this)" value="<?php echo $row['s_id']?>"> 
                    <i class="fa fa-ellipsis-h"></i>
                   
                  </button>                
                </div>
            </div>

      </div>
    </div>




     
  
<?php 
 } }
?>
  
</section>


</div>
   </div>
   <div class="container">
  <h1 style="text-align: center;padding: 20px;color: #e8edf3"> All Upload</h1>
<div class="row" style="padding: 20px;">
 


<section id="man2" class="customer-logos slider" >
  
<?php 
         $qu= "SELECT * FROM rplaylist  WHERE u_id =17 ";
          $res = mysqli_query($db_connection, $qu);
              
          while($s_id = mysqli_fetch_array($res))
           { ?>        
      
        <div class="music-box" >
                  <?php $rows=mysqli_query($db_connection,"SELECT * from songs where s_id = ".$s_id['s_id']) ;
                  while($row = mysqli_fetch_array($rows))
                  {?>
              <img src="<?php echo $row['image'];?>" alt="song-thumbnail" class="br parent rounded">
             <div class="child"> </div> 
        <div class="play-list">
        <div class="music-card__content text-left container-fluid px-0 mx-0 " sstyl ><a class="music-detail__link" href="#">
          <h3 class="music__heading text-center pt-2"><span class="music__heading--artist u-trunc u-d-block"><?php echo $row['name'];?></span></h3>
          </a>
            
            <li class="u-trunc u-ls-n-05 u-lh-13"><strong>Feat. <a href="#"><?php echo $row['feat'];?></a></strong></li>

                <li><span class="u-lh-13 u-ls-n-07">by 
                  <a data-popover="true" href="artistview1.php?a_id=<?php $row['a_id'];?>"><strong><?php echo $row['singer'];?></strong></a>
                  </span>
  
                </li>
                

                <div class="music-card__interactions pt-2" style="position: relative; left:8vw;" id="interactions-trigger">
                  <button class="music-card__interactions-trigger " onclick="myFunction(this)" value="<?php echo $row['s_id']?>"> 
                    <i class="fa fa-ellipsis-h"></i>
                   
                  </button>                
                </div>
            </div>

      </div>
    </div>



     
  
<?php 
} }
?>
    <script>
     

function myFunction(event) {
  const a = event.value;
  console.log(a);
  console.log("<?php echo "chalgaya bc"; ?>")
  document.querySelector(".bg-modal").style.display='flex';
 
}

</script>
</section>


   </div>
              
            </div>
          </div>

     </div>


    </div>
	 </div>



   </div>





   
<!-- popup -->

<div class="bg-modal ">
<div class="container">
<div class="modal-content">
  <button type="button" class="close" onclick="myFunction1(this)"  value="maachuda"><i class="fa fa-times" aria-hidden="true"></i>
  </button>
  <h1 class="mt-5">Edit Song Details</h1>
  <form  id="popup" method="POST" onsubmit="return" name="myForm" action="">
    <input class="input1 zoom2" type="text" name="songname" placeholder="Song Name" value="" >
    <input class="input1 zoom2" type="text" name="artist" placeholder="Artist" >
    <input class="input1 zoom2" type="text" name="feat" placeholder="Feat" >

    <label class="ml-5 file  text-secondary rounded" style="border-radius: 15rem; margin-left:6rem !important;" >
      <h6 class=""><i class="fa fa-plus fa-2x mr-3 text-primary" aria-hidden="true" ></i> Thumbnail</h6>
      <input type="file" id="file" aria-label="File browser example">
  <span class="file-custom"></span>
</label>
    <button  type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
</div>
</div>






<audio autoplay controls id="myAudio" style="position:fixed; z-index:99; width:100vw;display:none; bottom:0;">
  <source src="horse.ogg" type="audio/ogg">
  <source src="horse.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>
</body>

  </section>
     <script type="text/javascript">
      
      function play(event) {
       const c= event.value;

       var x = document.getElementById("myAudio");
       x.style.display='block';
      x.src = c;

function playAudio() { 
  x.play(); 
} 
      }

     function myFunction1(event) {
       const c= event.value;
       console.log(c);
  document.querySelector(".bg-modal").style.display='none';
 
}
        // popup
    //     document.querySelector(".popup").addEventListener('click',function(){
    //   document.querySelector(".bg-modal").style.display='flex';
    // });
    // document.querySelector(".close").addEventListener('click',function close(){
    //   document.querySelector(".bg-modal").style.display='none';
    //   console.log(event)
    // });
    $("#interactions-trigger").click(function(event) {
         $("#interations-trigger").addClass("bg-danger");
          event.stopPropagation();
    });

     $(document).click(function(event){
        if (!$(event.target).hasClass('tooltip--active')) {
            $("#tooltip-fav").removeClass("tooltip--active");
        }
    }); 

    $("#artist").hover(
      function () {
        $(".artist-tooltip").addClass("bg-danger");
      },
      function () {
        $(".artist-tooltip").removeClass("tooltip--active");
      }
    );
    
    
        $(document).on('ready', function() {
    
          
          
          $(".regular").slick({
            dots: true,
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 3,
             responsive: [
                    {
                      breakpoint: 1024,
                      settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                      }
                    },
                    {
                      breakpoint: 600,
                      settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                      }
                    },
                    {
                      breakpoint: 480,
                      settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                      }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                  ]
          });
          
          
          $(".lazy").slick({
            lazyLoad: 'ondemand', // ondemand progressive anticipated
            infinite: true
           
          });
    
          //$('#artist').tooltip();
    
               
    
        });
    
       
    </script>
<script type="text/javascript">
	$(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay:false,
        autoplaySpeed: 1500,
        arrows:false,
        dots:false,
        pauseOnHover: true,
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
<script>
$(document).ready(function(){
  $("#hide").click(function(){
    $("p").hide();
  });
  $("#rank").click(function(){
    $("#ranknum").show();
  });
});


</script> 
</html>