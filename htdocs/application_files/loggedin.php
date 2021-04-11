<?php

#                                             ---------------____________-----------------------
                                             ////////////////___________/||||||||||||||||||||||||
                                             #    /////   **     cancel shedule     **    \\\\  ||
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
if ($_SERVER['REQUEST_METHOD'] != 'POST')
   {
     $url ='login'; // Define the URL.
	 header("Location: $url");
   }

if($_POST['user'] != (($_COOKIE['a'] ) OR ($_COOKIE['b'] )))
  {
   $url ='login'; // Define the URL.
   header("Location: $url");
  }


if ($_SERVER['REQUEST_METHOD'] === 'POST')
   {	
 
     if(isset($_COOKIE['a']))
	   {
	     setcookie ('loggedin_admin', 'pass', time( )+36000, '/application_files/login', '', 0, TRUE);
	     $url ='login'; // Define the URL.
	     header("Location: $url");
       }    
        else{	
	          setcookie ('loggedin', 'pass', time( )+36000, '/application_files/login', '', 0, TRUE);
              $url ='login'; // Define the URL.
	          header("Location: $url");
		    }                                          	
   } 
    $url ='login'; // Define the URL.
    header("Location: $url"); 
	 
?>