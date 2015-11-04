<?php

	// #COMPLETED:30 Create user system
	// #COMPLETED:20 Add Member page
	// #TODO:0 Add Project system
	// #COMPLETED:40 Incorporate JsLibs
	// #DOING:0 Make Admin Account
	// #DOING:10 Make Admin page
	// #COMPLETED:10 Complete Theme system
	// #COMPLETED:0 Fix member page transition "tried to follow invalid link" +ERROR

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
