<?php
	$CWD = ".";
	require_once "php/sqlite.php";
	require_once "php/reload.php";
	require_once "pages/builders/Builder.php";
	require_once "pages/builders/header.builder.php";
	require_once "pages/builders/bottom.builder.php";

	// Check if already logged in
	$loggedIn = isset( $_SESSION["loggedIn"] );
	if( $loggedIn ) {
		header( "Location: member.php" );
	}

	// Check if user wanted to be remembered
	if( isset( $_COOKIE["remember"] ) ) {
		if( $_COOKIE["remember"] ) {
			$_SESSION["userid"] = $_COOKIE["userid"];
			$_SESSION["user"] = $_COOKIE["username"];
			$_SESSION["email"] = $_COOKIE["email"];
			$_SESSION["group"] = $_COOKIE["group"];
			$_SESSION["theme"] = $_COOKIE["theme"];
			$_SESSION["loggedIn"] = true;
			header( "Location: member.php?theme=".$_COOKIE["theme"] );
		}
	}

	// Check if trying to login
	$username = filter_input( INPUT_POST, "username" );
	$password = filter_input( INPUT_POST, "password" );
	$rem = 		filter_input( INPUT_POST, "remember" );

	if( $username !== NULL && $password !== NULL ) {

		$statement = $sql -> prepare( "
			SELECT *
			FROM users
			WHERE
				username = :user AND
				password = :pass;"
		);
		$statement -> bindValue( ":user", $username );
		$statement -> bindValue( ":pass", sha1( $sqlSalt . $password ) );
		$result = $statement -> execute() -> fetchArray( SQLITE3_ASSOC );

		if( $result === FALSE || $result === null ) {
			header( "Location: login_error.php?username=$username" );
		}
		else {
			$_SESSION["userid"] = $result["userid"];
			$_SESSION["user"] = $result["username"];
			$_SESSION["email"] = $result["email"];
			$_SESSION["group"] = $result["group"];
			$_SESSION["theme"] = $result["theme"];
			$_SESSION["loggedIn"] = true;

			// Save cookie for remembering
			if( $rem !== FALSE && $rem !== NULL ) {
				$oneWeek = 604800;
				setcookie( "remember", true, time()+$oneWeek, "/" );
				setcookie( "userid", $result["userid"], time()+$oneWeek, "/" );
				setcookie( "username", $result["username"], time()+$oneWeek, "/" );
				setcookie( "email", $result["email"], time()+$oneWeek, "/" );
				setcookie( "group", $result["group"], time()+$oneWeek, "/" );
				setcookie( "theme", $result["theme"], time()+$oneWeek, "/" );
			}

			header( "Location: member.php?theme=".$result["theme"] );
		}
	}

	// Check if we should use auto-fill username
	$user = filter_input( INPUT_GET, "user" );

	$builder -> buildHeader( "Membership - Login", "default" );
?>
			<div id="anim-wrapper" class="transition animfadeInRight">

				<div class="message">
					<h1 class="message-header">GMLearn</h1>
					<p class="message-body">
						 Currently in development, this website will in the future offer you
						 to follow lessons, complete lessons in a fully working editor and will
						 correct you LIVE as you write code.
					</p>
					<p class="message-body">
						 Based on a point system, it's like playing a game! The more points you have,
						 the more advanced lessons you unlock! Learning couldn't get any more fun!
					</p>
				</div>
				<form id="login" action="login.php" method="POST">

					<!-- Fake fields to disable autofill in chromium -->
					<input style="display:none" type="text" name="fakeusernameremembered"/>
					<input style="display:none" type="password" name="fakepasswordremembered"/>

					<!-- Form in a table for nice alignement -->
					<table>
						<tr>
							<td><label for="login_username">Username:</label></td>
							<td><input type="text" id="login_username" name="username" class="text" placeholder='Username' required="required"
								value="<?php echo ( $user!==FALSE&&$user!==null?$user:""); ?>"
							></td>
						</tr><tr>
							<td><label for="login_password">Password:</label></td>
							<td><input type="password" id="login_password" name="password" class="text" placeholder='' required="required"></td>
						</tr>
						<tr>
							<td><label for="register_remember">Remember me:</label></td>
							<td>
								<div class="onoffswitch">
								    <input type="checkbox" name="remember" class="onoffswitch-checkbox" id="register_remember">
								    <label class="onoffswitch-label" for="register_remember">
								        <span class="onoffswitch-inner"></span>
								        <span class="onoffswitch-switch"></span>
								    </label>
								</div>
							</td>
						</tr><tr>
							<td></td>
							<td>
								<a href="register.php"><input type="button" class="button" value="Register"></a>
								<input id="login_submit" class="button primary" type="submit" value="Login">
							</td>
						</tr>
					</table>

				</form>

			</div>
<?php
	$builder->buildBottom();
?>
