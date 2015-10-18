<?php
	$CWD = ".";
	require_once( "php/reload.php" );
	require_once "pages/builders/Builder.php";
	require_once "pages/builders/header.builder.php";
	require_once "pages/builders/bottom.builder.php";
	
	$username = filter_input( INPUT_GET, "user" );
	$email = filter_input( INPUT_GET, "email" );

	$builder->buildHeader( "Membership - Register" );
?>
		<div id="anim-wrapper" class="transition animFadeInLeft">
			<form id="login" action="register_message.php" method="POST">

				<!-- Fake fields to disable autofill in chromium -->
				<input style="display:none" type="text" name="fakeusernameremembered"/>
				<input style="display:none" type="password" name="fakepasswordremembered"/>

				<!-- Form in a table for nice alignement -->
				<table>
					<tr>
						<td><label for="register_username">Username:</label></td>
						<td><input type="text" id="register_username" name="username" class="text" placeholder='Username' required="required" pattern="^[a-zA-Z_][a-zA-Z0-9_]+((\.|-)?[a-zA-Z0-9_])+$"
								value="<?php echo ( $username!==FALSE&&$username!==null?$username:""); ?>"
							></td>
					</tr><tr>
						<td><label for="register_password1">Password:</label></td>
						<td><input type="password" id="register_password1" name="password" class="text" placeholder='' required="required" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_| |[^\w\s])).+[^\s]*$"></td>
					</tr><tr>
						<td><label for="register_password2">Confirm Password:</label></td>
						<td><input type="password" id="register_password2" class="text" placeholder=''></td>
					</tr><tr>
						<td><label for="register_email">Email:</label></td>
						<td><input type="email" id="register_email" name="email" class="text" placeholder='Email'
								value="<?php echo ( $email!==FALSE&&$email!==null?$email:""); ?>"
							></td>
					</tr><tr>
						<td></td>
						<td>
							<a href="login.php"><input type="button" class="button" value="Cancel"></a>
							<input class="button alt" type="reset" value="Reset">
							<input class="button primary" type="submit" value="Register">
						</td>
					</tr>

				</table>

			</form>
		</div>
<?php
	$builder->buildBottom();
?>
