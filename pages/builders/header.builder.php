<?php

	require_once "pages/builders/Builder.php";

	$build_header = function( $title ) { ?>

<!DOCTYPE <!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $title; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<div id="transition-container">

	<?php };

	$builder -> bind( "buildHeader", $build_header );

?>
