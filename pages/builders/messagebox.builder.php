<?php

	if( !isset( $CWD ) ) $CWD = "../..";
	require_once "$CWD/pages/builders/Builder.php";

	$build_messagebox = function ( $title, $message, $buttonOptions ) { ?>
<div id="anim-wrapper" class="transition animFadeInZoom">
	<div class="message">
		<div class="message-header"><h1><?php echo $title; ?></h1></div>
		<div class="message-body"><p>
			<?php echo $message; ?>
			<br><br><?php

			foreach( $buttonOptions as $buttonText => $buttonDef ) {
				if( $buttonDef["type"] == "link" ) {
					echo "<a href=\"{$buttonDef["link"]}\"><input type=\"button\" class=\"button {$buttonDef["class"]}\" value=\"{$buttonText}\"></a>";
				}
				else {
					echo "<input type=\"{$buttonDef["type"]}\" class=\"button {$buttonDef["class"]}\" value=\"{$buttonText}\">";
				}
			}

			?><div class="dummy"></div>
		</p></div>
	</div>
</div>
	<?php };

	$builder -> bind( "buildMessagebox", $build_messagebox );
?>
