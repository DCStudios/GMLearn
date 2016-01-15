<?php
	$CWD = "..";
	require_once "$CWD/php/error_reporter.php";
	require_once "$CWD/php/reload.php";
	require_once "$CWD/php/sqlite.php";
	require_once "$CWD/pages/builders/Builder.php";
	require_once "$CWD/pages/builders/mobileHeader.builder.php";
	require_once "$CWD/pages/builders/bottom.builder.php";
	require_once "$CWD/pages/builders/messagebox.builder.php";

	$username = filter_input( INPUT_POST, "username" );
	$password = filter_input( INPUT_POST, "password" );
	$email = filter_input( INPUT_POST, "email" );

	$messageTitle = "";
	$messageContent = "";
	$messageButtonText = "";
	$messageButtonLink = "";

	$statement=NULL;

	if( $username !== NULL && $password !== NULL && $email !== NULL ) {
		$stmt = $sql->prepare("SELECT userid, count( userid ) as R FROM users WHERE username = :user;");
		$stmt -> bindValue( ":user", $username );
		$res = $stmt -> execute() -> fetchArray( SQLITE3_ASSOC );
		if( $res["R"] > 0 ) {
			$messageTitle = "Username unavailable";
			$messageContent = "The username you tried to use is already in use by another member.
			Please try a different username.";
			$messageButtonText = "Go back";
			$messageButtonLink = "register.php";
		}
		else {
			$statement = $sql->prepare( "INSERT INTO users(username,password,email) VALUES(:user,:pass,:email);" );
			$statement -> bindValue( ":user", $username );
			$statement -> bindValue( ":pass", sha1( $sqlSalt . $password ) );
			$statement -> bindValue( ":email", $email );
			$result = $statement -> execute();

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
	}
	else {
		$messageTitle = "Well, that's embarassing...";
		$messageContent = "Something isn't going right and your information wasn't sent.<br>Please try again later or contact an administrator.";
		$messageButtonText = "Go back";
		$messageButtonLink = "register.php?user=$username&email=$email";
	}

	$builder -> buildMobileHeader( "Membership - Regisster", "default", ".." );
	?>

		<div class="message">
			<h1 class="message-header"><?php echo $messageTitle; ?></h1>
			<div class="message-body">
				<p>
					<?php echo $messageContent; ?>
					<br><br>
					<a href="<?php echo $messageButtonLink; ?>">
						<input type="button" class="button primary" value="<?php echo $messageButtonText; ?>">
					</a>
				</p>
				<div class="dummy"></div>
			</div>
		</div>
	<?php
	$builder -> buildBottom();
?>
