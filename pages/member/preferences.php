<?php
	$CWD = "../..";
	require_once "$CWD/php/sqlite.php";
	$theme = ( isset($_GET["theme"] ) ? $_GET["theme"] : $_SESSION["theme"] );
?>

<div id="member-page-container">
	<div id="member-page" class="nextShortTransition animFadeInLeftAlt transition-exclude">


		<h1 class="page-header">Preferences</h1>

		<div id="theme-selector">
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
			$themeSelector.on("changed", function(e,val){
				window.location.search = "?theme="+val.toLowerCase();
				$("#transition-container").data("transition").Goto("member.php?theme="+val.toLowerCase());
			});

			var $_GET = {};
			document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
			    function decode(s) {
			        return decodeURIComponent(s.split("+").join(" "));
			    }
			    $_GET[decode(arguments[1])] = decode(arguments[2]);
			});

			function ucfirst(string) {
			    return string.charAt(0).toUpperCase() + string.slice(1);
			}
			if( typeof $_GET["theme"] !== "undefined" ) {
				$themeSelector.data("c-combobox").text.html( ucfirst( $_GET["theme"] ) );
			}

		</script>


	</div>
</div>
