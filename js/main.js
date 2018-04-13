
/*===========================
    Main Nav-bar
=============================================*/

$(document).ready(function(){
    $("#dropdown").hover(            
        function() {
            $('#dropdown-menu', this).not('.in #dropdown-menu').stop(true,true).slideDown("400");
            $(this).toggleClass('open');        
        },
        function() {
            $('#dropdown-menu', this).not('.in #dropdown-menu').stop(true,true).slideUp("400");
            $(this).toggleClass('open');       
        }
    );
});

$(window).load(function() {
  $('.post-module').hover(function() {
    $(this).find('.description').stop().animate({
      height: "toggle",
      opacity: "toggle"
    }, 300);
  });
});