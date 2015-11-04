<?php

	// #COMPLETED:30 Create user system
	// #COMPLETED:20 Add Member page
	// #TODO:20 Add Project system
	// #COMPLETED:40 Incorporate JsLibs
	// #TODO:0 Make Admin Account
	// #TODO:10 Make Admin page
	// #COMPLETED:10 Complete Theme system
	// #COMPLETED:0 Fix member page transition "tried to follow invalid link" +ERROR
	// #DOING:0 Find a way to detect error and trigger error_reporting only when an error occurs +ERROR

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
