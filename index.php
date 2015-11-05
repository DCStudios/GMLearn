<?php

	// #COMPLETED:40 Create user system
	// #COMPLETED:30 Add Member page
	// #TODO:20 Add Project system
	// #COMPLETED:50 Incorporate JsLibs
	// #TODO:0 Make Admin Account
	// #TODO:10 Make Admin page
	// #COMPLETED:20 Complete Theme system
	// #COMPLETED:10 Fix member page transition "tried to follow invalid link" +ERROR
	// #COMPLETED:0 Find a way to detect error and trigger error_reporting only when an error occurs +ERROR

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
