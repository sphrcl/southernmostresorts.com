<?php

$bgcolor = get_option('cebo_background_color');
$bgimg = get_option('cebo_background_image');
$bgrepeat = get_option('cebo_background_repeat');
$bgpos = get_option('cebo_background_position');
$accent = get_option('cebo_accent_color');
			

function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);
 
   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return implode(",", $rgb);

}

function deleteFirstChar( $string ) {
	return substr( $string, 1 );
}



echo stripslashes(get_option('cebo_custom_css'));  

$rgb = hex2rgb($accent);

$rawcolor = deleteFirstChar( $accent );

if(get_option('cebo_accent_color')) { ?>
		
		
	.button { background: <?php echo $accent; ?>; }
	
	.circle { background: none repeat scroll 0 0 <?php echo $accent; ?>; }
	
	.boxer .lowball { color: <?php echo $accent; ?> !important;} 
		
	.boxer h3 { color: <?php echo $accent; ?> !important;}
	
	.boxer h6 { color: <?php echo $accent; ?> !important;}
	
	.boxer a { color: <?php echo $accent; ?>;}
	
	 p a { color: <?php echo $accent; ?> !important; }
	
	#slidecaption .footprints li:hover {  background: <?php echo $accent; ?> !important; }
	
	.boxer aside ul li a:hover { color: <?php echo $accent; ?> !important; }
	
	ul.tabs li.active a { color: <?php echo $accent; ?> !important; }
	
	#toggle-view li.activated:after { background: <?php echo $accent; ?> !important; }
	
	#toggle-view h3:hover, #toggle-view h3:active { color:<?php echo $accent; ?> !important; }
	
	.nextposters .boxer li a:hover h4 { color: <?php echo $accent; ?> !important; }
	
	.usercomments h4 i a { color: <?php echo $accent; ?> !important; }
	
	.usercomments ul li ul li:after { color: <?php echo $accent; ?> !important; }
	
	.pricing_table .pro > ul > li:first-child { background: <?php echo $accent; ?> !important; }
	
	.icon-menu { color: <?php echo $accent; ?> !important; }
 
	.pro:after { background: <?php echo $accent; ?> !important; }
	
	.servicecard { background: <?php echo $accent; ?> !important; }
	
	.portfolio li .icon-link { background: none repeat scroll 0 0 <?php echo $accent; ?> !important; }
    
    .socialites .icon-bubbles { background: none repeat scroll 0 0 <?php echo $accent; ?>; }
	
	.socialites .icon-bubbles:hover { color: <?php echo $accent; ?> !important; }
	
	.blogolo .icon-link { background: none repeat scroll 0 0 <?php echo $accent; ?> !important; }
    
    .flex-control-paging li a:hover { background: <?php echo $accent; ?> !important; }
    
    .flex-control-paging li a.flex-active { background: <?php echo $accent; ?> !important;  }
    
    .tweet_list li a { color: <?php echo $accent; ?> !important; }
	
	.quoter { color: <?php echo $accent; ?> !important; }
			
	 #footer ul { color: <?php echo $accent; ?>; }
		
	 #footer ul li:before { color: <?php echo $accent; ?>; }
	
	#footer ul li:hover { background:  <?php echo $accent; ?>; }
	
	#pageslide {  background: <?php echo $accent; ?>; }
	
	.topper {  background: none repeat scroll 0 0 <?php echo $accent; ?> !important; }
   
    
    
    nav .icon-mail { background: <?php echo $accent; ?> !important; } 
    
    nav .icon-mail:hover { background: #333 !important; color: <?php echo $accent; ?> !important; }    
    
<?php } ?>