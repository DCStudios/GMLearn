<?php
	$CWD = ".";
	require_once "php/reload.php";
	require_once "php/sqlite.php";
	require_once "pages/builders/Builder.php";
	require_once "pages/builders/header.builder.php";
	require_once "pages/builders/bottom.builder.php";
	require_once "pages/builders/messagebox.builder.php";

	$username = filter_input( INPUT_POST, "username" );
	$password = filter_input( INPUT_POST, "password" );
	$email = filter_input( INPUT_POST, "email" );
	
	$messageTitle = "";
	$messageContent = "";
	$messageButtonText = "";
	$messageButtonLink = "";
	
	if( $username && $password && $email ) {
		$statement = $sql->prepare( "INSERT INTO users(username,password,email) VALUES(:user,:pass,:email);" );
		$statement -> bindValue( ":user", $username );
		$statement -> bindValue( ":pass", sha1( $sqlSalt . $password ) );
		$statement -> bindValue( ":email", $email );
		$result = $statement -> execute() or die( "TEST" );
		
		if( $result === FALSE ) {
			$messageTitle = "Error";
			$messageContent = "Something went wrong during your account creation.<br>Please try again later.";
			$messageButtonText = "Go back";
			$messageButtonLink = "register.php?user=$username&email=$email";
		}
		else {
			$messageTitle = "Success";
			$messageContent = "Your account has been created.<br>You may now login.";
			$messageButtonText = "Go to Login";
			$messageButtonLink = "login.php?user=$username";
		}
	}
	else {
		$messageTitle = "Well, that's embarassing...";
		$messageContent = "Something isn't going right and your information wasn't sent.<br>Please try again later or contact an administrator.";
		$messageButtonText = "Go back";
		$messageButtonLink = "register.php?user=$username&email=$email";
	}
	
	$builder -> buildHeader( "Membership - Regisster" );
	$builder -> buildMessagebox( $messageTitle, $messageContent, [
		$messageButtonText => [ "type"=>"link", "link"=>$messageButtonLink, "class"=>"primary" ]
	]);
	$builder -> buildBottom();
?>