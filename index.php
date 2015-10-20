<?php

	// #COMPLETED:10 Create user system
	// #COMPLETED:0 Add Member page
	// #TODO:0 Add Project system
	// #COMPLETED:20 Incorporate JsLibs
	// #DOING:0 Make Admin Account
	// #DOING:10 Make Admin page

	$CWD = ".";
	require_once( "php/sqlite.php" );
	require_once( "php/reload.php" );

	if( isset( $_SESSION["loggedIn"] ) ) {
		header( "Location: member.php" );
	}
	else {
		header( "Location: login.php" );
	}

?>
