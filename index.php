<?php

	// #COMPLETED:20 Create user system
	// #COMPLETED:10 Add Member page
	// #TODO:0 Add Project system
	// #COMPLETED:30 Incorporate JsLibs
	// #DOING:10 Make Admin Account
	// #DOING:20 Make Admin page
	// #COMPLETED:0 Complete Theme system
	// #DOING:0 Fix member page transition "tried to follow invalid link" +ERROR

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
