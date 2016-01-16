<?php

	$CWD = "..";
	session_start();
	require_once "$CWD/pages/builders/mobileHeader.builder.php";
	require_once "$CWD/pages/builders/bottom.builder.php";

	if( isset( $_SESSION["loggedIn"] ) ) {
		$oneWeek = 604800;
		session_unset();
		setcookie( "remember", false, time()+$oneWeek, "/" );
	}
	else {
		header( "Location: login.php" );
	}

	$builder -> buildMobileHeader( "Sign Out", "default", $CWD );
?>

<div class="message">
	<h1 class="message-header">Logout</h1>
	<div class="message-body">
		<p>
			You've logged out correctly!
			<br><br>
			<a href="login.php">
				<input type="button" class="button primary" value="Thanks">
			</a>
		</p>
		<div class="dummy"></div>
	</div>
</div>
