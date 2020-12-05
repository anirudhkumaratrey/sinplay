<html>
  <?php 
  require "navbar.html";
  ?>
<head>
<!-- <link rel="stylesheet" href="Dashboard.css" >  -->
  <link rel="stylesheet" href="aboutus.css" >
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    
  <script>
    function change_tab(id)
    {
      document.getElementById("pagecontent").innerHTML=document.getElementById(id+"_desc").innerHTML;
   document.getElementById("page1").className="notselected";
   document.getElementById("page2").className="notselected";
   document.getElementById("page3").className="notselected";
   document.getElementById(id).className="selected";
    }
  </script>	
  
</head>
<body onload="myFunction()" style="margin:0;">

<div id="loader">

<div style="display:none;" id="myDiv" class="animate-bottom">

<div id="main_content">
  <div style="text-align: center">
  <div class="panel panel-primary desktop ">
  <div class="panel-heading">
    <div style="text-align: center;">
  <h3 class="panel-title">
   <ul class="nav panel-tabs">
    <li class="selected" id="page1" onclick="change_tab(this.id);">About Us</li>
    <li class="notselected" id="page2" onclick="change_tab(this.id);">Our Team</li>
    <li class="notselected" id="page3" onclick="change_tab(this.id);">Contact Us</li>
</ul>
</h3>
</div>
  </div>
  
<div class='hidden_desc' id="page2_desc">
  <div class="container-fluid">
    <div class="col-sm-12 col-md-12 col-lg-12">
      
 <h1 style="padding-left: 5;"> Welcome

<p> We are a team . Our team was originally created as part of a project in which we were supposed to create a Music Platform in the web design application Scratch. </p>
<p> Since the Scratch project, we have taken on many more endeavors, such as learning HTML and CSS in order to create web pages of our own instead of relying on other applications to see our creative visions through.
<p>Thanks to our team member Mr. subodh Singh to help us and guide us in this</p>  
<p>We are a team that strives to meet the expectations of a Artist in order to make a better and more efficient Music Streaming Platform.   </p>
    <p> Our team is made up of four people- Aakash Sharma, Aayush upadhyay, Nishant Upadhyay, Subodh Singh . </p>
    <p>   The goal of our team is to make our Music Streaming Platform a better and happier place by giving them the chance to show thier creativity and talent to the audience  involved in our Platform, professional and businesslike artist are welcomed here and some features are introduced by our team while keeping the wellbeing of artist in mind.   </p>
  </h1>
</div>
</div>

</div>

<div class='hidden_desc' id="page1_desc">
<div class="container-fluid">
  <div class="col-sm-12 col-md-12 col-lg-12">
    

    <h1 style="padding-left: 5px;">About Us
      <p >
       Here at sinplay we believe that music is not just entertainment,it is a connection that combines us all together as whole.<br>
      </p>
     <p>We have realized that there are very few resources available to promote your musical creativity and because of this, dreams of many talened artists get crushed everyday.</p>
     <p>So we have taken the initiative to make this process easy and fun for everyone.</p>
     <p>With sinplay it is easy to produce and promote your own music or just listen to countless amazing tracks for free.<br>
    
     <p>Now it doesn't matters what resources you have or not, all that  is needed is just original creativity <br>
    
     <p>Our mission is to inspire creativity with fun.<br></p></h1>
    </div>
</div>
</div>
<div id="pagecontent">
  <div class="container-fluid">
    <div class="col-sm-12 col-md-12 col-lg-12">
      
  
  <h1 style="padding-left: 5px;">About Us
  <p >
   Here at sinplay we believe that music is not just entertainment,it is a connection that combines us all together as whole.<br>
  </p>
 <p>We have realized that there are very few resources available to promote your musical creativity and because of this, dreams of many talened artists get crushed everyday.</p>
 <p>So we have taken the initiative to make this process easy and fun for everyone.</p>
 <p>With sinplay it is easy to produce and promote your own music or just listen to countless amazing tracks for free.<br>

 <p>Now it doesn't matters what resources you have or not, all that  is needed is just original creativity <br>

 <p>Our mission is to inspire creativity with fun.<br></p></h1>
      </div>
  </div>
</div>

  <div class='hidden_desc' id="page3_desc">
    <div class="container-fluid">
  <div class="row" style="padding-top: 150px;">
    <div class="col-md-12 text-center" >
                             <div class="social google-pluse">
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
        <div class="social linkedin">
            <i class="fa fa-linkedin fa-5x"></i>   
        </div>      
        </div>
        <div class="social youtube">
            <i class="fa fa-youtube fa-5x"></i>     
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
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 3000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "flex";
}
</script>

</body>
</html>