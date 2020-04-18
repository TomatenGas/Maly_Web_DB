<?php

$url =  $_SERVER['REQUEST_URI'];

switch ($url){
    case '/regdb': $filename = 'RegDB.php';
        require $filename;
        break;

    case '/logdb': $filename = 'LogDB.php';
        require $filename;
        break;

    case '/loripsdb': $filename = 'LorIpsDB.php';
        require $filename;
        break;

    case '/logoutdb': $filename = 'LogoutDB.php';
        require $filename;
        break;

	default : $filename = '404.php';
		require $filename;
		break;
}

