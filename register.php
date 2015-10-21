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

			<form id="register" action="register_message.php" method="POST">

				<p id="message">Please enter your informations below</p>

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
						<td><input type="password" id="register_password1" name="password" class="text" placeholder='' required="required" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_| |[^\w\s])).+[^\s]{5,}$"></td>
					</tr><tr>
						<td><label for="register_password2">Confirm Password:</label></td>
						<td><input type="password" id="register_password2" class="text" placeholder='' required="required"></td>
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
			<script class="transition-evalme">
				document.getElementById("register_username").addEventListener( "focus", function( event ){
					$(this).on("invalid", function(e){
						e.target.setCustomValidity("");
						if( !e.target.validity.valid ) e.target.setCustomValidity( "The username doesn't follow the required format" );
					});
					event.stopPropagation();
					event.preventDefault();
					$("#message").fadeOut(400, function(){
						$("#message").html("Username should start either with a letter or '_', can contain letters, digits, '_', '-' and '.'" ).fadeIn(400);
					});
				}, true);

				document.getElementById("register_password1").addEventListener( "focus", function( event ){
					$(this).on("invalid", function(e){
						e.target.setCustomValidity("");
						if( $("#register_password1").val() != $(this).val() ) e.target.setCustomValidity( "The password doesn't follow the required format" );
					});
					event.stopPropagation();
					event.preventDefault();
					$("#message").fadeOut(400, function(){
						$("#message").html("Your password should contain at least one letter, one capital letter, one number and one symbol and be at least 6 characters long." ).fadeIn(400);
					});
				}, true);

				document.getElementById("register_password2").addEventListener( "focus", function( event ){
					event.stopPropagation();
					event.preventDefault();
					$(this).on("keyup", function() {
						var $password1 = $("#register_password1");
						var $password2 = $("#register_password2")
						if( $password1.val() != $password2.val() ) {
							$("#register").attr("data-valid", "invalid");
							$(this)[0].setCustomValidity("Passwords do not match.");
						}
						else{
							$("#register").attr("data-valid","valid");
							$(this)[0].setCustomValidity("");
						}
					});
					$("#message").fadeOut(400, function(){
						$("#message").html("Please confirm your password." ).fadeIn(400);
					});
				}, true);

				document.getElementById("register_email").addEventListener( "focus", function( event ){
					$(this).on("invalid", function(e){
						e.target.setCustomValidity("");
						if( !e.target.validity.valid ) e.target.setCustomValidity( "The email address is malformed." );
					});
					event.stopPropagation();
					event.preventDefault();
					$("#message").fadeOut(400, function(){
						$("#message").html("Your email address is optional. We will use it for retreiving your password and for Gravatar ( Avatar linked to your email )" ).fadeIn(400);
					});
				}, true);
			</script>
		</div>
<?php $builder->buildBottom(); ?>
