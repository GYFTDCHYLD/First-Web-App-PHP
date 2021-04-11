<?php
// Turn on output buffering:
 ob_start();
 define('TITLE', 'tour');
include('templates/tour_header.html');
#                                             ---------------____________-----------------------
                                             ////////////////___________/||||||||||||||||||||||||
                                             #    /////   **        shedule         **    \\\\  ||
	                                        #   **********  Created by: GYFTDCHYLD **********   ||  
	                                       # **G           -------_________________________C**__|
	                                      #______________________/ ______ --_______--__--------#
										 #/////////////////////////////////////////////
										  #           ##################
										  #          #  \ |     #
										 #     #     #   \|    #
										#            ##########        
									   #             #
									  #             #
									 #      #       #
									 #              #
									 #               #
									 ##################
#									   [/////////////]
#									 [[_______________]]										 
										
										
 //sheduler.php created by gyftdchyld (this page handles the tours form that i placed in shedules_header)

/* This script displays and handles an HTML form. This script takes text input and stores it in a text file. */


// Add the cascade style sheet (CSS):
print '<style type="text/css" media="screen">
	.error { color: red; }
</style>';







echo    "<img src='images/infobck.png' id='infobck'>
<div id='advettisment'><center><img src='images/prez1.png'></center></div>
<br>";

  echo"<div id = 'side_head'><h2><font color='black' size =6><strong><img src='images/skru.png' width ='25em' align='left' id='skru'>TOUR<img src='images/skru.png' width ='25em' align='right' id='skru'></strong></h2></div>
<div id = 'side_body'>
</font></div>";

echo'</div> </div>  
        <!--drop menu-->
  	    <!-- header -->
		<div class="container">
			<div class="main">
				<nav class="cbp-hsmenu-wrapper" id="cbp-hsmenu-wrapper">
					<div class="cbp-hsinner">
						<ul class="cbp-hsmenu">
							<li>							
							<a >BEACHES & RIVERS</a>
								<ul class="cbp-hssubmenu">
									<li>
									    <a><img src="ja_img/doctor_cave.png" alt="img10"/><span id="r_name">doctor cave beach</span></a>
									</li>
									<li>
									    <a ><img src="ja_img/jbond_beach.png" alt="img06"/><span id="r_name">james bond beach</span></a>
									</li>
									<li>
									    <a ><img src="ja_img/lime_cay.png" alt="img09"/><span id="r_name">Lime cay</span></a>
									</li>
									<li>
									    <a ><img src="ja_img/dunns_river.png" alt="img10"/><span id="r_name">Dunns river falls</span></a>
									</li>
									<li>
									    <a ><img src="ja_img/rio_grande.png" alt="img11"/><span id="r_name">Rio grande</span></a>
									</li>
									<li>
									    <a ><img src="ja_img/green_grotto.png" alt="img11"/><span id="r_name">Green grotto cave</span></a>
									</li>
								</ul>
				
							</li>
							<li>
								<a >HIllS & MOUNTAINS</a>
								<ul class="cbp-hssubmenu cbp-hssub-rows">
									<li>
									   <a ><img src="ja_img/blu_mount.png" alt="img07"/><span id="r_name">Blue mountain</span></a>
									</li>
								</ul>
							</li>
							<li>
							<a >OTHER ATRACTIONS</a>
								<ul class="cbp-hssubmenu">
									<li>
									    <a ><img src="ja_img/bob_musium.png" alt="img01"/><span id="r_name">Bob marley musium</span></a>
									</li>
									<li>
									    <a ><img src="ja_img/hero_park.png" alt="img02"/><span id="r_name">National heroes park</span></a>
									</li>
									<li>
									    <a ><img src="ja_img/rose_hall.png" alt="img03"/><span id="r_name">Rose hall greathouse</span></a>
									</li>
									
								</ul>	
							</li>
							<li><a href="#">   </a></li>
							<li><a href="#">   </a></li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
		
		<script src="js/drop1.js"></script>
		<script>
			var menu = new cbpHorizontalSlideOutMenu( document.getElementById( "cbp-hsmenu-wrapper" ) );
		</script>
		 <!--drop menu ends-->
<div id="phone_vid_for_tour_page">
	<div id="phone_vid">
	   <video  autoplay loop width = 262>
          <source src="video/ep.mp4">
          <source src="video/ep.webm">
       </video>
	</div>
    <div id="phone_vid2">
       <video  autoplay loop   width = 262 >
          <source src="video/loby.mp4">
          <source src="video/loby.webm">
       </video>
	</div>
</div>

';
 exit( );
?>