<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    session_start();
    // CHECK USER IF LOGGED IN
   if(!isset($_SESSION['u_id'])){
     header('Location: index.php');
     }
     ?>
  <title>Sinplay</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="Dashboard.css" > 
  <link rel="stylesheet" type="text/css" href="musicbox.css">
  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./slick/slick.css">
  <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css"> <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">


 

 <!-- bootstrap -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
  <?php include("db_connection.php");

  $current_singer="anirudh";
   include "navbar1.html";
   ?>
</head>


<body>
<script>
  var echoice=[];
  
  var thissong;
</script>
<?php
$sql="SELECT * FROM sinboard GROUP BY ind ASC LIMIT 10 ";
$row4s=mysqli_query($db_connection,$sql);
?>
<div class="container-fluid ">  
<div class="row">
    <div class="col-md-3 text-center"  style=" background-color:#000">
         <ul class="">
             <li class=" ">
         
             <div class="">
              <h1 id="sin" class="text-light mt-5 text-center">Sinboard</h1>
            </div>
            <section id="zen4" style="color:wheat">
            <?php while($sinid=mysqli_fetch_array($row4s)){
              $song=mysqli_query($db_connection,"SELECT * FROM songs WHERE s_id =".$sinid['s_id'] );
              $row4=mysqli_fetch_assoc($song);
              ?>
           </li>
           <li class="listitem" style="margin-top: 30px; position:relative; left:30%;">
            <div class="itemscontainer">
              <div class="zoom">
                <div class="image" >
              <div class="flip-cardsin">
  <div class="flip-card-innersin">
    <div class="flip-card-frontsin">
                  <img src="<?php echo $row4['image'];?>" alt="song-thumbnail" class="br boxshadow" alt="song-thumbnail"style="width:  100px; height: 100px; border-radius: 20px;">
               </div>
                    <div class="flip-card-backsin" style="white-space:nowrap;overflow:hidden">
      <h2 class=""><?php echo $row4['name'];?></h2 > 
      <p class="mt-5"><?php echo $row4['singer'];?></p> 
      <p class="mx-0"><?php echo $row4['feat'];?></p>
    </div>
    </div>
    <div class="play neg"> <span class="playbtn"  ></span>
    <div class="d-none">

<script>
  
  thissong={
    id:"<?php echo $row4['s_id'];?>" ,
    name:"<?php echo $row4['name'];?>" ,
    thumbnail:"<?php echo $row4['image'];?>",
    audio:"<?php echo $row4['audio'];?>",
    artist:"<?php echo $row4['singer'];?>"
  };
 
  
// console.log(index);

            var contains = echoice.some(elem =>{
          return JSON.stringify(thissong) === JSON.stringify(elem);
        });
        if (contains) {
          
          
          
        } else {
        
          echoice.push(thissong);
        }
  
  </script>
  </div>
                <div class="child">  
                   <button style="background:none;border:none; position:relative; bottom:7.5rem; left:0%;color:white;" onclick="play(this,echoice)" name="" value="<?php echo $row4['s_id']?>" ><i class="fa fa-play fa-2x" aria-hidden="true"></i></button>
             </div>   
 </span>  </div></div>
</div>
              </div>
              </div>
              </li>
          <?php
              }
          ?>
          
      </ul>
  
      <?php
        $sql="select * from songs ";

        $rows=mysqli_query($db_connection,$sql);
            
          
        ?>
            </div>
              <div class="col-md-9" style="background-color: #1b1e23;">
              <?php
           
          if(isset($_POST['search'])){
            $search=$_POST['search'];
           
            ?>
      
      
      <?php
     
     
     $sq="SELECT * from songs WHERE Name LIKE '%". $search ."%' OR  singer LIKE '%". $search ."%' "
     ;
     
     $ro=mysqli_query($db_connection,$sq);
     if(mysqli_num_rows($ro)>=1){
       while($s_id = mysqli_fetch_array($ro))
       {
         
         ?>

<div class=" therow row  bg-light">
  <div class="col-md-3 ml-5 my-4 ">
    
    <img src="<?php echo $s_id['image']; ?>" height="120px" width="150px" class="rounded-circle" width="100px" alt=""/>
  </div>
  <div class="col-md-6 pl-5 mt-5">
    <h1><?php echo $s_id['name']; ?></h1>
    <h4><?php echo $s_id['singer']; ?> </h4>
    
  </div>
  <div class="col-md-1">
  <div class="d-none">

<script>
  
  thissong={
    id:"<?php echo $s_id['s_id'];?>" ,
    name:"<?php echo $s_id['name'];?>" ,
    thumbnail:"<?php echo $s_id['image'];?>",
    audio:"<?php echo $s_id['audio'];?>",
    artist:"<?php echo $s_id['singer'];?>"
  };
 
  
// console.log(index);

            var contains = echoice.some(elem =>{
          return JSON.stringify(thissong) === JSON.stringify(elem);
        });
        if (contains) {
          
          
          
        } else {
        
          echoice.push(thissong);
        }
  
  </script>
  </div>
                 
                   <button class="btn btn-lg mt-4 btn-outline-dark" style="position:relative; top:4%;" onclick="play(this,echoice)" name="" value="<?php echo $s_id['s_id']?>" >
             <i class="fa fa-play fa-2x" aria-hidden="true">
    Play

  </i>
</button>

    
    </div>
    </div> 
    <?php
      }

   ?>

  <?php } else{?>
    
    </div>
<div class="text-center text-light mt-5"> <h1>No Such Results</h1></div>
          

  <?php
      } 
     }else{  
        ?>
                <h1 style="color: #e8edf3" class="mt-5 text-center" >Recently played</h1>
                <section class="regular slider responsive">
                
                <?php 
                $qu= "SELECT * FROM rplaylist  WHERE u_id = '".$_SESSION['u_id']."' GROUP BY ind DESC";
                  $res = mysqli_query($db_connection, $qu);
                      
                  while($s_id = mysqli_fetch_array($res))
                { ?>        
              
                <div class="music-box px-4"   >
                          <?php $rows=mysqli_query($db_connection,"SELECT * from songs where s_id = ".$s_id['s_id']) ;
                          while($row = mysqli_fetch_array($rows))
                          {?>
                      <img src="<?php echo $row['image'];?>" height="500px" width="500px"alt="song-thumbnail" class="br parent rounded">
                    <div class="child"> </div> 
                <div class="play-list">
                
                <div class="music-card__content " style="height: 9rem;" ><a class="music-detail__link" href="#">
                 
                    
                 
                <li>
                  <h3 class="music__heading col-md-12 text-center pt-2"><span class="music__heading--artist u-trunc u-d-block"><?php echo $row['name'];?></span></h3>
                  </li>  
                 
                </a>
                         <ul>

                         
                    <li class="u-trunc u-ls-n-05 col-md-12 u-lh-13 "><strong>Feat. <a href="#"><?php echo $row['feat'];?></a></strong></li>
                   
                        <li class="u-trunc u-ls-n-05  col-md-12 u-lh-13">by 
                          <a  href="artistview.php?a_id=<?php echo $row['a_id'];?>"><strong><?php echo $row['singer'];?></strong></a>
                      </li>
                      <li >
                      </ul> 
                      <div class="d-none">

<script>
  
  thissong={
    id:"<?php echo $row['s_id'];?>" ,
    name:"<?php echo $row['name'];?>" ,
    thumbnail:"<?php echo $row['image'];?>",
    audio:"<?php echo $row['audio'];?>",
    artist:"<?php echo $row['singer'];?>"
  };
 
  
// console.log(index);

            var contains = echoice.some(elem =>{
          return JSON.stringify(thissong) === JSON.stringify(elem);
        });
        if (contains) {
          
          
          
        } else {
        
          echoice.push(thissong);
        }
  
  </script>
  </div>
                 
                   <button style="background:none;border:none; position:relative; bottom:8.5rem; left:38%;color:white;" onclick="play(this,echoice)" name="" value="<?php echo $row['s_id']?>" ><i class="fa fa-play fa-2x" aria-hidden="true"></i></button>
              
                      </li> 
                        <div class="container">  
                      <div class='row mt-2'>
                        <?php $check=mysqli_query($db_connection,"SELECT * FROM likes WHERE userid='".$_SESSION['u_id']."'AND s_id=".$row['s_id']);
                        
                        if(mysqli_num_rows($check)>0){
                         
                        ?>
                      <button class='mx-left liked' onclick="like(this,<?php echo $row['s_id']?>)" value="<?php echo $row['s_id']?>" style="color:red; background:none;border:none;position:relative; left: 1rem;transform:scale(1.8);" >
                        <em class='fa fa-heart ' id="<?php echo $row['s_id']?>"   > </em>
                          </button>
                        <?php } else { ?>
                          <button class='mx-left like ' onclick="like(this,<?php echo $row['s_id']?>)" value="<?php echo $row['s_id']?>"  style="color:black; background:none;border:none;position:relative; left: 1rem;transform:scale(1.8);" >
                        <em class='fa fa-heart ' id="<?php echo $row['s_id']?>"  > </em>
                          </button>
                        <?php }?>
                        
                        <button title="Play Next" style="color:black;cursor:pointer; background:none;border:none;position:relative; left: 2rem; transform:scale(1.6); "onclick="addtoplaylist(<?php echo $row['s_id'];?>)" name="<?php echo $row['name'];?>" value="<?php echo $row['audio']?>" >
                         <em class="fa fa-music"  ></em>
                         </button>

                         
                         
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  
                  <nav role="navigation" style=" position:relative;left:40px;bottom:30px;">
<ul>

<li><a href="#"><em class="fa fa-exclamation-circle fa-2x" style="color:black;"></em></a>
<ul class="dropdown" style="background-color:white;width:15vw;padding:20px;">
 <li><form method="POST" id="report" action="report.php"  >  
        
        <label >Report option</label>
        </br>
        <input type="checkbox" name="checkbox[]" value="Inappropriate Thumbnail">
        <label>
          Inappropriate Thumbnail</label>
        </br>
        <input type="checkbox" name="checkbox[]"  value="Copied Song">
        <label>
          Copied Song</label>
        </br>
        <input type="checkbox" name="checkbox[]"  value="Inappropriate Song Name">
        <label>
          Inappropriate Song's Name</label>
        </br>
        <input type="checkbox" name="checkbox[]"  value="Inappropriate Song">
        <label>
          Inappropriate Song</label>
        </br>
        <input type="checkbox" name="checkbox[]"  value="Inappropriate lyrics">
        <label>
          Inappropriate lyrics</label>
        </br>
                       
                  <input style="background-color:white; border-radius:10px; border:10px;"   name="comment" placeholder="type here.." type="text" > 
                  </br>
                    <label>Anything to support the Report </label>
                    </br>
                  <input type="hidden" name="s_id" value="<?php echo $row['s_id']?>">
                               
                 
                  <input id='name' class="btn btn-danger" name="report"  type="submit" value="Report">
                  
              </form></li>
</ul>
</li>

</ul>
</nav>
            </div>
            
        <?php 
                          }
        } 
        ?>
          </section><!--.slider-->
                  
          
          <div class="container mt-5">
        <div class="">
                  <h1 class="text-center text-light" >Top Sinplayers</h1>
                </div>
     
        <section class="regular slider col-md-11" id="zen2" style="color:wheat">
        <?php
        $sql="select * from songs GROUP BY a_id LIMIT 10 ";
        
        $row2s=mysqli_query($db_connection,$sql);
        while($rowe2=mysqli_fetch_array($row2s)){  
          
          $sqlji="select * from songs where a_id='".$rowe2['a_id']."'";

          $row2sji=mysqli_query($db_connection,$sqlji);
          $sqlki="select * from users where user_id= ".$rowe2['a_id'];

        $row2ski=mysqli_query($db_connection,$sqlki);
        while($row2ki=mysqli_fetch_array($row2ski)){ 
          $dafaq=0;


          
        ?> 
          <div class="music-box" >
            <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <img src="<?php  echo $row2ki['profile_cover'];?>" alt="artist-profile-picture" height="150px" width="200px" class="br parent rounded-circle">
                </div>
                <div class="flip-card-back" style="white-space:nowrap;overflow:hidden">
                  <h1 class="mt-5"><?php echo $row2ki['username'];?></h1> 
                  <p class="mt-5"><?php echo $row2ki['profile_bio'];?></p> 
                  <p><?php echo $row2ki['state'];?></p>
                </div>
              </div>
            </div>
            <?php  while($row2=mysqli_fetch_array($row2sji)){
         ?>     
            <div class="d-none">
              
              <script>
  
  thissong={
    id:"<?php echo $row2['s_id'];?>" ,
    name:"<?php echo $row2['name'];?>" ,
    thumbnail:"<?php echo $row2['image'];?>",
    audio:"<?php echo $row2['audio'];?>",
    artist:"<?php echo $row2['singer'];?>"
  };
 
  
// console.log(index);

            var contains = echoice.some(elem =>{
          return JSON.stringify(thissong) === JSON.stringify(elem);
        });
        if (contains) {
          
          
          
        } else {
        
          echoice.push(thissong);
        }
  
  </script>
  </div>
  <?php      while($dafaq==0){ ?> 

<div class="child">  
       <button style="background:none;border:none; position:relative; bottom:8.5rem; left:38%;color:white;" onclick="play(this,echoice)" name="" value="<?php echo $row2['s_id']?>" ><i class="fa fa-play fa-2x" aria-hidden="true"></i></button>
 </div> 
<?php $dafaq=1; }} ?> 
  
              <div class="play-list">
                <div class=""><a class="music-detail__link" href="#"></a>
                      <div class="music-card__interactions" id="interactions-trigger">
                        <button class="music-card__interactions-trigger" >
                          
                        </button>                
                      </div>
                  </div>
            </div>
            </div>


          
            
       
        <?php 
        }}
        ?>
  </section>
</div>


            
        <?php
        $sql="select * from songs LIMIT 10 ";
$index=0;
        $row3s=mysqli_query($db_connection,$sql);
            
          
        ?>     
          <div class="container mt-5">
        <div class="">
                  <h1 class="text-center text-light" >Editor's Choice</h1>
                </div>
        <section class="regular slider col-md-11" id="zen2" style="color:wheat">
        <?php while($row3=mysqli_fetch_array($row3s)){ $index++;?>             
              
              <div class="music-box" >
              <div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
                    <img src="<?php echo $row3['image'];?>" height="150px" width="200px" alt="song-thumbnail" class="br parent rounded-circle">
                    </div>
                    <div class="flip-card-back" style="white-space:nowrap;overflow:hidden">
      <h1 class="mt-5"><?php echo $row3['name'];?></h1> 
      <p class="mt-5"><?php echo $row3['singer'];?></p> 
      <p><?php echo $row3['feat'];?></p>
    </div>
    </div>
</div>
<div class="d-none">

  <script>
    
    thissong={
      id:"<?php echo $row3['s_id'];?>" ,
      name:"<?php echo $row3['name'];?>" ,
      thumbnail:"<?php echo $row3['image'];?>",
      audio:"<?php echo $row3['audio'];?>",
      artist:"<?php echo $row3['singer'];?>"
    };
   
    
  
  
              var contains = echoice.some(elem =>{
            return JSON.stringify(thissong) === JSON.stringify(elem);
          });
          if (contains) {
            
            
            
          } else {
          
            echoice.push(thissong);
          }
    
    </script>
    </div>
                  <div class="child">  
                     <button style="background:none;border:none; position:relative; bottom:8.5rem; left:38%;color:white;" onclick="play(this,echoice)" name="" value="<?php echo $row3['s_id']?>" ><i class="fa fa-play fa-2x" aria-hidden="true"></i></button>
               </div> 
              <div class="play-list">
                <div class=""><a class="music-detail__link" href="#"></a>
                      <div class="music-card__interactions" id="interactions-trigger">
                        <button class="music-card__interactions-trigger" >
                        </button>                
                      </div>
                  </div>
            </div>
          </div>
        <?php 
        }?>
      <?php
      }
      ?>
  
        </section>
</div>



    </div>
    <?php
     include 'musicbox.html';
    include "bigmusic.html";?>
    </div>

  </div>
  <audio ontimeupdate="update(this)" autoplay id="myAudio" style="position:fixed; z-index:99; width:110%;display:none; bottom:47px; height:20px; right:-30px;">
  <source src="" type="audio/ogg">
  <source src="" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>
  
 <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script src="./slick/slick.js" type="text/javascript" charset="utf-8"></script>
  <script src="music_login.js" type="text/javascript" charset="utf-8"></script>

 <?php if(isset($_GET['msg']))
    {
        $Message = "Some error occured please try after some time";
        echo '<script type="text/javascript">alert("'.$Message.'");</script>';
    
    }
    if(isset($_GET['suc']))
    {
       $Message="Song Reported Succesfully";
      echo '<script type="text/javascript">alert("'.$Message.'");</script>';
    
    }

?>
</body>
</html>