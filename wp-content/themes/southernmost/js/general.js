function detectIE() {
    var ua = window.navigator.userAgent;

    var msie = ua.indexOf('MSIE ');
    if (msie > 0) {
        // IE 10 or older => return version number
        return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
    }

    var trident = ua.indexOf('Trident/');
    if (trident > 0) {
        // IE 11 => return version number
        var rv = ua.indexOf('rv:');
        return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
    }

    var edge = ua.indexOf('Edge/');
    if (edge > 0) {
       // IE 12 => return version number
       return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
    }

    // other browser
    return false;
}

var IEversion = detectIE();

var $document = $(document),
    $element = $('body'),
    className = 'hasScrolled';

$document.scroll(function() {
  if ($document.scrollTop() >= 300) {
    // user scrolled 50 pixels or more;
    // do stuff
    $element.addClass(className);
  } else {
    $element.removeClass(className);
  }
});



$(document).ready(function(){


    $("#menu-side-nav li:first .tnbox").append('<span class="ibox activitiespress"><i class="fa fa-plus"></i></span>');
	
	$(".hamburger a").click(function(e){
		e.preventDefault();
		$("#wrapper").addClass("opened");
		$(".rightnav").addClass("rightready");
		$(".closer").addClass("open-left");
		
		// secondrightnav
		
		$(".secondrightnav").addClass("secondrightready");
	});
	
	
	
	$("ul.topnavigation li").hover(function() {
		$(this).addClass("ahoy");
		if(IEversion <= 9) {
			$('#header').height(480);
		}		
	}, function() {		
		$(this).removeClass("ahoy");
		if(IEversion <= 9) {
			$('#header').height('');
		}
	});



	$(".closer ").click(function(e){
		e.preventDefault();
		$("#wrapper").removeClass("opened");
		$(".rightnav").removeClass("rightready");
		$(this).removeClass("open-left");
		
		// secondrightnav reset all
		
		$(".secondrightnav").removeClass("secondrightready");
		$(".secondrightnav").removeClass("open");
		$('.ibox').removeClass('active');
		$('.ibox i').addClass('fa-plus');
		$('.ibox i').removeClass('fa-minus');
		$('.ibox i').removeClass('active');
		$('.srnlist ul').fadeOut(500);
		$('.srnlist ul').removeClass('active');
	});

	$(".royale").click(function(e){
		e.preventDefault();
		$("#wrapper").removeClass("opened");
		$(".rightnav").removeClass("rightready");
		$(".closer").removeClass("open-left");
		
		// secondrightnav reset all
		
		$(".secondrightnav").removeClass("secondrightready");
		$(".secondrightnav").removeClass("open");
		$('.ibox').removeClass('active');
		$('.ibox i').addClass('fa-plus');
		$('.ibox i').removeClass('fa-minus');
		$('.ibox i').removeClass('active');
		$('.srnlist ul').fadeOut(500);
		$('.srnlist ul').removeClass('active');
	});
	
	$('#navmenumob li').each(function() {
		if ($(this).hasClass('menu-item-has-children')) {
			$(this).find('.tnbox').append('<i class="fa fa-plus"></i>');
		}
	});
	
	$('.topnavigationmob li i').click(function() {
		if ($(this).hasClass('fa-plus')) {
			$(this).removeClass('fa-plus');
			$(this).addClass('fa-minus');
			$(this).addClass('active');
		} else {
			$(this).addClass('fa-plus');
			$(this).removeClass('fa-minus');
			$(this).removeClass('active');
		}
		
		$(this).parent('li').find('.sub-menu').slideToggle(500);
	});
	
	$('.srnclose').click(function () {
		$(".secondrightnav").removeClass("open");
		$('.ibox').removeClass('active');
		$('.ibox i').addClass('fa-plus');
		$('.ibox i').removeClass('fa-minus');
		$('.ibox i').removeClass('active');
		$('.srnlist ul').fadeOut(500);
		$('.srnlist ul').removeClass('active');
		

	});
	
	$('.ibox').click(function() {

		
		var findi = $(this).find('i');
		var iboxclass = $(this).attr('class').replace('ibox ', '').replace(' active', '');
		
		// reset
		
		$('.ibox').removeClass('active');
		$('.ibox i').addClass('fa-plus');
		$('.ibox i').removeClass('fa-minus');
		$('.ibox i').removeClass('active');
		
		$(this).addClass('active');
		
		// add plus or minus icon
		
		if (findi.hasClass('fa-plus')) {
			findi.removeClass('fa-plus');
			findi.addClass('fa-minus');
			findi.addClass('active');

		
		} else {
			findi.addClass('fa-plus');
			findi.removeClass('fa-minus');
			findi.removeClass('active');
 
			 
		}
		
		// open .secondarynav if box is clicked

		if ($('.ibox i').hasClass('fa-minus')) {
			$('.secondrightnav').addClass('open');
			
		} else {
			$('.secondrightnav').removeClass('open');

		}
		
		// fadein and fadeout functions
		
		if ($('.srnlist ' + '.' + iboxclass).hasClass('active')) {
			
			// reset if user click the same box
			$('.secondrightnav').fadeOut(100);
			
			findi.addClass('fa-plus');
			findi.removeClass('fa-minus');
			findi.removeClass('active');
			
			$('.secondrightnav').removeClass('open');
			
			$('.srnlist ul').fadeOut(500);
			$('.srnlist ul').removeClass('active');
			
		} else {
			 $('.secondrightnav').fadeIn(100);
			$('.srnlist ul').fadeOut(500);
			$('.srnlist ul').removeClass('active');
			
			setTimeout(function(){
				$('.srnlist ' + '.' + iboxclass).fadeIn(500);
				$('.srnlist ' + '.' + iboxclass).addClass('active');
			}, 501);
		}
		
	});
	
	$('.room-caption .button5').click(function(e) {
		e.preventDefault();
		if ($(this).text() == 'DETAILS') {
			$(this).parent('.room-caption').parent('li').addClass('canopener');
			$(this).text('CLOSE');
			
			$('.roomslider .flex-direction-nav li').addClass('displaynone');
		} else {
			$(this).parent('.room-caption').parent('li').removeClass('canopener');
			$(this).text('DETAILS');
			
			$('.roomslider .flex-direction-nav li').removeClass('displaynone');
		}
	});
	
	$('.room-linkopen .closeme').click(function(e) {
		e.preventDefault();
		
		if ($(this).parent('.mobcloseme').parent('.room-linkopen').parent('li').find('.room-caption').children('.button5').text() == 'DETAILS') {
			$(this).parent('.mobcloseme').parent('.room-linkopen').parent('li').addClass('canopener');
			$(this).parent('.mobcloseme').parent('.room-linkopen').parent('li').find('.room-caption').children('.button5').text('CLOSE');
			
			$('.roomslider .flex-direction-nav li').addClass('displaynone');
		} else {
			$(this).parent('.mobcloseme').parent('.room-linkopen').parent('li').removeClass('canopener');
			$(this).parent('.mobcloseme').parent('.room-linkopen').parent('li').find('.room-caption').children('.button5').text('DETAILS');
			
			$('.roomslider .flex-direction-nav li').removeClass('displaynone');
		}
		
	});
	
	$('.roomslider .flex-direction-nav li').click(function() {
		$('.roomslider li').removeClass('canopener');
		$('.room-caption .button5').text('DETAILS');
		$('.roomslider .flex-direction-nav li').removeClass('displaynone');
	});

	$('.topbanner').flexslider({
		animation: "fade",
		controlNav: false,
		directionNav: false,
	});

	$('.discoverdining').flexslider({
		animation: "fade",
		controlNav: true,
		directionNav: false,
	});

	$('.discoverweddings').flexslider({
		animation: "fade",
		controlNav: true,
		directionNav: false,
	});

	// The slider being synced must be initialized first
	
	$('.roomcarousel').flexslider({
		animation: "slide",
		controlNav: false,
		directionNav: true,
		animationLoop: false,
		slideshow: false,
		itemWidth: 256,
		itemMargin: 5,
		asNavFor: '.roomslider'
	});

	$('.roomslider').flexslider({
		animation: "slide",
		controlNav: false,
		directionNav: false,
		directionNav: true,
		animationLoop: false,
		slideshow: false,
		sync: ".roomcarousel"
	});

	$('.meetingcarousel').flexslider({
		animation: "slide",
		controlNav: false,
		directionNav: true,
		animationLoop: false,
		slideshow: false,
		itemWidth: 256,
		itemMargin: 5,
		asNavFor: '.meetingslider'
	});

	$('.meetingslider').flexslider({
		animation: "slide",
		controlNav: false,
		directionNav: false,
		animationLoop: false,
		slideshow: false,
		sync: ".meetingcarousel"
	});


});





