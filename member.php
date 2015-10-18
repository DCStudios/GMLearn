<?php
	$CWD = ".";
	require_once "php/reload.php";
	require_once "php/sqlite.php";
	require_once "pages/builders/Builder.php";
	require_once "pages/builders/header.builder.php";
	require_once "pages/builders/bottom.builder.php";
	require_once "pages/builders/messagebox.builder.php";

	$loggedIn = ( empty( $_SESSION["loggedIn"] ) ? FALSE : $_SESSION["loggedIn"] );
	if ($loggedIn === FALSE || $loggedIn === null ) {
		header("Location: login.php");
	}

	$builder->buildHeader( "Membership - Member" );
	$builder->buildMessagebox(
		"Member",
		"You have now logged in!<br>Nothing to display though...",
		array()
	);
?>
