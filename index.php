<?php

	// #COMPLETED:0 Create user system
	// #TODO:0 Add Project system
	// #COMPLETED:10 Incorporate JsLibs
	// #DOING:0 Make Admin Account
	// #DOING:10 Make Admin page

	$CWD = ".";
	require_once( "php/sqlite.php" );
	require_once( "php/reload.php" );

	$loggedIn = ( empty( $_SESSION["loggedIn"] ) ? FALSE : $_SESSION["loggedIn"] );

	if( $loggedIn !== FALSE && $loggedIn !== null ) {
		header( "Location: member.php" );
	}
	else {
		header( "Location: login.php" );
	}

?>
