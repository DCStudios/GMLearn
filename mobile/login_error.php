<?php

	$CWD = "..";
	session_start();
	require_once "$CWD/pages/builders/mobileHeader.builder.php";
	require_once "$CWD/pages/builders/bottom.builder.php";

	$builder -> buildMobileHeader( "Login - Error", "default", $CWD );
?>

<div class="message">
	<h1 class="message-header">Error</h1>
	<div class="message-body">
		<p>
			The username or the password you entered is incorrect!
			<br><br>
			<a href="login.php">
				<input type="button" class="button primary" value="Go back">
			</a>
		</p>
		<div class="dummy"></div>
	</div>
</div>
