var btnContainer = document.getElementById("tab");

// Get all buttons with class="btn" inside the container
var btns = btnContainer.getElementsByClassName("a");

// Loop through the buttons and add the active class to the current/clicked button
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}

//if follow button click run function
$('.follow').click( function(e){
e.preventDefault();
//Make variable for this button
$button = $(this);
//Get follow_id from follow button rel tag
function parse_query_string(query) {
  var vars = query.split("&");
  var query_string = {};
  for (var i = 0; i < vars.length; i++) {
    var pair = vars[i].split("=");
    var key = decodeURIComponent(pair[0]);
    var value = decodeURIComponent(pair[1]);
    // If first entry with this name
    if (typeof query_string[key] === "undefined") {
      query_string[key] = decodeURIComponent(value);
      // If second entry with this name
    } else if (typeof query_string[key] === "string") {
      var arr = [query_string[key], decodeURIComponent(value)];
      query_string[key] = arr;
      // If third or later entry with this name
    } else {
      query_string[key].push(decodeURIComponent(value));
    }
  }
  return query_string;
}
var query = window.location.search.substring(1);
var parsed_qs = parse_query_string(query);


var follow_id = parsed_qs.a_id;
    $(this).attr("rel");
//if button has class following
    if($button.hasClass('following')){
    //send ajax request to ajax.php for unfollow
   
    $.post('follow.php',{Unfollow:follow_id}); 
    //Remove button class Following
    $button.removeClass('following');
    //Remove button class unfollow
    $button.removeClass('unfollow');
    //Add text to follow button after unfollow
    $button.html('Follow');
} else {
    //else send ajax request for follow
    $.post('follow.php',{follow:follow_id});  
    //And remove class follow 
    $button.removeClass('follow');
    //And add class following
    $button.addClass('following');
    //All text to follow button
    $button.text('Following');         
    }
});
//run a function on hover on follow button 
$('.follow').hover(function(){
 //Make variable for button
     $button = $(this);
     //if button have class following
    if($button.hasClass('following')){
     //then add class unfollow
        $button.addClass('unfollow');
        //and add text unfollow so 
        //when you hover on follow button you'll see unfollow button
        $button.text('Unfollow');
    }
}, function(){
  //if button have class following
    if($button.hasClass('following')){
      //if remove class unfollow
        $button.removeClass('unfollow');
        //add text following
        $button.text('Following');
    }
});