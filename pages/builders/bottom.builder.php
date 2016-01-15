<?php

	if( !isset( $CWD ) ) $CWD = "../..";
	require_once "$CWD/pages/builders/Builder.php";


	$build_bottom = function( $extraContent="", $introLength=800, $exitLength=800 ) { ?>
</div>
	<script text="text/javascript">
		DefineTransition( "transition-container", {
			intro: <?php echo $introLength; ?>,
			exit: <?php echo $exitLength; ?>,
			class: "is-exiting"
		});
	</script>
	<?php echo $extraContent; ?>
</body>
</html>
	<?php };

	$builder -> bind( "buildBottom", $build_bottom );

?>
