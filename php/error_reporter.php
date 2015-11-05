<?php
	require_once "$CWD/vendor/autoload.php";
	use Whoops\Handler\PrettyPageHandler;
	use Whoops\Run;
	$run = new Run();
	$handler = new PrettyPageHandler();
	$run->pushHandler( $handler );
	$run->register();
?>
