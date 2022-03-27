<?php

class MessageRouter extends AbstractRouter
{
    public static function route(?string $action = null)
    {
        $errorController = new ErrorController();
        $controller = new MessageApiController();

        if(null === $action) {
            $errorController->error404($action);
        }

        switch ($action) {
            case 'index':
                $controller->index();
                break;
            case 'add-message':
                $controller->addMessage();
                break;
            default:
                $errorController->error404($action);
        }
    }
}