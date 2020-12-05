var currentTime;
var duration;
var progressbar = document.getElementById('seek-obj');
var bigprogressbar = document.getElementById('bigseek-obj');
const other=document.getElementById('currentt');
var player=document.querySelector("audio");
var music=document.getElementById("music");
// var bigmusic=document.getElementById("bigmusic");
var thumbnail=document.getElementById("image");
var bigthumbnail=document.getElementById("bigimage");
var sname=document.getElementById("songname");
var bigsname=document.getElementById("bigsongname");
var singer=document.getElementById("singer");
var bigsinger=document.getElementById("bigsinger");
var volumeBar = document.getElementById('volume-bar');
var bigvolumeBar = document.getElementById('bigvolume-bar');
var btnMute = document.getElementById('btnMute');
var bigbtnMute = document.getElementById('bigbtnMute');
const body =document.querySelector("body");
var next=document.getElementById("next");
var bignext=document.getElementById("bignext");
var previous=document.getElementById("pre");
var bigprevious=document.getElementById("bigpre");
var share=document.getElementById("share");

var pp=document.getElementById("play");
var bigpp=document.getElementById("bigplay");
var press=0;
var count=0;
var sindex=0;
var d=document.querySelectorAll(".fa-pause");
d.forEach(playpause);




function bigmusic(){	document.querySelector("#bigmusic").classList.remove("d-none");
  document.querySelector(".musicbar").classList.add("d-none");}
  function	musicbar(){	document.querySelector(".musicbar").classList.remove("d-none");
  document.querySelector("#bigmusic").classList.add("d-none");}

