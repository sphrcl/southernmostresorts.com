
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
		$(this).removeClass("open-left");
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
		directionNav: false,
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