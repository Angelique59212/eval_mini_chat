<?php

namespace App\Routing;

use AbstractRouter;
use App\Controller\ErrorController;
use App\Controller\UserController;

class UserRouter extends AbstractRouter
{
    public static function route(?string $action = null)
    {
        $controller = new UserController();
        switch ($action) {
            case 'index':
                $controller->index();
                break;
            case 'register':
                $controller->register();
                break;
            case 'disconnected':
                $controller->disconnected();
                break;
            case 'connected':
                $controller->connected();
                break;
            default:
                (new ErrorController())->error404($action);
        }
    }
}