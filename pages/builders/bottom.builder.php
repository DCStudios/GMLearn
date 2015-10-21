<?php

	require_once "pages/builders/Builder.php";


	$build_bottom = function( $extraContent="" ) { ?>
</div>
	<script src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/transitions.js"></script>
	<script text="text/javascript">
		DefineTransition( "transition-container", {
			intro: 800,
			exit: 800,
			class: "is-exiting"
		});
	</script>
	<? php echo $extraContent; ?>
</body>
</html>
	<?php };

	$builder -> bind( "buildBottom", $build_bottom );

?>
