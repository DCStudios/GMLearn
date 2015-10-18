<?php
	$CWD = ".";
	require_once( "php/sqlite.php" );
	require_once( "php/reload.php" );
	require_once "pages/builders/Builder.php";
	require_once "pages/builders/header.builder.php";
	require_once "pages/builders/bottom.builder.php";

	$username = filter_input( INPUT_POST, "username" );
	$password = filter_input( INPUT_POST, "password" );
	$row = null;
	
	if( $username && $password ) {

		$statement = $sql -> prepare( "SELECT username,email FROM users WHERE username = :user AND password = :pass" );
		$statement -> bindValue( ":user", $username );
		$statement -> bindValue( ":pass", sha1( $sqlSalt . $password ) );
		$result = $statement -> execute();

		if( $result === FALSE ) {
			header( "Location: login_error.php" );
		}
		else {
			$row = $result -> fetchArray( SQLITE3_ASSOC );
			$_SESSION["user"] = $row["username"];
			$_SESSION["email"] = $row["email"];
			$_SESSION["loggedIn"] = true;
			
			header( "Location: member.php" );
		}
	}
	
	$user = filter_input( INPUT_GET, "user" );
	
	$builder -> buildHeader( "Membership - Login" );
?>
			<div id="anim-wrapper" class="transition animfadeInRight">

				<?php echo "<!--"; print_r( $row ); echo "-->"; ?>
				
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
