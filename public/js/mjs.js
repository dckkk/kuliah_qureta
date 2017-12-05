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
        $('#video-bottom-text').addClass("col-md-9");
        $('#video-bottom-text').addClass("col-md-push-3");
        $('#video-bottom-text').addClass("min-margin");
    }else{        
        $('#video-wrapper').addClass("col-md-12");
        $('#video-wrapper').removeClass("col-md-9 col-md-push-3");
        $('#video-bottom').removeClass("col-md-pull-9");
        $('#video-bottom-text').addClass("col-md-9");
        $('#video-bottom-text').removeClass("col-md-push-3");
        $('#video-bottom-text').removeClass("min-margin");
    }
    // if(!$('#toggler').hasClass("toggled")){
    //     $('#toggler').addClass('toggled');
    //     $('#page-wrapper').removeClass('col-xs-12');
    //     $('#page-wrapper').addClass('col-xs-9');
    //     $('#video-bottom-text').removeClass('col-sm-9');
    //     $('#video-bottom-text').addClass('col-sm-12');
    //     $('#video-bottom').removeClass('col-sm-3');
    //     $('#video-bottom').addClass('col-sm-12');
    //     $('#video-bottom').height($('#video-wrapper').height() + $('#video-bottom-text').height());
    //     $('#video-bottom').appendTo('#appended');
    // } else {                
    //     $('#toggler').removeClass('toggled');
    //     $('#page-wrapper').removeClass('col-xs-9');
    //     $('#page-wrapper').addClass('col-xs-12');
    //     $('#video-bottom-text').removeClass('col-sm-12');
    //     $('#video-bottom-text').addClass('col-sm-9');
    //     $('#video-bottom').removeClass('col-sm-12');
    //     $('#video-bottom').addClass('col-sm-3');
    //     $('#video-bottom').height($('#video-bottom-text').height());
    //     $('#video-bottom').prependTo('#sourceAppende');
    // }
});

$(function(){
    var loading = $('#loadbar').hide();
    $(document)
    .ajaxStart(function () {
        loading.show();
    }).ajaxStop(function () {
        loading.hide();
    });
    $('#tab-quiz-1').addClass('in active');
    
}); 

function quizAnswer(a) {
        // var choice = $(this).find('input:radio').val();
        var order = $('#order-'+a).val();
        var next = parseInt(order) + 1; 
        $('#loadbar').show();
        $('#quiz').fadeOut();
        setTimeout(function(){      
            $('#quiz').show();
            $('#loadbar').fadeOut();
            $('#tab-quiz-'+order).removeClass('in active');
            console.log(document.getElementById('tab-quiz-'+next))
            if(document.getElementById('tab-quiz-'+next) !== 'null'){
                $('#tab-quiz-'+next).addClass('in active');
            } else {
                console.log('aaa')
                $('.modal').fadeOut();
            }
           /* something else */
        }, 1500);
    }

