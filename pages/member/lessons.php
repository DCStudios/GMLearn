<?php
	$CWD = "../..";
	require_once "$CWD/php/error_reporter.php";
	require_once "$CWD/php/sqlite.php";
	require_once "$CWD/php/scssphp/scss.inc.php";

	$scss = new scssc();
	//$scss -> setFormatter( "scss_formatter_compressed" );
	$css = $scss -> compile( file_get_contents( "$CWD/scss/pages/member_lessons.scss" ) );

	$statement = $sql->prepare("
		SELECT name,description,url,icon FROM lessons
		WHERE name IN (
		SELECT lessons.name FROM lessons
		JOIN users
		WHERE
			users.username = :user AND
			users.xp >= lessons.required
		);
	");
	$statement -> bindValue(":user",$_SESSION["user"] );
	$result = $statement -> execute();
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
			<div id="t-beginner" class="message-header" data-control="#beginner">
				<h1>Beginner</h1>
			</div>
			<div id="beginner" class="message-body">
				<?php
					$lid = 0;
					if( $result !== FALSE ) {
						while( $row = $result -> fetchArray( SQLITE3_ASSOC ) ) {
							?>
							<div id="lesson_<?php echo $lid; ?>" class="lesson">
								<img class="lesson-icon" src="<?php echo $row["icon"]; ?>">
								<div class="lesson-info">
									<h1 class="lesson-title"><?php echo $row["name"]; ?></h1>
									<p class="lesson-description"><?php echo $row["description"]; ?></p>
								</div>
								<div class="dummy"></div>
							</div>
							<script>$("#lesson_<?php echo $lid++; ?>").on("click",function(){
								$("#member-page-container").data("transition").Goto("<?php echo $row["url"]; ?>");
							});
							</script>
							<?php
						}
					}
				?>
				<!--
				<div class="lesson">
					<img class="lesson-icon" src="">
					<div class="lesson-info">
						<h1 class="lesson-title">First Lesson</h1>
						<p class="lesson-description">The first lesson.</p>
					</div>
					<div class="dummy"></div>
				</div>
				-->
			</div>
		</div>
		<script>new Controls.Accordeon($("#t-beginner"));</script>

	</div>
</div>
