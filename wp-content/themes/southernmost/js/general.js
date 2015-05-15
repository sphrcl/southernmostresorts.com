
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
	
	$(".hamburger a").click(function(e){
		e.preventDefault();
		$("#wrapper").addClass("opened");
		$(".rightnav").addClass("rightready");
		$(".closer").addClass("open-left");
	});

	$(".closer ").click(function(e){
		e.preventDefault();
		$("#wrapper").removeClass("opened");
		$(".rightnav").removeClass("rightready");
		$(this).removeClass("open-left");
	});

	$(".royale").click(function(e){
		e.preventDefault();
		$("#wrapper").removeClass("opened");
		$(".rightnav").removeClass("rightready");
		$(".closer").removeClass("open-left");
	});
	
	$('#navmenumob li').each(function() {
		if ($(this).hasClass('menu-item-has-children')) {
			$('<i class="fa fa-plus"></i>').insertAfter($(this).children('a'));
		}
	});
	
	$('#navmenumob li i').click(function() {
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
		$.datepicker._defaults.dateFormat = 'mm/dd/yy';

		$(".datepicker").datepicker({
			minDate: 0,
			numberOfMonths: [2,1],
			defaultDate: new Date(2015, 09),
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
			defaultDate: new Date(2015, 09),
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
		
		
		$( "#date" ).datepicker();
		$( "#dater" ).datepicker();

	 	$(".reserve .button1").click(function(e) {
			e.preventDefault();
			$(".ressys").addClass("dropit");
			$(".overlay").addClass("doit");
			$(".overlay").addClass("crispy");


		});
		
		$(".button2").click(function(e) {
			e.preventDefault();
			$(".ressys").addClass("dropit");
			$(".overlay").addClass("doit");
			$(".overlay").addClass("crispy");


		});

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
		
		
		//  $("a[rel^='prettyPhoto']").click(function(e) {
   // var href = $(this).attr('href');
   // $(href).lightbox_me({
   //     centered: true, 
   //     });
   // e.preventDefault();
	//});

});
