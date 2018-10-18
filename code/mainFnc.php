<?php
	$pagesFolderPath = 'pages/';
	$frontpage = 'home.php';

	function setPageTitle($page){
    
    $title = '';
    
    switch($page){
        case 'home':
            $title = 'Frontpage | Title';
            break;
        case 'login':
            $title = 'Login | Title';
            break;
        default:
            $title = 'Title';
            break;
    }
    
    return $title;
    
}