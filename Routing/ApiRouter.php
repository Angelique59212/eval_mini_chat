<?php

namespace App\Routing;

use AbstractRouter;
use App\Controller\ApiMessageController;

class ApiRouter extends AbstractRouter
{

    public static function route(?string $action = null)
    {
        switch($action)
        {
            case 'add-message':
                (new ApiMessageController())->addMessage();
                break;
            default:
                http_response_code(404);
        }

        exit;
    }
}