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


/*
!-----------------------------------------------------
!     Valiation
!----------------------------------------------------
*/
function validation($data)
{
	$data = htmlspecialchars($data);
	$data = trim($data);
	$data = stripcslashes($data);
	return $data;
}

?>