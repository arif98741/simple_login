<?php 

/*
!-----------------------------------------------------
!      database credentials
!----------------------------------------------------
*/
define('USERNAME', 'root');
define('PASSWORD', '');
define('HOST'    , 'localhost');
define('DATABASE', 'login');


function connection() {
	
	try {
		$link = new mysqli(HOST,USERNAME,PASSWORD,DATABASE);
		if ($link == true) {
			return $link;

		}
	} catch (Exception $e) {
		die("Field to Connect with Database" . $e->getMessage());
	}
	
}
date_default_timezone_set('Asia/Dhaka');

// elseif(strlen($password) < 6){
// 		array_push($message, '<p style="color: green; font-size: 15px;">Password must not be less then 6 characters');
// 	}
?>