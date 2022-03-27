<?php

use App\Controller\ErrorController;
use App\Routing\ApiRouter;
use App\Routing\HomeRouter;
use App\Routing\MessageRouter;
use App\Routing\UserRouter;

require __DIR__ . '/../include.php';
session_start();

//check if page and method are present
$page = isset($_GET['c']) ? AbstractRouter::secure($_GET['c']) : 'home';
$method = isset($_GET['a']) ? AbstractRouter::secure($_GET['a']) : 'index';

// controller.
switch ($page) {
    case 'home':
        HomeRouter::route();
        break;
    case 'user':
        UserRouter::route($method);
        break;
    case 'message':
       MessageRouter::route($method);
        break;
    case 'api':
        ApiRouter::route($method);
        break;
    default:
        (new ErrorController())->error404($page);
}