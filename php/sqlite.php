<?php
	session_start();
	if( !isset( $CWD ) ) $CWD = "..";
	$sql = new SQLite3( $CWD."/data/members.db" );
	$sqlSalt = "5KXRqJy9InjHovtC";
?>
