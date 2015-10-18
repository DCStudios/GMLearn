<?php

	require( "sqlite.php" );
	$statement = $sql -> prepare( "SELECT userid FROM users WHERE username = :user AND password = :pass" );
	$statement -> bindValue( ":user", $_POST["username"] );
	$statement -> bindValue( ":pass", sha5( $sqlSalt . $_POST["password"] ) );
	$result = $statement -> execute() -> fetchArray( SQLITE3_ASSOC );

	if( $result === FALSE ) echo "INVALID";
	else echo "VALID";

?>