function myIndexOf(thisong) {    
  for (var i = 0; i < echoice.length; i++) {
    if (echoice[i].id == thisong) {
      return i;
    }
  }
  return -1;
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






next.addEventListener("click", function(){player.currentTime +=1500;});
bignext.addEventListener("click", function(){player.currentTime +=1500;});

function playnow(theindex){
  sindex=myIndexOf(theindex);
  player.src=echoice[sindex].audio;
  player.play();
// now playing

// change values in musicbar
thumbnail.src=echoice[sindex].thumbnail;
bigthumbnail.src=echoice[sindex].thumbnail;
sname.innerHTML=echoice[sindex].name;
bigsname.innerHTML=echoice[sindex].name;
singer.innerHTML=echoice[sindex].artist;
bigsinger.innerHTML=echoice[sindex].artist;
}
function addtoplaylist(a){
  
  
  sindex=myIndexOf(a)-1;
 
  
}
function play(a,songs){

  
  
  // find index of clicked song
  sindex=myIndexOf(a.value);
  //  done
  share.addEventListener('click',()=>{ navigator.clipboard.writeText("http://localhost/sinplay1/index.php?song="+echoice[sindex].audio);
alert("song url copied to clipboard")});
  
  
  // make musicbar visible
  music.classList.remove("d-none");
  music.style.display="block";
  // now visible

//  Add audio source and play
  player.src=songs[sindex].audio;
  player.play();
// now playing

// change values in musicbar
thumbnail.src=songs[sindex].thumbnail;
bigthumbnail.src=songs[sindex].thumbnail;
sname.innerHTML=songs[sindex].name;
bigsname.innerHTML=songs[sindex].name;
singer.innerHTML=songs[sindex].artist;
bigsinger.innerHTML=songs[sindex].artist;
// now set
// When clicked on previous song
bigprevious.addEventListener("click", function(){ if(sindex===0){player.currentTime -=1500;}else{sindex--;
 //  Add audio source and play
player.src=songs[sindex].audio;
  player.play();
// now playing

// change values in musicbar
thumbnail.src=songs[sindex].thumbnail;
bigthumbnail.src=songs[sindex].thumbnail;
sname.innerHTML=songs[sindex].name;
bigsname.innerHTML=songs[sindex].name;
singer.innerHTML=songs[sindex].artist;
bigsinger.innerHTML=songs[sindex].artist;

}
});
previous.addEventListener("click", function(){ if(sindex===0){player.currentTime -=1500;}else{sindex--;
 //  Add audio source and play
player.src=songs[sindex].audio;
  player.play();
// now playing

// change values in musicbar
thumbnail.src=songs[sindex].thumbnail;
bigthumbnail.src=songs[sindex].thumbnail;
sname.innerHTML=songs[sindex].name;
bigsname.innerHTML=songs[sindex].name;
singer.innerHTML=songs[sindex].artist;
bigsinger.innerHTML=songs[sindex].artist;

}
});
// done
// recently played
$.ajax({
      url: "recentlyplayed.php",
      data: {s_id: songs[sindex].id},
      type: "POST",
      success:function(data){
       
         
      },
      error:function (data){
        console.log(data);
      }
      });
// added



// when song ends
player.onended = function() {
if(sindex==(songs.length-1)){
  console.log("last song")
sindex=0;
}else{
sindex++;
}
//  Add audio source and play
player.src=songs[sindex].audio;
  player.play();
// now playing

// change values in musicbar
thumbnail.src=songs[sindex].thumbnail;
bigthumbnail.src=songs[sindex].thumbnail;
sname.innerHTML=songs[sindex].name;
bigsname.innerHTML=songs[sindex].name;
singer.innerHTML=songs[sindex].artist;
bigsinger.innerHTML=songs[sindex].artist;

}



}





// manage volume
volumeBar.addEventListener("change", function(evt) {
player.volume = parseInt(evt.target.value) / 10;
});
bigvolumeBar.addEventListener("change", function(evt) {
player.volume = parseInt(evt.target.value) / 10;
});
function changeButtonType(btn, value) {
btn.title     = value;
btn.innerHTML = value;
btn.className = value;
}
player.addEventListener('volumechange', function(e) { 
// Update the button to be mute/unmute
if (player.muted) changeButtonType(btnMute, '<i title="unmute" style=" font-size:25px;" class="fa fas cute fa-volume-off"></i>');
else changeButtonType(btnMute, '<i title="mute" style=" font-size:25px;" class="fa fas cute fa-volume-up"></i>');
}, false);	
function muteVolume() {
if (player.src) {
  if (player.muted) {
    // Change the button to a mute button
    changeButtonType(btnMute, '<i title="mute" style=" font-size:25px;" class="fa fas cute fa-volume-up" ></i>');
    player.muted = false;
  }
  else {
    // Change the button to an unmute button
    changeButtonType(btnMute, '<i title="unmute" style=" font-size:25px;" class="fa fas cute fa-volume-off" ></i>');
    player.muted = true;
  }
}
}

// we managed
// managing keypress events
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

// we did it
// adjusting progressbar and current
// update with time
function update(element){

currentTime=Math.floor(element.currentTime);
duration=Math.floor(element.duration);

other.innerHTML= Math.floor((currentTime)/60)+':'+ Math.floor((currentTime)%60) + ' / ' +Math.floor((duration)/60)+':'+ Math.floor((duration)%60);
progressbar.setAttribute("value",(currentTime / duration));
bigprogressbar.setAttribute("value",(currentTime / duration));
 }

// update on click
 progressbar.addEventListener("click", seek);
 bigprogressbar.addEventListener("click", seek);

function seek(e) {
  var percent = e.offsetX / this.offsetWidth;
  player.currentTime = percent * player.duration;
  progressbar.value = percent ;
  bigprogressbar.value = percent ;
}
//  adjustment working
     $(document).on('ready', function() {
  
        
        
        $(".regular").slick({
          dots: false,
          infinite: false,
          slidesToShow: 4,
          slidesToScroll: 1,
           responsive: [
                  {
                    breakpoint: 1024,
                    settings: {
                      slidesToShow: 3,
                      slidesToScroll: 1,
                      infinite: false,
                      dots: false
                    }
                  },
                  {
                    breakpoint: 600,
                    settings: {
                      slidesToShow: 2,
                      slidesToScroll: 1
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
          lazyLoad: 'automatic', // ondemand progressive anticipated
          infinite: true
         
        });
  
  
  
             
  
      });
  


 function like(element,a) {
   
  let $button = $(element);
  if( $button.hasClass('like')){
    
    $button.addClass('liked');
    $button.removeClass('like');
    $button.css('color','red');
  $.ajax({
      url: "like.php",
      data: {s_id: a},
      type: "POST",
      success:function(data){
        console.log(data);
          $("#" + a).html(data);
      },
      error:function (data){
        console.log(data);
      }
  });
  }
else{
$button.addClass('like');
$button.removeClass('liked');
  $button.css('color','black');

  $.ajax({
      url: "like.php",
      data: {sid:a},
      type: "POST",
      success:function(data){
        console.log(data);
          $("#" + a).html(data);
      },
      error:function (data){
        console.log(data);
      }
  });
 }
 }