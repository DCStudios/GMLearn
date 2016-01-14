<?php
	session_start();
	$CWD = "../..";
	require_once "$CWD/php/sqlite.php";

	$s = $sql -> prepare( "SELECT count( id ) as CNT FROM tracking WHERE userid = :uid;");
	$s -> bindValue( ":uid", $_SESSION["userid"] );
	$result = $s -> execute() -> fetchArray( SQLITE3_ASSOC );

	$eNum = 0;
	if( $result === FALSE || $result === null ) $eNum = 0;
	else $eNum = $result["CNT"];
?>

<div id="member-page-container">
	<div id="member-page" class="nextShortTransition animFadeInLeftAlt transition-exclude">


		<h1 class="page-header">Dashboard</h1>
		<table class="styled">
			<caption>User Information</caption>
			<tr><td>Username : </td><td><?php echo $_SESSION["user"]; ?></td></tr>
			<tr><td>Email : </td><td><?php echo  $_SESSION["email"]; ?></td></tr>
			<tr><td>Group : </td><td><?php echo $_SESSION["group"]; ?></td></tr>
		</table>
		<table class="styled">
			<caption>Lessons Status</caption>
			<tr><td>Exercices Completed : </td><td><?php echo $eNum; ?></td></tr>
			<tr><td>XP Earned : </td><td><?php echo $_SESSION["xp"]; ?></td></tr>
			<tr><td>Current Level : </td><td>Beginner</td></tr>
		</table>

	</div>
</div>
