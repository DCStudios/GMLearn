<?php require_once( "pages/templates/defaultTop.tpl.php" ); ?>

<div id="anim-wrapper" class="transition animFadeInZoom">
	<div class="message">
		<div class="message-header"><h1>Invalid</h1></div>
		<div class="message-body"><p>
			The username or the password you have entered<br>
			is invalid, or your account is not yet activated.<br><br>
			<a href="login.php"><input type="button" class="button primary" value="Try again"></a>
			<div class="dummy"></div>
		</p></div>
	</div>
</div>

<?php require_once( "pages/templates/defaultBottom.tpl.php" ); ?>