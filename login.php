<?php
	$CWD = ".";
	require_once( "php/sqlite.php" );
	require_once( "php/reload.php" );
	require_once "pages/builders/Builder.php";
	require_once "pages/builders/header.builder.php";
	require_once "pages/builders/bottom.builder.php";

	if( !empty( $_POST["username"] ) && !empty( $_POST["password"] ) ) {

		$statement = $sql -> prepare( "SELECT userid FROM users WHERE username = :user AND password = :pass" );
		$statement -> bindValue( ":user", $_POST["username"] );
		$statement -> bindValue( ":pass", sha1( $sqlSalt . $_POST["password"] ) );
		$result = $statement -> execute() -> fetchArray( SQLITE3_ASSOC );

		if( $result === FALSE ) {
			header( "Location: login_error.php" );
		}
		else {
			$_SESSION["user"] = $result["username"];
			$_SESSION["email"] = $result["email"];
			$_SESSION["loggedIn"] = true;

			header( "Location: member.php" );
		}
	}

	$builder -> buildHeader( "Membership - Login" );
?>
			<div id="anim-wrapper" class="transition animfadeInRight">

				<form id="login" action="login.php" method="POST">

					<!-- Fake fields to disable autofill in chromium -->
					<input style="display:none" type="text" name="fakeusernameremembered"/>
					<input style="display:none" type="password" name="fakepasswordremembered"/>

					<!-- Form in a table for nice alignement -->
					<table>
						<tr>
							<td><label for="login_username">Username:</label></td>
							<td><input type="text" id="login_username" name="username" class="text" placeholder='Username' required="required"></td>
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
