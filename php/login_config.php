<?php
//localhost configuration


	$db_server = '127.0.0.1';
	$db_username = 'root';
	$db_password = '';
	$db_database = 'nerve_to_serve'; //enter the databse name


//main server configuration
/*
$db_server = 'sql304.rf.gd';
$db_username = 'rfgd_19046636';
$db_password = 'Kgkite@123';
$db_database = 'rfgd_19046636_nts';
*/
	$db = mysqli_connect($db_server, $db_username, $db_password, $db_database);

	if(!$db){ die ("Connection failed : " . mysqli_connect_error());
}
?>
