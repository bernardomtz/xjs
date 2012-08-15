jQuery(document).ready(function() {	
  
$('.clearfix li a').hover(function() {
        $(this).stop().animate( {
            paddingLeft:"3px"
        }, 50);
    }, function() {
        $(this).stop().animate( {
            paddingLeft:"0"
        }, 100);
    });

// Create the dropdown base
      $("<select />").appendTo("nav");
      
      // Create default option "Go to..."
      $("<option />", {
         "selected": "selected",
         "value"   : "",
         "text"    : "Navigation..."
      }).appendTo("nav select");
      
      // Populate dropdown with menu items
      $("nav a").each(function() {
       var el = $(this);
       $("<option />", {
           "value"   : el.attr("href"),
           "text"    : el.text()
       }).appendTo("nav select");
      });
      
	   // To make dropdown actually work
	   // To make more unobtrusive: http://css-tricks.com/4064-unobtrusive-page-changer/
      $("nav select").change(function() {
        window.location = $(this).find("option:selected").val();
      });





    var $container = $('#container-masonry');
  
    $container.imagesLoaded( function(){
      $container.masonry({
        itemSelector : '.item'
      });
    });
  

//Superfish
$("ul.sf-menu").supersubs({ 
animation: {opacity:'show',height:'show'},  // fade-in and slide-down animation 
minWidth:    12,   // minimum width of sub-menus in em units 
maxWidth:    27,   // maximum width of sub-menus in em units 
delay:         100,
autoArrows:    false,
speed:       'fast',                          // faster animation speed 
extraWidth:  1    // extra width can ensure lines don't sometimes turn over 
}).superfish();  // call supersubs first, then superfish, so that subs are 
                         // not display:none when measuring. Call before initialising 
                         // containing tabs for same reason.

	

//End
});	