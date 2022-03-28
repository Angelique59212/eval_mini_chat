<?php

namespace App\Routing;

use AbstractRouter;
use App\Controller\Api\ApiController;

class ApiRouter extends AbstractRouter
{

    public static function route(?string $action = null)
    {
        switch($action)
        {
            case 'add-message':
                (new ApiController())->addMessage();
                break;
            default:
                http_response_code(404);
        }

        exit;
    }
}