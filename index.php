<?php

	$CWD = ".";
	require_once( "php/sqlite.php" );
	require_once( "php/reload.php" );

	if( !empty( $_SESSION["loggedIn"] ) && !empty( $_SESSION["username"] ) ) {
		header( "Location: member.php" );
	}
	else {
		header( "Location: login.php" );
	}

?>

