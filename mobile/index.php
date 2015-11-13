<?php

	// #COMPLETED:50 Create user system
	// #COMPLETED:40 Add Member page
	// #TODO:10 Add Project system
	// #COMPLETED:60 Incorporate JsLibs
	// #COMPLETED:0 Make Admin Account
	// #TODO:0 Make Admin page
	// #COMPLETED:30 Complete Theme system
	// #COMPLETED:20 Fix member page transition "tried to follow invalid link" +ERROR
	// #COMPLETED:10 Find a way to detect error and trigger error_reporting only when an error occurs +ERROR

	$CWD = "..";
	require_once "$CWD/php/sqlite.php";
	require_once "$CWD/php/reload.php";

	if( isset( $_SESSION["loggedIn"] ) ) {
		header( "Location: mobile/member.php" );
	}
	else {
		header( "Location: mobile/login.php" );
	}

?>
