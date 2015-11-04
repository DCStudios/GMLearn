<?php
	$CWD = "../..";
	require_once "$CWD/php/error_reporter.php";
	//\php_error\reportErrors();

	require_once "$CWD/php/sqlite.php";
	require_once "$CWD/php/scssphp/scss.inc.php";

	$theme = ( isset($_GET["theme"] ) ? $_GET["theme"] : $_SESSION["theme"] );

	$scss = new scssc();
	$scss -> setFormatter( "scss_formatter_compressed" );
	$css = $scss -> compile( file_get_contents( "$CWD/scss/pages/member_preferences.scss" ) );
?>

<style type="text/css"><?php echo $css; ?></style>
<div id="member-page-container">
	<div id="member-page" class="nextShortTransition animFadeInLeftAlt transition-exclude">


		<h1 class="page-header">Preferences</h1>

		<p id="theme-selector-label" class="pref-label">Theme:</p>
		<div id="theme-selector" class="pref-control">
			<span><?php echo ucfirst($theme);?></span>
			<ul>
				<li>Default</li>
				<li>Light</li>
				<li>Dark</li>
			</ul>
		</div>
		<script>
			var $themeSelector = $("#theme-selector");
			new Controls.Combobox( $themeSelector );
			/*
			$themeSelector.on("changed", function(e,val){
				window.location.search = "?theme="+val.toLowerCase();
				$("#transition-container").data("transition").Goto("member.php?theme="+val.toLowerCase());
			});

			var $_GET = parseGET();
			if( typeof $_GET["theme"] !== "undefined" ) {
				$themeSelector.data("c-combobox").text.html( ucfirst( $_GET["theme"] ) );
			}
			*/
		</script>


	</div>
</div>
