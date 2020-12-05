<!DOCTYPE html>
<html>
<?php 
include 'db_connection.php';
session_start()?>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<!-- bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/yourcode.js"></script>


<link rel="stylesheet" href="css/style.css" >  
<link rel="stylesheet" href="artistprofile.css" >
<link rel="stylesheet" href="Dashboard.css" >

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
  <?php include 'navbar1.html'; 
  $current_singer="akay";
?>
<script>
  var echoice=[];
  var thissong;
</script>
<!-- <style> 

        /* #loader { 

transform: scale(2);
  z-index:99;

  width: auto;
  height: auto;
  background: url('img/gf.gif') no-repeat center ;
        }  */
          
        /* @keyframes spin { 
            100% { 
                transform: rotate(360deg); 
            } 
        }  */
          
        .center { 
            position: absolute; 
            top: 0; 
            bottom: 0; 
            left: 0; 
            right: 0; 
            margin: auto; 
        } 
    </style>  -->
       <script> 
        // document.onreadystatechange = function() { 
        //     if (document.readyState !== "complete") { 
        //         document.querySelector( 
        //           "body").style.visibility = "hidden"; 
        //         document.querySelector( 
        //           "#loader").style.visibility = "visible"; 
        //     } else { 
        //         document.querySelector( 
        //           "#loader").style.display = "none"; 
        //         document.querySelector( 
        //           "body").style.visibility = "visible"; 
        //     } 
        // }; 
        document.onreadystatechange = function() {

           
if (document.readyState !== "complete") { 
    document.querySelector( 
      "body").style.visibility    = "hidden"; 
      document.querySelector( 
        "#loader").style.visibility = "visible"; 
       
      
     
      
} else { 
  setTimeout(callme, 2000);
    
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
  <div class="container-fluid">
    		<div class="row">
             <div class="col-md-3 grey text-center mx-auto">
                <div class="h-100 d-inline-block" >
                   <ul class="">
             	       	<li class="listitem " ><?php $aka=mysqli_query($db_connection,"SELECT * from users where user_id = ".$_SESSION['u_id']) ; 
                            $ani1=mysqli_fetch_array($aka);?>
             		          <span style="font-size: 1.5rem; ">
                           <img src="<?php echo $ani1["profile_cover"] ?>" class="
                           rounded-circle" width="100px"/>
                            <p><?php
                            echo $ani1['username'];
                            ?><br></p>
                          </span>
             	                     	<!-- <strong class="logotext"> Sinplay </strong>	 -->
             	        	</li>
             	      	<li class="listitem" >
                 
             		           <div class="btn-group ">
                            <div class="flip-cardsin">
  <div class="flip-card-innersin">
    <div class="flip-card-frontsin" style="width: auto;">
                              <button type="button" class="btn btn-dark"><em class="fa fa-bar-chart px-4 zoom2  " id="rank" style="font-size: 26px; padding-bottom: 21px;   padding-top: 25px;"></em><em class="fa fa-caret-right px-4 zoom2"  style="font-size: 26px; padding-bottom: 21px;padding-top: 25px;"></em></button>
                            </div>
                           <div class="ranknum"><p> Total Streams =
                             <?php $select=mysqli_query($db_connection,"SELECT SUM(splay) from songs WHERE a_id=".$_SESSION['u_id']);
                             $select=mysqli_fetch_assoc($select);
                             echo $select['SUM(splay)']; ?>
                           </p></div>
  </div>
                            </div>
             		           </div>	
             	           	</li>
                      <li class="listitem" style="margin-top: 2rem">
                        <div class="btn-group ">
                        <div class="flip-cardsin">
  <div class="flip-card-innersin">
    <div class="flip-card-frontsin" style="width: auto;">
                          <button type="button" class="btn btn-dark"><em class="fa fa-heart px-4 zoom2 " id="rank" style="font-size: 26px; padding-bottom: 21px;padding-top: 25px;"></em><em class="fa fa-caret-right px-4 zoom2 "  style="font-size: 26px; padding-bottom: 21px;padding-top: 25px;"></em></button>
                        </div>
                        </div>
                         <p> Total Likes =
                         <?php $select=mysqli_query($db_connection,"SELECT SUM(Likes) from songs WHERE a_id=".$_SESSION['u_id']);
                             $select=mysqli_fetch_assoc($select);
                             echo $select['SUM(Likes)']; ?>
                             </p>
  
                        </div>
                        </div>
             	          	</span>	
             		     </li>
                       <li class="listitem" style="margin-top: 2rem">
                       <div class="flip-cardsin">
  <div class="flip-card-innersin">
    <div class="flip-card-frontsin" style="width: auto;">
                          <div class="btn-group px-0 ">
                             <button type="button" class="btn btn-dark"><img src="img/intro.png" style="width: 5.1rem; height: 3.6rem" class=" zoom2 " id="rank" ><em class="fa fa-caret-right px-4 zoom2 "  style="font-size: 26px; padding-bottom: 21px;padding-top: 25px;"></em></button>
                          </div>
                        
                        <p>Sinboard Position= <?php
                        $select=mysqli_query($db_connection,"SELECT Ind from sinboard WHERE u_id=".$_SESSION['u_id']);
                             $select=mysqli_fetch_assoc($select);
                             echo $select['Ind']; ?>
                        </p>
    </div>
  </div>
                       </div>
                         </li>
                   </ul>
                      <li>
                      
                          <div class="px-3 py-3">
                          <?php  if(isset($ani1['facebooklink'])){?>
                                    <div title="<?php echo $ani1['facebooklink'];?>" class="social facebook">
                                      <a href="http://<?php echo $ani1['facebooklink'];?>">
                                        <i class="fa fa-facebook fa-5x" style="color: black;"></i> 
                                      </a>      
                                    </div>
                        <?php }
                          if(isset($ani1['twitterlink'])){
                        ?>
                                    <div title="<?php echo $ani1['twitterlink'];?>" class="social twitter">
                                    <a href="<?php echo $ani1['twitterlink'];?>">
                                        <i class="fa fa-twitter fa-5x" style="color: black;" ></i>   
                                    </a>
                                    </div>
                                    </div>
                          <?php }?>
                                    
                                    <div class="px-3 py-3">
                                    <?php if(isset($ani1['pinterestlink'])){?>
                         
                                    <div title="<?php echo $ani1['pinterestlink'];?>" class="social pinterest">
                                    <a href="<?php echo $ani1['pinterestlink'];
                                    ?>">
                                        <i class="fa fa-pinterest fa-5x" style="color: black;" ></i>  
                                    </a>
                                    </div> 
                                    <?php } if(isset($ani1['youtubelink'])){?>
                                    <div title="<?php echo $ani1['youtubelink'];?>" class="social youtube">
                                    <a href="<?php echo $ani1['youtubelink'];?>">
                                        <i class="fa fa-youtube fa-5x" style="color: black;"></i>  
                                    </a>   
                                    </div>
                                    <?php }?>
                                    </div>
                                   
                
                     </li>
                 
                    </ul>
               </div>
             </div>
  <div class="col-md-9 mt-5" style="background:black;">
  <div class="searchBox">
                   <button class="searchButton" href="#">
    <i class="fa fa-search fa-2x"></i>
  </button>
  <input class="searchInput" type="text" name="" placeholder="Search" required>
  
</div>

             		<div  style="height: 40px; margin-top: 10px;" class="container-fluid">

             			<div class="col-md-4" style="float: right;">

             					<div class="col-md-8">
             						<p style="padding: 5px; text-align: center;background-color: #00ace6;color: #fff;"> Rank  1234</p>
             					</div>
             					
                      </div>
                       
             			</div>
                   

<!------ Include the above in your HEAD tag ---------->

                <h1 style="color: #e8edf3" class="mt-5 text-center" >Most Liked</h1>

                        <section class="regular slider responsive">
<?php 
         $qu= "SELECT * FROM songs WHERE a_id = '".$_SESSION['u_id']."'GROUP BY Likes DESC ";
          $res = mysqli_query($db_connection, $qu);
          while($s_id = mysqli_fetch_array($res))
        {
           ?>       
          
    <div class="music-box" >
                  <?php
                   $rows=mysqli_query($db_connection,"SELECT * from songs where s_id = ".$s_id['s_id'] ) ;
                  while($row = mysqli_fetch_array($rows))
                  {
                    ?>
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
                    <li >
                        <button style="background:none;border:none; position:relative; top:4rem; left:44%;color:white;" onclick="play(this,echoice)" name="" value="<?php echo $row['s_id']?>" ><i class="fa fa-play" aria-hidden="true"></i></button>
                      </li>
                        <img src="<?php echo $row['image'];?>" alt="song-thumbnail" class="br parent rounded">
             <div class="child"> </div> 
        <div class="play-list">
        <div class="music-card__content "><a class="music-detail__link" href="#">
          <h3 class="music__heading text-center pt-2"><span class="music__heading--artist u-trunc u-d-block"><?php echo $row['name'];?></span></h3>
          </a>
            
            <div class="u-trunc u-ls-n-05 u-lh-13"><strong>Feat. <a href="#"><?php echo $row['feat'];?></a></strong></div>

                <div class="u-trunc u-ls-n-05 u-lh-13">by 
                  <a data-popover="true" href="artistview1.php?a_id=<?php echo $row['a_id'];?>"><strong><?php echo $row['singer'];?></strong></a>
                </div>
               
                <div class="container" style="margin-top: 5%;">  
                      <div class='row mt-4'>
                        <?php $check=mysqli_query($db_connection,"SELECT * FROM likes WHERE userid='".$_SESSION['u_id']."'AND s_id=".$row['s_id']);
                        
                        if(mysqli_num_rows($check)>0){
                         
                        ?>
                      <button class='mx-left liked' onclick="like(this,<?php echo $row['s_id']?>)" value="<?php echo $row['s_id']?>" style="color:red; background:none;border:none;position:relative; left: 1rem;transform:scale(1.4);" >
                        <i class='fa fa-heart ' id="<?php echo $row['s_id']?>"   > </i>
                          </button>
                        <?php } else { ;?>
                          <button class='mx-left like ' onclick="like(this,<?php echo $row['s_id']?>)" value="<?php echo $row['s_id']?>"  style="color:black; background:none;border:none;position:relative; left: 1rem;transform:scale(1.4);" >
                        <i class='fa fa-heart ' id="<?php echo $row['s_id']?>"  > </i>
                          </button>
                        <?php }?>
                        
                        <button title="Add To Sinboard" onclick="sin(this,<?php echo $row['s_id'] ?>)" style="color:black; background:none;border:none;position:relative; left: 2rem; transform:scale(1.3); ">
                         <i class="fa fa-music"  ></i>
                         </button>
                         <button  style="margin-left: 60% ; position:relative; border:none;background:none; transform:scale(1.4); " onclick="myFunction(this,'<?php echo $row['feat'];?>')" value="<?php echo $row['s_id']?> " name="<?php echo $row['name']?>">
                              <i class="fa fa-edit"></i>
                      </button>
            
              </div>
                    </div>
            
            </div>

      </div>
    </div>
    
<?php 
 } }
?>
  
</section>



   
   <div class="profile profileicon py-2 px-2 " style="position: fixed;right: 95px;bottom: 11%;z-index: 1;">
   <button class ="b1" onclick="myFunction2(this)" value="<?php echo $_SESSION['u_id']?>">
   <i class="fa fa-user fa-5x text-primary mt-3" ></i>
   </button>
  

</div>


   
   <h1 style="color: #e8edf3" class="mt-5 text-center" >All Uploads</h1>
                        <section class="regular slider responsive">

<?php 
         $qu= "SELECT * FROM songs  WHERE a_id ='".$_SESSION['u_id']. "'";
          $res = mysqli_query($db_connection, $qu);
          while($s_id = mysqli_fetch_array($res))
           { ?>        
      
        <div class="music-box" >
                  <?php $rows=mysqli_query($db_connection,"SELECT * from songs where s_id = ".$s_id['s_id']) ;
                  while($row = mysqli_fetch_array($rows))
                  {?>
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
                  <li >
                        <button style="background:none;border:none; position:relative; top:4rem; left:44%;color:white;" onclick="play(this,<?php echo $row['s_id'];?>)" name="<?php echo $row['name'];?>" value="<?php echo $row['audio']?>" ><i class="fa fa-play" aria-hidden="true"></i></button>
                      </li>
                        <img src="<?php echo $row['image'];?>" alt="song-thumbnail" class="br parent rounded">
             <div class="child"> </div> 
        <div class="play-list">
        <div class="music-card__content "><a class="music-detail__link" href="#">
          <h3 class="music__heading text-center pt-2"><span class="music__heading--artist u-trunc u-d-block"><?php echo $row['name'];?></span></h3>
          </a>
            
            <div class="u-trunc u-ls-n-05 u-lh-13"><strong>Feat. <a href="#"><?php echo $row['feat'];?></a></strong></div>

                <div class="u-trunc u-ls-n-05 u-lh-13">by 
                  <a data-popover="true" href="artistview1.php?a_id=<?php echo $row['a_id'];?>"><strong><?php echo $row['singer'];?></strong></a>
                </div>
               
                <div class="container" style="margin-top: 5%;">  
                      <div class='row mt-4' >
                        <?php $check=mysqli_query($db_connection,"SELECT * FROM likes WHERE userid='".$_SESSION['u_id']."'AND s_id=".$row['s_id']);
                        
                        if(mysqli_num_rows($check)>0){
                         
                        ?>
                      <button class='mx-left liked' onclick="like(this,<?php echo $row['s_id']?>)" value="<?php echo $row['s_id']?>" style="color:red; background:none;border:none;position:relative; left: 1rem;transform:scale(1.4);" >
                        <i class='fa fa-heart ' id="<?php echo $row['s_id']?>"   > </i>
                          </button>
                        <?php } else { ;?>
                          <button class='mx-left like ' onclick="like(this,<?php echo $row['s_id']?>)" value="<?php echo $row['s_id']?>"  style="color:black; background:none;border:none;position:relative; left: 1rem;transform:scale(1.4);" >
                        <i class='fa fa-heart ' id="<?php echo $row['s_id']?>"  > </i>
                          </button>
                        <?php }?>
                        
                        <button title="Add To Sinboard" onclick="sin(this,<?php echo $row['s_id'] ?>)" style="color:black; background:none;border:none;position:relative; left: 2rem; transform:scale(1.3); ">
                         <i class="fa fa-music"  ></i>
                         </button>
                          <button  style="margin-left: 60% ; position:relative; border:none;background:none; transform:scale(1.3); " onclick="myFunction(this,'<?php echo $row['feat'];?>')" value="<?php echo $row['s_id']?> " name="<?php echo $row['name']?>">
                            <i class="fa fa-edit"></i>
                      </button>
            
              </div>
                    </div>
            
            </div>

      </div>
    </div>  
<?php 
} }
?>
</section>
 <script>
     var feat;
function myFunction(event, fe) {
  const a = event.value;
  const name = event.name;
  document.querySelector(".bg-modal").style.display='flex';
  const b= document.getElementById("songid");
  b.value=a;
  console.log(a);
  const c= document.getElementById("sname");
  c.value=name;
  console.log(name);
  const d= document.getElementById("feat");
  d.value=fe;
  console.log(fe);
}
function myFunction2(event){
  document.querySelector(".song").style.display='flex';
}
</script>



   
              
            </div>
          </div>

     


    </div>
	 </div>



   </div>



   
   
<!-- popup -->

<div class=" bg-modal ">
<div class="container">
<div class="modal-content" style="height: fit-content; margin-top: 15%;" >
  <button type="button" class="close" onclick="myFunction1(this)"  ><i class="fa fa-times" aria-hidden="true"></i>
  </button>
  <h1 class="mt-5">Edit Song Details</h1>
  <form  id="popup" method="POST" onsubmit="return" name="editsong" action="songedit.php" enctype="multipart/form-data" >
  <input class="loginphone zoom2" type="text" id="sname"  name="sname"  style="padding: 0px 0px 0px 12px;" placeholder="Song Name" >
     <input class="loginphone zoom2" type="hidden" name="songid"  id="songid"  placeholder="Artist" >
    <input class="loginphone zoom2" type="text" id="feat" name="feat"  style="padding: 0px 0px 0px 12px;" placeholder="Feat" >
    <div class="row">    
    <label class="btn-outline-info mb-3 py-1 btn-rounded btn-block col-md-5 " style="margin: 0px 0px 0px 115px;border-radius: 15rem;height: 3rem;" >
      <i class="fa fa-image  fa-2x mr-3 text-primary"  aria-hidden="true"></i> Thumbnail
      <input type="file"  id="uploadimg" name="thumbnail" aria-label="File browser example" value="" style="  filter: alpha(opacity=0); opacity: 0; " accept="*/image">
      </label>
      <img  id="blah" style="height: 50px; font-size:9px;" class="rounded-circle col-md-2" src="#" alt="your image">
    </div>
<div class="mt-2 mb-2 row">
<input  type="submit" name="edit" class="login zoom2 col-md-5 " style="margin: 0px 25px 10px 125px;" value="Edit">
  <label  style="margin-top: inherit;">
<button type="submit" style="border: none;  background: transparent;" name="delete" value=" ">
  <i class="fa fa-trash fa-3x" style="color: red;">
</i>
</button>
  </label>
</div>
  </form>
</div>
</div>
</div>
<div class="song" id="song" style="display:none;top:32%;left:0%; width:100%; height:137%;position:absolute;background-color:rgba(0, 0, 0, 0.7);">
<div class="container">
<div class="modal-content2" style="width: auto;">
  <button type="button text-danger" class="close" onclick="myFunction3(this)" style="top: 2%;right: 12%;opacity: 0.5;color: red;">
  <i class="fa fa-times" aria-hidden="true"></i>
  </button>
<?php 
$sql=mysqli_query($db_connection,"SELECT * FROM users WHERE user_id = ".$_SESSION['u_id']);
$sql1=mysqli_fetch_array($sql);
?>
  <div class="container mt-4 rounded bg-white " style=" height: auto; padding: 2rem;">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center py-2">
              <img class="rounded-circle rounded-circle m4-sm-2 mt-1 mx-auto d-block" src="<?php echo $sql1['profile_cover']?>"  width="120" height="150" >
            <span class="font-weight-bold"><?php echo $sql1['username']?></span>
            <span class="text-black-50"><?php echo $sql1['user_email']?></span><span> </span></div>
<form  id="social_link" method="POST" onsubmit="return updateurl1()" name="social_links" action="linkedit.php" enctype="multipart/form-data">
            <div class="row">
            <label class="btn-outline-info col-md-7 ml-5" style=" border-radius: 15rem;text-align-last: center;" >
      <i class="fa fa-image  fa-2x mr-3 text-primary"  aria-hidden="true" ></i> Change Photo
      <input type="file" id="uploadimg1" name="coverimage" aria-label="File browser example" style="  filter: alpha(opacity=0);
  opacity: 0; " accept="*/image">
            </label>
            <img  id="blah1" style="height: 50px; font-size:9px;" class="col-md-3 mb-2 rounded-circle" src="#" alt="uploaded img">
            </div>

            <div class="col-md-12">
              <div class="row">
                                    <div class="social1 facebook">
                                        <i class="fa fa-facebook "></i>       
                                    </div>
                                  
                                    <input type="text" id="facebooklink" onchange="updateurl()"  name="facebooklink" class="form-control mb-auto" style="width: 70%;" placeholder="facebook profile link" value="<?php echo $sql1['facebooklink']?>">
              </div><div class="row">
                                    <div class="social1 twitter">
                                        <i class="fa fa-twitter "></i>   
                                    </div>
                                    <input type="text" id="twitterlink" onchange="updateurl()" name="twitterlink" class="form-control mb-auto" style="width: 70%;" placeholder="Twitter profile link" value="<?php echo $sql1['twitterlink']?>">
            </div><div class="row">
                                    <div class="social1 pinterest">
                                        <i class="fa fa-pinterest "></i>  
                                    </div> 
                                    <input type="text" id="pinterestlink" onchange="updateurl()" name="pinterestlink" class="form-control mb-auto"style="width: 70%;" placeholder="Pinterest profile link" value="<?php echo $sql1['pinterestlink']?>">
        </div> <div class="row">
                                    <div class="social1 youtube">
                                        <i class="fa fa-youtube "></i>     
                                    </div>
                                    <input type="text" id="youtubelink" onchange="updateurl()" name="youtubelink" class="form-control mb-auto" style="width: 70%;"placeholder="Youtube Channel link" value="<?php echo $sql1['youtubelink']?>">
                                    </div>
  </div>
<div class=" text-center"><button class="btn btn-primary profile-button mb-auto" id='upadte'  name="update"value="update" type="submit">Upload </button></div>
         
            </form>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form  id="social_link" method="POST" onsubmit="" name="social_links" action="profileedit.php" >
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Full Name</label><input type="text" class="form-control" name="username" placeholder="Your Name" value="<?php echo $sql1['username']?>"></div>
                      </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">PhoneNumber</label><input type="text" class="form-control" name="phoneno" placeholder="enter phone number" value="<?php echo $sql1['user_phoneno']?>"></div>
                    <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" name="email" placeholder="enter email id" value="<?php echo $sql1['user_email']?>"></div>
                 </div>
                 <div class="row mt-3">
                 <div class="col-md-12"><label class="labels">Bio </label>
                              <input type="text"  class="form-control" rows="5" name="bio" placeholder="My Bio" value="<?php echo $sql1['profile_bio']?>">
                            </div>
                          </div>
                        
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" name="country" placeholder="country" value="<?php echo $sql1['country']?>"></div>
                    <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" name="state" value="<?php echo $sql1['state']?>" placeholder="state"></div>
                </div>

                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" value="profile" name="profile">Save Profile</button></div>
                </form>
              </div>
        </div>

        <div class="col-md-4">
            <div class="p-3 py-3">
            <form  id="passwordedit" method="POST" onsubmit="" name="passwordedit" action="editpassword.php" >
                <div class="d-flex justify-content-between align-items-center experience"><span>Change Password</span></div><br>
                <div class="col-md-12"><label class="labels">Current Password</label><input name="oldpassword" type="text" class="form-control" placeholder="Old Password" value=""></div> <br>
                <div class="col-md-12"><label class="labels">New Password</label><input type="text" name="newpassword" class="form-control" placeholder="New Password" value=""></div>
                <div class="mt-5 text-center"><button class=" mt-3 btn btn-primary profile-button" value="change" type="submit" name="change" type="button">Change</button></div>
            </form>
              </div>
        </div>
    </div>
</div>


    

  </form>
</div>
</div>
</div>







  
 <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script src="./slick/slick.js" type="text/javascript" charset="utf-8"></script>
<script>
  const tlmx = new TimelineMax();
tlmx.set(".text", { y: 0, opacity: 0 });
tlmx.to(".text", 0.6, {
  y: 40,
  opacity: 1,
  ease: Power4.easeOut,
  delay: 0.4
});
  
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
         
    });

     $("#interations-trigger").click(event=>{
        if ($(event.target).hasClass('tooltip--active')) {
            $("#tooltip-fav").removeClass("tooltip--active");
        }
    }); 

    // $("#artist").hover(
    //   function () {
    //     $(".artist-tooltip").addClass("bg-danger");
    //   },
    //   function () {
    //     $(".artist-tooltip").removeClass("tooltip--active");
    //   }
    // );
    
    
        $(document).on('ready', function() {
    
          
          
          $(".regular").slick({
            dots: true,
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 2,
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

function sin(element,a) {
     
    $.ajax({
        url: "addsin.php",
        data: {s_id: a},
        type: "POST",
        success:function(data){
alert(data);
        },
        error:function (data){
          alert(data);
        }
    });
    }



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

function updateurl()
{
    var url = $('#youtubelink').val();
    var url1 = $('#facebooklink').val();
    var url2 = $('#pinterestlink').val();
    var url3 = $('#twitterlink').val();
        if(url1 != undefined || url1 != '') {

          var regExp = /^.*(twitter.\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
          var match1 = url1.match(regExp);
          if (match1 && match1[2].length == 11) {
            
            document.getElementById('facebooklink').style.borderColor="green";
           
                               }
          else {
            document.getElementById('facebooklink').style.borderColor="red";
      
                               // Do anything for not being valid


          }
      }
      if (url != undefined || url != '') {
          

          var regExp = /^.*(youtube.\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
          var match = url.match(regExp);
          if (match && match[2].length == 11) {
            
            document.getElementById('youtubelink').style.borderColor="green";
            

                   }
          else {
            document.getElementById('youtubelink').style.borderColor="red";
          
                               // Do anything for not being valid


          }
      }
      if (url2 != undefined || url2 != '') {
          

          var regExp = /^.*(facebook.\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
          var match2 = url2.match(regExp);
          if (match2 && match2[2].length == 11) {
            
            document.getElementById('pinterestlink').style.borderColor="green";
            

                   }
          else {
            document.getElementById('pinterestlink').style.borderColor="red";
            
                               // Do anything for not being valid
                              

          }
      }
      if (url3 != undefined || url3 != '') {
          

          var regExp = /^.*(youtube.\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
          var match3 = url3.match(regExp);
          if (match3 && match3[2].length == 11) {
            
            document.getElementById('twitterlink').style.borderColor="green";
            console.log("1");
           
                   }
          else {
            document.getElementById('twitterlink').style.borderColor="red";
            console.log("1");
            
                               // Do anything for not being valid


          }
      }
};
function updateurl1(){
var url = $('#youtubelink').val();
    var url1 = $('#facebooklink').val();
    var url2 = $('#pinterestlink').val();
    var url3 = $('#twitterlink').val();
        if(url1 != undefined || url1 != '') {

          var regExp = /^.*(twitter.\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
          var match1 = url1.match(regExp);
          if (match1 && match1[2].length == 11) {
            
            document.getElementById('facebooklink').style.borderColor="green";

                               }
          else {
            document.getElementById('facebooklink').style.borderColor="red";
            return false;
                               // Do anything for not being valid


          }
      }
      if (url != undefined || url != '') {
          

          var regExp = /^.*(youtube.\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
          var match = url.match(regExp);
          if (match && match[2].length == 11) {
            
            document.getElementById('youtubelink').style.borderColor="green";


                   }
          else {
            document.getElementById('youtubelink').style.borderColor="red";
            return false;
                               // Do anything for not being valid


          }
      }
      if (url2 != undefined || url2 != '') {
          

          var regExp = /^.*(facebook.\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
          var match2 = url2.match(regExp);
          if (match2 && match2[2].length == 11) {
            
            document.getElementById('pinterestlink').style.borderColor="green";
            
                   }
          else {
            document.getElementById('pinterestlink').style.borderColor="red";
            
                               // Do anything for not being valid
                               return false;

          }
      }
      if (url3 != undefined || url3 != '') {
          

          var regExp = /^.*(youtube.\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
          var match3 = url3.match(regExp);
          if (match3 && match3[2].length == 11) {
            
            document.getElementById('twitterlink').style.borderColor="green";
            console.log("1");

                   }
          else {
            document.getElementById('twitterlink').style.borderColor="red";
            console.log("1");
            return false;
                               // Do anything for not being valid


          }
      }
};
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
function readURL1(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah1').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#uploadimg1").change(function() {
  readURL1(this);
});
</script> 
</html>