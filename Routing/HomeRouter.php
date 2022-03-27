<?php

namespace App\Routing;

use AbstractRouter;
use App\Controller\HomeController;

class HomeRouter extends AbstractRouter
{
    public static function route(?string $action = null)
    {
        (new HomeController())->index();
    }
}