<?php
	session_start();

//   if(!isset($_SERVER['HTTPS'])){
// 		header('Location: https://' . $_SERVER["SERVER_NAME"] . $_SERVER['REQUEST_URI']);
// 	}

	require_once('code/mainFnc.php');

	function autoLoader($class){
		require_once("classes/" . strtolower($class) . ".php");
	}
	spl_autoload_register('autoLoader');

	if(Config::useLocal){
		ini_set('display_errors', 1);
		error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT);
	}

	// Include the header template
  require_once('includes/header.php');

  $uri = explode("/", $_SERVER['REQUEST_URI']);

  if(isset($uri[1]) && !empty($uri[1])){
    if(file_exists($pagesFolderPath . $uri[1] . '.php')){
    	include($pagesFolderPath . $uri[1] . '.php');
    }
    else{
    	include($pagesFolderPath . '404.php');
    }
  }else {
    include($pagesFolderPath . 'home.php');
  }

  // Include the footer template
  require_once('includes/footer.php');
