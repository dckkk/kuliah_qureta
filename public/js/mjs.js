$(".frame-materi")
	.mouseenter(function(){
		$(this).children("a.remove-icon").removeClass("hide");
	})
	.mouseleave(function(){
		$(this).children("a.remove-icon").addClass("hide");
	});

$("#toggle").click( function(event){
    event.preventDefault();
    if($(this).hasClass("showMenu")){
        $("#menu-wrapper").animate({left:$(window).width()}, "fast");
    	$(this).removeClass("showMenu");
    } else {
        $("#menu-wrapper").css('visibility', 'visible');
        $( "#menu-wrapper" ).animate({left:"0"}, "fast");
    	$(this).addClass("showMenu");
    }
    return false;
});

$(window).click(function(event){
	// event.preventDefault();
	// console.log('a');
	if($("#toggle").hasClass("showMenu")===true){
        $( "#menu-wrapper" ).animate({left:$( window ).width()}, "fast");
    	$("#toggle").removeClass("showMenu");
    }
    // return false;
});
