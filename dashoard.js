 
 $("#interactions-trigger").click(function(event) {
             $("#tooltip-fav").addClass("tooltip--active");
              event.stopPropagation();
        });
    
         $(document).click(function(event){
            if (!$(event.target).hasClass('tooltip--active')) {
                $("#tooltip-fav").removeClass("tooltip--active");
            }
        });
    
    
        $("#artist").hover(
          function () {
            $(".artist-tooltip").addClass("tooltip--active");
          },
          
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

    

