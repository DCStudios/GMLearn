<?php
	$CWD = ".";
	require_once "pages/builders/Builder.php";
	require_once "pages/builders/header.builder.php";
	require_once "pages/builders/bottom.builder.php";
	require_once "pages/builders/messagebox.builder.php";

	$username = filter_input( INPUT_GET, "username" );
	if( $username === NULL ) header( "Location: login.php" );

	$builder -> buildHeader( "Membership - Invalid Login" );
	$builder -> buildMessagebox(
		"Invalid",
		"The username or the password you have entered<br>is invalid, or your account is not yet activated.",
		array(
			"Try again" => array( "type"=>"link", "link"=>"login.php?user=$username", "class"=>"primary" )
		)
	);
	$builder -> buildBottom();

?>
