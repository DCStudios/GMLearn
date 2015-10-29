<?php

	$CWD = ".";
	session_start();
	require_once "php/reload.php";
	require_once "pages/builders/Builder.php";
	require_once "pages/builders/header.builder.php";
	require_once "pages/builders/bottom.builder.php";
	require_once "pages/builders/messagebox.builder.php";

	if( isset( $_SESSION["loggedIn"] ) ) {
		session_unset();
	}
	else {
		header( "Location: login.php" );
	}

	$builder -> buildHeader( "Sign Out" );
	$builder -> buildMessagebox( "Sign Out", "You've signed out correctly.", [
		"Thanks" => [ "type"=>"link", "link"=>"login.php?theme=default", "class"=>"primary" ]
	]);
?>
