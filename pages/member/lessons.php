<?php
	$CWD = "../..";
	require_once "$CWD/php/error_reporter.php";
	require_once "$CWD/php/scssphp/scss.inc.php";

	$scss = new scssc();
	//$scss -> setFormatter( "scss_formatter_compressed" );
	$css = $scss -> compile( file_get_contents( "$CWD/scss/pages/member_lessons.scss" ) );
?>

<div id="member-page-container">
	<div id="member-page" class="nextShortTransition animFadeInLeftAlt transition-exclude">

		<style><?php echo $css; ?></style>

		<div class="closableMessage">
			<div class="message-header">
				<h1>Information</h1>
				<span id="t-info" class="message-header-toggle" data-control="#info"></span>
			</div>
			<div id="info" class="message-body open"><p>
				The following lessons are available for your current level.
				As you complete lessons, more and more lessons will unlock.<br>
				Lessons are categorized per difficulty level. Since not everyone
				starts with the same level of knowledge, the first lesson of each
				category is made available.<br>Do please progress in the difficulty
				that suits you most.
			</p></div>
		</div>
		<script>new Controls.Accordeon($("#t-info"));</script>

		<div class="closableMessage">
			<div class="message-header">
				<h1>Beginner</h1>
				<span id="t-beginner" class="message-header-toggle" data-control="#beginner"></span>
			</div>
			<div id="beginner" class="message-body">
				Test
			</div>
		</div>
		<script>new Controls.Accordeon($("#t-beginner"));</script>

	</div>
</div>
