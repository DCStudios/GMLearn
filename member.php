<?php
	$CWD = ".";
	require_once "$CWD/php/error_reporter.php";
	require_once "$CWD/php/reload.php";
	require_once "$CWD/php/sqlite.php";
	require_once "$CWD/pages/builders/Builder.php";
	require_once "$CWD/pages/builders/header.builder.php";
	require_once "$CWD/pages/builders/bottom.builder.php";
	require_once "$CWD/pages/builders/messagebox.builder.php";

	$theme = "default";

	$loggedIn = ( empty( $_SESSION["loggedIn"] ) ? FALSE : $_SESSION["loggedIn"] );
	if ($loggedIn === FALSE || $loggedIn === null ) {
		header("Location: login.php");
	}
	else {
		$theme = $_SESSION["theme"];

		//Check if changing theme
		if( isset( $_GET["theme"] ) ) {
			$theme = strtolower( $_GET["theme"] );
			if( file_exists( "scss/themes/$theme.theme.scss" ) ) {
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

		$builder->buildHeader( "Membership - Member", $theme );
?>

<?php include_once "pages/member/welcome.php"; ?>

<script>
	DefineTransition( "member-page-container", {
		intro: 400,
		exit: 400,
		ignore: false,
		class: "is-exiting",
		exclude: "member-exclude"
	});
</script>

<div id="userpanel" class="shortTransition animFadeInRightAlt transition-exclude">
	<?php echo get_gravatar( $_SESSION["email"], 48, "mm", "r", true, ["class"=>"gravatar"] ); ?>
	<span class="username"><?php echo $_SESSION["user"];?></span>
	<span class="usergroup"><?php echo $_SESSION["group"]; ?></span>
	<ul class="panelitemgroup">
		<li id="btnDashboard" class="panelitem"><a href="#">
			<span class='itemname'>Dashboard</span><i class="fa fa-bar-chart-o fa-2x"></i>
		</a></li>
		<li id="btnAchievements" class="panelitem"><a href="#">
			<span class='itemname'>Achievements</span><i class="fa fa-trophy fa-2x"></i>
		</a></li>
		<li id="btnLessons" class="panelitem"><a href="#">
			<span class='itemname'>Lessons</span><i class="fa fa-graduation-cap fa-2x"></i>
		</a></li>
		<li id="btnTutorials" class="panelitem"><a href="#">
			<span class='itemname'>Tutorials</span><i class="fa fa-graduation-cap fa-2x"></i>
		</a></li>
		<li id="btnChat" class="panelitem"><a href="#">
			<span class='itemname'>Chat</span><i class="fa fa-comment fa-2x"></i>
		</a></li>
		<li id="btnRequests" class="panelitem"><a href="#">
			<span class='itemname'>Requests</span><i class="fa fa-comment fa-2x"></i>
		</a></li>
		<li id="btnPreferences" class="panelitem"><a href="#">
			<span class='itemname'>Preferences</span><i class="fa fa-wrench fa-2x"></i>
		</a></li>
		<li id="btnLogout" class="panelitem"><a href="logout.php">
			<span class='itemname'>Logout</span><i class="fa fa-sign-out fa-2x"></i>
		</a></li>
	</ul>
</div>
<div class="transition-evalme invisible">
	$("#btnDashboard").on("click",function(e) {
		e.preventDefault();
		$("#member-page-container").data("transition").Goto("pages/member/dashboard.php");
	});

	$("#btnLessons").on("click",function(e) {
		e.preventDefault();
		$("#member-page-container").data("transition").Goto("pages/member/lessons.php");
	});

	$("#btnTutorials").on("click",function(e) {
		e.preventDefault();
		$("#member-page-container").data("transition").Goto("pages/member/tutorials.php");
	});

	$("#btnAchievements").on("click",function(e) {
		e.preventDefault();
		$("#member-page-container").data("transition").Goto("pages/member/achievements.php");
	});

	$("#btnChat").on("click",function(e) {
		e.preventDefault();
		$("#member-page-container").data("transition").Goto("pages/member/chat.php");
	});

	$("#btnPreferences").on("click", function(e){
		e.preventDefault();
		$("#member-page-container").data("transition").Goto("pages/member/preferences.php");
	});

	$("#btnLogout").on("click",function(e) {
		e.preventDefault();
		$("#transition-container").data("transition").Goto("logout.php");
	});
</div>

<?php
		$builder->buildBottom();
	}
?>
