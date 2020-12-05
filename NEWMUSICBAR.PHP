<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>newmusicbar.php</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <style>
        body{
            background-attachment:fixed;
            background-size:50%;
        }
        #songButton{
            display:inline-block;
            width:60%;
            height:55px;
            padding-right:1px;
            margin-left:-10px;
            background:linear-gradient(to left,rgba(16,0,0,1));

        }
    </style>
</head>
<body id="body">
    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-4 col-sm-12 playbox">
<table  id="myTable" >
    <caption>Monthly savings</caption>
    <th id="as"></th>
    <tr>
        <td colspan="3">
            <img src="img/2.jpg" id="albumArt" width:50px; height:20px; alt="">

        </td>
    </tr>
    <tr>
        <td colspan="1">
            <button class="btn btn-primary" data-toggle="tooltip" tittle="seek in +15s" onclick="seekplus()"><span>>></span></button>
        </td>
        <td><button class="btn btn-primary" data-toggle="tooltip" tittle="seek in -15s" onclick="seekminus()"><span><<</span></button></td>
        <td><marquee id="titlemarquee" behavior="scroll" delay="1400" direction=""></marquee></td>
    </tr>
    <tr>
        <td colspan="1">
            <form action="#" method="post" id="form" enctype="multipart/form-data">
            <lable class="btn_add" data-toogle="tooltip" title="add new songs" data-placement="bottom" >
                <input type="file" name="upload[]" id="file" multiple="multiple"/>
                Add
            </lable>
                <input type="submit" name="uploadSong" hidden>
                </form>

                <script>
                    document.getElementById("file").onchange=function(){
                        var sub= document.getElementById("form").submit();
                    }
                </script>
        </td>
        <td>
            <button class="btn btn-primary"  data-toogle="tooltip" title="next" data-placement="bottom" onclick="next()"  > -> </button>
        </td>
        <td colspan="2">
            <audio src="" controls autoplay id="player">
                <source src="" id="uploadFile" type="audio/mp3">
            </audio>
        </td>
    </tr>
</table>
        </div>
    </div>
<div class="row">
    <?php 
    require_once('getID3-master\getid3\getid3.php');
    $getid3=new getID3;
    error_reporting( E_ERROR | E_WARNING | E_PARSE );
    $total= count( $_FILES['upload']['name']);
                    for($y=0;$y<$total;$y++){
                $tempFilePath=$_FILES['upload']['tmp_name'][$y];
                $file=$_FILES['upload']['name'][$y]  ;
                $newFilePath="mp3/".$file;
                if(!move_uploaded_file($tempFilePath,$newFilePath)){
                    echo "unable to upload";
                }      
                    }
                    chdir('./mp3');
                    $filesname=glob('*.mp3');
                    rsort($filesname);
                    $totalsongs=sizeof($filesname);
                    $i=0;$count=0;
                    $albumArtCount=0;
                    $songno=0;
                    foreach($filesname as $file){
                        $ThisFileInfo=$getid3->analyze($file);
                        getid3_lib::CopyTagsToComments($ThisFileInfo);
                        if(isset($ThisFileInfo['comments']['picture'][0])){
                            $picture[]='data:'.$ThisFileInfo['comments']['picture'][0]['image_mime'].';charset=utf-8;base64,'.base64_encode($ThisFileInfo['comments']['picture']['0']['data']);
                        }
                        $count++; ?>
                        <div class="audioPlayer">
                            <div class="albumDetail">
                                <button name="songButtonName" class="btn btn-danger" id="songButton" value="<?php echo $songNo;?>" onclick="fun(this)">
                            <img src="<?php echo $picture[$albumArtCount];?>" alt="">
                            <label for="" class="bottom"><?php echo @$ThisFileInfo['playtime_string']?></label>
                            <label for="" class="text-justify"><?php echo $file."<br>";?><?php echo @$ThisFileInfo['comments_html']['artist'][0]."<br>";?></label>
                            </button>
                            </div>
                        </div>
                  <?php $songNo++;
                  $albumArtCount++;      
                  }   ?>
                  <script type="text/javascript">
                  var songarray=<?php echo json_encode($filesname);?>;
                  var albumArt=<?php echo json_encode($picture);?>;
                  var titlejs=<?php echo json_encode($filesname);?>;
                  var randomColor= Math.floor(Math.random()*7);

                  </script>
</div>    
</body>
</html>
<script>
   var bdy=document.getElementById("body");
    var music=document.getElementById("player");
    var albumArtId =document.getElementById("albumArt");
    var colors=['#FFF','#FFF',  '#FFF','#FFF','#FFF','#FFF','#FFF']
    var a=document.getElementById("playBox");
    function fun(value){
        var randomColor=Math.floor(Math.random()*7);
        document.getElementById("myTable").style.backgroundColor=colors[randomColor];
        var songNo = value.value;
        albumArtId.src=albumArt[songNo];
        bdy.background=albumArt[songNo];
        music.src="mp3/"+songarray[songNo];
        document.getElementById("titlemarquee").textContent=titlejs[songNo];
        music.addEventListener('ended',function(e){
            songNo++;
            bdy.background=albumArt[songNo];
            var randomColor=Math.floor(Math.random()*7);
            document.getElementById("myTable").style.backgroundColor=colors[randomColor];
            albumArtId.src=albumArt[songNo];
            document.getElementById("titlemarquee").textContent=titlejs[songNo];
            music.src="mp3/"+songarray[songNo];
            music.load();
            music.play();
        });
    }
    function seekplus(){
        music.currentTime+=15;
    }
    function seekminus(){
        music.currentTime-=15;
    }
    function next(){
        music.currentTime+=1500;
    }
</script>