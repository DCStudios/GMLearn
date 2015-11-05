<?php

	if( !isset( $CWD ) ) $CWD = "../..";
	require_once "$CWD/php/error_reporter.php";
	require_once "pages/builders/Builder.php";
	require_once "php/scssphp/scss.inc.php";

	$build_header = function( $title, $theme="default" ) {
		// Check if changing theme
		if( isset( $_GET["theme"] ) ) $theme = $_GET["theme"];

		// Check if theme exists
		if( !file_exists( "scss/themes/$theme.theme.scss" ) ) $theme = "default";

		// Load theme
		$style = file_get_contents( "scss/themes/$theme.theme.scss" );
		$style .= 	file_get_contents( "scss/styles.scss" );

		// Check if theme has modifications to append
		if( file_exists( "scss/themes/$theme.theme.append.scss" ) ) {
			$style .= file_get_contents( "scss/themes/$theme.theme.append.scss" );
		}

		// Compile CSS
		$scss = new scssc();
		$scss -> setFormatter( "scss_formatter_compressed" );
		$compiledStyles = $scss -> compile( $style );

		// Start generating HTML5
?>

<!DOCTYPE <!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $title; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/combobox.css">
	<style>
		<?php echo $compiledStyles; ?>
	</style>
</head>
<body>
	<script src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>
	<script type="text/javascript" src="js/transitions.js"></script>
	<script type="text/javascript" src="js/combobox.js"></script>
	<div id="transition-container" <?php if( isset( $_GET["theme"] ) ) echo "reload=\"full\"";?>>

<?php };

	$builder -> bind( "buildHeader", $build_header );

?>
