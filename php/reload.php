<?php if( !isset( $CWD ) ) $CWD = ".."; ?>
<script src="<?php echo $CWD; ?>/js/reloadr.js"></script>
<script>
	var CWD = "<?php echo $CWD; ?>";
	Reloadr.go({
		server: [
			CWD+"/css/*.css",
			CWD+"/*.php",
			CWD+"/php/*.php",
			CWD+"/js/*.js"
		],
		path: CWD+"/reloadr.php",
		frequency: 1000
	});

	console.log( CWD+"/css/styles.css" );
</script>
