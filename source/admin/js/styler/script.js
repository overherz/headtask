
var setSectionHeights = function() {

	setTimeout( function() {
		var innerHeight = $(window).innerHeight() - $('.top_div').outerHeight(true);

		$('#middle').css({
			'min-height': innerHeight
		});

		$('#sidebar').css({
			'min-height': innerHeight
		});
	}, 100);

};

$(document).ready(function(){
	$('.navbar-toggle[data-toggle="side-menu"]').click( function() {
		var target = $(this).attr('data-target');

		if ($(target).hasClass('in')) {
			$('#middle').animate({
				left: 0
			}, 300);
			$(target).removeClass('in');
		}
		else {
			$('#middle').animate({
				left: 200
			}, 300);
			$(target).addClass('in');
            $("#topnav").removeClass("in").addClass("collapse").css("height","0px");
		}
	});

    $('.navbar-toggle2[data-toggle="side-menu"]').click( function() {
        var target = $(this).attr('data-target');
        marginLeft = parseInt($("#middle").css("marginLeft"));

        if (marginLeft > 0) {
            $('#middle').animate({
                marginLeft: 0
            }, 300);
            $(target).removeClass('in');
        }
        else {
            $('#middle').animate({
                marginLeft: 220
            }, 300);
            $(target).addClass('in');
            $("#topnav").removeClass("in").addClass("collapse").css("height","0px");
        }
    });

	setSectionHeights();

	$(window).resize( function() {
		setSectionHeights();
	});

	$(".scroll-viewport").niceScroll(".scroll-area", {
		touchbehavior: true
	});

	// Init tooltip
	$('a[data-toggle="tooltip"]').tooltip({
		container: 'body'
	});

	// messages
	$('.message.old').click( function() {
		$(this).toggleClass('on').find('.body').toggle();
	});

	if ($('.error-page').length) {
		setInterval( function() {
			$('.error-page')
				.find('.code')
				.toggleClass('animated')
				.toggleClass('tada');
		}, 3000);
	}

	$('#flotTip').remove();
});

jQuery.ajaxSetup({complete: function(){jQuery("select").styler(); }});


