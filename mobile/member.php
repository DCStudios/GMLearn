<?php

	$CWD = "..";
	require_once "$CWD/php/sqlite.php";
	require_once "$CWD/pages/builders/mobileHeader.builder.php";
	require_once "$CWD/pages/builders/bottom.builder.php";

	$loggedIn = ( empty( $_SESSION["loggedIn"] ) ? FALSE : $_SESSION["loggedIn"] );
	if ($loggedIn === FALSE || $loggedIn === null ) {
		header("Location: login.php");
	}

	$theme = $_SESSION["theme"];

	//Check if changing theme
	if( isset( $_GET["theme"] ) ) {
		$theme = strtolower( $_GET["theme"] );
		if( file_exists( "$CWD/scss/themes/$theme.theme.scss" ) ) {
			$statement = $sql->prepare("UPDATE users SET theme = :theme WHERE userid = :userid;");
			$statement->bindValue( ":theme", $theme );
			$statement->bindValue( ":userid", $_SESSION["userid"] );
			$statement->execute();
			$_SESSION["theme"] = $theme;
		}
	}

	/**
	 * Get either a Gravatar URL or complete image tag for a specified email address.
	 *
	 * @param string $email The email address
	 * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
	 * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
	 * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
	 * @param boole $img True to return a complete IMG tag False for just the URL
	 * @param array $atts Optional, additional key/value attributes to include in the IMG tag
	 * @return String containing either just a URL or a complete image tag
	 * @source http://gravatar.com/site/implement/images/php/
	 */
	function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
		$url = 'http://www.gravatar.com/avatar/';
		$url .= md5( strtolower( trim( $email ) ) );
		$url .= "?s=$s&d=$d&r=$r";
		if ( $img ) {
			$url = '<img src="' . $url . '"';
			foreach ( $atts as $key => $val )
				$url .= ' ' . $key . '="' . $val . '"';
			$url .= ' />';
		}
		return $url;
	}

	$builder->buildMobileHeader( "Membership - Member", $theme, $CWD );

	require_once "member/welcome.php";
?>

<script>
	DefineTransition( "member-page-container", {
		intro: 400,
		exit: 400,
		ignore: false,
		class: "is-exiting",
		exclude: "member-exclude"
	});
</script>

<div id="member-bar">
	
</div>
