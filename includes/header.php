<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
	
	<link rel="manifest" href="manifest.json">
	
	<?php
		$uri = explode("/", $_SERVER['REQUEST_URI']);
		$page = $uri[4];
	?>
	<title><?php echo setPageTitle($page); ?></title>
	
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
	
</head>
<body>