$(document).ready(function(){
	$(".reserve .button1").click(function(){
		$(".reservebox").slideToggle(500);
		$(".xey").addClass("opened");
  });
  
  $(".xey").click(function(){
		$(".reservebox").slideToggle(500);
		$(this).removeClass("openeed");
  });
  
  // $("a[rel^='prettyPhoto']").prettyPhoto();



	$('.fa.fa-close').click(function() {
		 $(".lightbox").trigger('close');
	});
	
	
	// Datepicker
		$.datepicker._defaults.dateFormat = 'yy-mm-dd';

		$(".datepicker").datepicker({
			minDate: 0,
			numberOfMonths: [2,1],
			// defaultDate: new Date(2015, 09),
			beforeShowDay: function(date) {
				var date1 = $.datepicker.parseDate($.datepicker._defaults.dateFormat, $("#arrival_date").val());
				var date2 = $.datepicker.parseDate($.datepicker._defaults.dateFormat, $("#departure_date").val());
				return [true, date1 && ((date.getTime() == date1.getTime()) || (date2 && date >= date1 && date <= date2)) ? "dp-highlight" : ""];
			},
			onSelect: function(dateText, inst) {
				var date1 = $.datepicker.parseDate($.datepicker._defaults.dateFormat, $("#arrival_date").val());
				var date2 = $.datepicker.parseDate($.datepicker._defaults.dateFormat, $("#departure_date").val());
                var selectedDate = $.datepicker.parseDate($.datepicker._defaults.dateFormat, dateText);


                if (!date1 || date2) {
					$("#arrival_date").val(dateText);
					$("#departure_date").val("");
                    $(this).datepicker();
                } else if( selectedDate < date1 ) {
                    $("#departure_date").val( $("#arrival_date").val() );
                    $("#arrival_date").val( dateText );
                    $(this).datepicker();
                } else {
					$("#departure_date").val(dateText);
                    $(this).datepicker();
				}
			}
		});
		
		$(".datepickermob").datepicker({
			minDate: 0,
			numberOfMonths: [1,1],
			beforeShowDay: function(date) {
				var date1 = $.datepicker.parseDate("yy-mm-dd", $("#arrival").val());
				var date2 = $.datepicker.parseDate("yy-mm-dd", $("#departure").val());
				return [true, date1 && ((date.getTime() == date1.getTime()) || (date2 && date >= date1 && date <= date2)) ? "dp-highlight" : ""];
			},
			onSelect: function(dateText, inst) {
				var date1 = $.datepicker.parseDate("yy-mm-dd", $("#arrival").val());
				var date2 = $.datepicker.parseDate("yy-mm-dd", $("#departure").val());
                var selectedDate = $.datepicker.parseDate("yy-mm-dd", dateText);
                // var seldate = dateText.split('/');
                // console.log(seldate[0]);


                if (!date1 || date2) {
					$("#arrival").val(dateText);
					$("#departure").val("");
                    $(this).datepicker();
                } else if( selectedDate < date1 ) {
                    $("#departure").val( $("#arrival").val() );
                    $("#arrival").val(sedateText);
                    $(this).datepicker();
                } else {
					$("#departure").val(dateText);
                    $(this).datepicker();
				}
			}
		});

		

		$(".datepickermoby").datepicker({
			minDate: 0,
			numberOfMonths: [1,1],
			beforeShowDay: function(date) {
				var date1 = $.datepicker.parseDate($.datepicker._defaults.dateFormat, $("#arrival_date").val());
				var date2 = $.datepicker.parseDate($.datepicker._defaults.dateFormat, $("#departure_date").val());
				return [true, date1 && ((date.getTime() == date1.getTime()) || (date2 && date >= date1 && date <= date2)) ? "dp-highlight" : ""];
			},
			onSelect: function(dateText, inst) {
				var date1 = $.datepicker.parseDate($.datepicker._defaults.dateFormat, $("#arrival_date").val());
				var date2 = $.datepicker.parseDate($.datepicker._defaults.dateFormat, $("#departure_date").val());
                var selectedDate = $.datepicker.parseDate($.datepicker._defaults.dateFormat, dateText);


                if (!date1 || date2) {
					$("#arrival_date").val(dateText);
					$("#departure_date").val("");
                    $(this).datepicker();
                } else if( selectedDate < date1 ) {
                    $("#departure_date").val( $("#arrival_date").val() );
                    $("#arrival_date").val( dateText );
                    $(this).datepicker();
                } else {
					$("#departure_date").val(dateText);
                    $(this).datepicker();
				}
			}
		});
		
		
		$( "#date" ).datepicker({

			minDate: 0,
			altField  : '#arvv',
			
			beforeShowDay: function(date) {
			var date1 = $.datepicker.parseDate($.datepicker._defaults.dateFormat, $("#arrival_date").val());
			var date2 = $.datepicker.parseDate($.datepicker._defaults.dateFormat, $("#departure_date").val());
			return [true, date1 && ((date.getTime() == date1.getTime()) || (date2 && date >= date1 && date <= date2)) ? "dp-highlight" : ""];
			},

			onSelect: function(dateText, inst) {
				var date1 = $.datepicker.parseDate($.datepicker._defaults.dateFormat, $("#arrival_date").val());
				var date2 = $.datepicker.parseDate($.datepicker._defaults.dateFormat, $("#departure_date").val());
                var selectedDate = $.datepicker.parseDate($.datepicker._defaults.dateFormat, dateText);
                $("#dater").datepicker("option", "minDate", dateText);

                function parseDate(dateText) {
				  var parts = dateText.split('-');
				  // new Date(year, month [, day [, hours[, minutes[, seconds[, ms]]]]])
				  return parts[2] + '/' + parts[1] + '/' + parts[0]; // Note: months are 0-based
				}

	       		$('#date').val(parseDate(dateText));
				$("#arrival_date").val(dateText);
				$("#departure_date").val("");

			},

			onClose: function(){
				$(this).parent().next().find('input.hasDatepicker').datepicker('show');
			}

			

		});



		$( "#dater" ).datepicker({

			minDate: 0,
			altField  : '#deptt',
			beforeShowDay: function(date) {
				var date1 = $.datepicker.parseDate($.datepicker._defaults.dateFormat, $("#arrival_date").val());
				var date2 = $.datepicker.parseDate($.datepicker._defaults.dateFormat, $("#departure_date").val());
				return [true, date1 && ((date.getTime() == date1.getTime()) || (date2 && date >= date1 && date <= date2)) ? "dp-highlight" : ""];
			},
			onSelect: function(dateText, inst) {
				var date1 = $.datepicker.parseDate($.datepicker._defaults.dateFormat, $("#arrival_date").val());
				var date2 = $.datepicker.parseDate($.datepicker._defaults.dateFormat, $("#departure_date").val());
                var selectedDate = $.datepicker.parseDate($.datepicker._defaults.dateFormat, dateText);

                function parseDate(dateText) {
				  var parts = dateText.split('-');
				  return parts[2] + '/' + parts[1] + '/' + parts[0]; // Note: months are 0-based
				}

				$('#dater').val(parseDate(dateText));
				$("#departure_date").val(dateText);	
			},

			onClose: function(){
				$(this).parent().next().find('select').focus();
			}

		});

	 	$(".reserve .button1").click(function(e) {
			e.preventDefault();
			$(".ressys").addClass("dropit");
			$(".overlay").addClass("doit");
			$(".overlay").addClass("crispy");


		});
		
		// $(".button2").click(function(e) {
		// 	e.preventDefault();
		// 	$(".ressys").addClass("dropit");
		// 	$(".overlay").addClass("doit");
		// 	$(".overlay").addClass("crispy");


		// });

		$(".shutdown").click(function(e) {
			e.preventDefault();
			$(".ressys").removeClass("dropit");
			$(".overlay").removeClass("doit");
			$(".overlay").removeClass("crispy");
			$(".sixtynav").removeClass("sixtyopen");
			$(".go").removeClass("gone");

		});
		
		$(".ressys .btn1").click(function(e) {
			e.preventDefault();
			$(".ressys").removeClass("dropit");
			$(".overlay").removeClass("doit");
			$(".overlay").removeClass("crispy");
			$(".sixtynav").removeClass("sixtyopen");
			$(".go").removeClass("gone");

		});
		
		
		// TOGGLE FUNCTION //
	$('#toggle-view li').click(function () {
        var text = $(this).children('div.panel');
        if (text.is(':hidden')) {
            text.slideDown('200');
            $(this).children('span').addClass('toggle-minus');     
            $(this).addClass('activated');     
        } else {
            text.slideUp('200');
			$(this).children('span').removeClass('toggle-minus'); 
            $(this).children('span').addClass('toggle-plus'); 
			$(this).removeClass('activated'); 			
        }
		
    });
	
	$('#read-more').click(function() {
		$(this).find('.rm-plus').addClass('rm-gone');
		$(this).find('.more-read').slideDown();
	});
	
	// $("a[rel^='prettyPhoto']").click(function(e) {
	// 	var href = $(this).attr('href');
	// 	$(href).lightbox_me({
	// 		centered: true, 
	// 	});
	// 	e.preventDefault();
	// });

	// Validation
	$('#eclubCheck').validate({
	    rules: {
	        // The e-mail address field (aptly ID'd as "email_address")
	        // is required to have content and must also be a valid e-mail.
	        FIRSTNAME: "required",
	        LASTNAME: "required",
	        email: {
	            required: true,
	            email: true
	        }
	    },
	    messages: {

			FIRSTNAME: "Please specify your first name",
			LASTNAME: "Please specify your last name",
			email: {
				required: "We need your email address to contact you",
				email: "Your email address must be in the format of name@domain.com"
			}

	    },
	    submitHandler: function(form) { // <- pass 'form' argument in
	        $("#form_submit").attr("disabled", true);
	        $("#form_submit").attr("value", "Submitting");
			return true;
	    }
	});

});