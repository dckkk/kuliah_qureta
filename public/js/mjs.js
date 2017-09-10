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

$('#change-layout').click(function() {
    if($('#video-wrapper').hasClass("col-md-12")){
        $('#video-wrapper').addClass("col-md-9 col-md-push-3");
        $('#video-wrapper').removeClass("col-md-12");
        $('#video-bottom').addClass("col-md-pull-9");
        $('#video-bottom-text').addClass("col-md-12");
        $('#video-bottom-text').removeClass("col-md-9");
    }else{        
        $('#video-wrapper').addClass("col-md-12");
        $('#video-wrapper').removeClass("col-md-9 col-md-push-3");
        $('#video-bottom').removeClass("col-md-pull-9");
        $('#video-bottom-text').addClass("col-md-9");
        $('#video-bottom-text').removeClass("col-md-12");
    }
});
