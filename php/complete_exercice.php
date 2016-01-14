<?php
	if( !isset($_POST["uid"]) || !isset( $_POST["eid"] ) || !isset( $_POST["xp"] ) ) {
		header("Location: pages/member/welcome.php" );
	}

	session_start();

	$CWD = "..";
	require_once "$CWD/php/sqlite.php";

	$stmt = $sql->prepare("INSERT INTO tracking(userid,exerciceid) VALUES(:uid,:eid);");
	$stmt -> bindValue( ":uid", $_POST["uid"] );
	$stmt -> bindValue( ":eid", $_POST["eid"] );
	$stmt -> execute();
	$stmt2 = $sql->prepare("UPDATE users SET xp = xp + :xp WHERE userid = :uid;");
	$stmt2 -> bindValue( ":uid", $_POST["uid"] );
	$stmt2 -> bindValue( ":xp", $_POST["xp"] );
	$stmt2 -> execute();

	$_SESSION["xp"] += strval($_POST["xp"]);
?>
