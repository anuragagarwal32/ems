<?php

// declare(strict_types=1);
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    date_default_timezone_set('Asia/Kolkata');

    define("DIR_ROOT", dirname(__FILE__));
    define("DIR_ATTACHMENT", dirname(__FILE__, 3).'/attachments/');
    define("HOST_ATTACHMENT", 'http://'.$_SERVER['HTTP_HOST'].'/ems/attachments/');
    define("DIR_ASSETS", 'assets/');
    define("DIR_TEMPLATE", 'templates/');
    define("DIR_TEMPLATE_C", 'templates_c/');
    define("DIR_CACHE", 'cache/');
    define("DIR_TEMPLATE_ASSETS", 'templates/assets/');
    define("DIR_VENDOR", 'vendor/');
    define("DIR_INCLUDE", 'include/');
	define("DIR_INCLUDE_TEMPLATE", '../include/');