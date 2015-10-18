<?php
	$CWD = ".";
	require_once( "php/reload.php" );
	require_once "pages/builders/Builder.php";
	require_once "pages/builders/header.builder.php";
	require_once "pages/builders/bottom.builder.php";

	$builder->buildHeader( "Membership - Member" );
	$builder->buildMessagebox(
		"Member",
		"You have now logged in!<br>Nothing to display though...",
		array()
	);
?>
