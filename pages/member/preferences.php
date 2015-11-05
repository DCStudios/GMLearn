<?php
	$CWD = "../..";

	require_once "$CWD/php/error_reporter.php";
	require_once "$CWD/php/sqlite.php";
	require_once "$CWD/php/scssphp/scss.inc.php";

	$theme = ( isset($_GET["theme"] ) ? $_GET["theme"] : $_SESSION["theme"] );

	$scss = new scssc();
	$scss -> setFormatter( "scss_formatter_compressed" );
	$css = $scss -> compile( file_get_contents( "$CWD/scss/pages/member_preferences.scss" ) );
?>

<div id="member-page-container">
	<div id="member-page" class="nextShortTransition animFadeInLeftAlt transition-exclude">
		<style type="text/css"><?php echo $css; ?></style>

		<h1 class="page-header">Preferences</h1>

		<table id="member-preferences">
			<tr>
				<td><p id="theme-selector-label">Theme:</p></td>
				<td>
					<div id="theme-selector">
						<span><?php echo ucfirst($theme);?></span>
						<ul><?php
							$themeList = scandir( "$CWD/scss/themes" );
							foreach( $themeList as $themePath ) {
								if( $themePath == "." || $themePath == ".." ) continue;
								if( strpos( $themePath, ".theme.append.scss" ) !== false ) continue;
								echo "<li>".ucfirst(str_replace(".theme.scss","",$themePath))."</li>";
							}
						?></ul>
					</div>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input id="btnSavePreferences" type="button" class="button primary" value="Apply Changes">
					<input id="btnResetPreferences" type="button" value="Reset Modifications" class="button alternative">
				</td>
			</tr>
		</table>

		<script>
			var $themeSelector = $("#theme-selector");
			var themeSelector = new Controls.Combobox( $themeSelector );

			var defaultTheme = themeSelector.value;
			$("#btnSavePreferences").on("click", function(){
				$("#transition-container").data("transition").Goto("?theme="+themeSelector.value );
			});
			$("#btnResetPreferences").on("click", function(){
				themeSelector.value = defaultTheme;
			});
		</script>


	</div>
</div>
