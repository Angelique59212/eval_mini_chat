<?php

require __DIR__ .'/Config.php';
require __DIR__ .'/Model/Connect.php';

require __DIR__ .'/Model/Entity/AbstractEntity.php';
require __DIR__ .'/Model/Entity/Message.php';
require __DIR__ .'/Model/Entity/User.php';

require __DIR__ .'/Model/Manager/MessageManager.php';
require  __DIR__ .'/Model/Manager/UserManager.php';

require __DIR__ .'/Controller/AbstractController.php';
require __DIR__ .'/Controller/ErrorController.php';
require __DIR__ .'/Controller/HomeController.php';
require __DIR__ . '/Controller/ApiMessageController.php';
require __DIR__ .'/Controller/UserController.php';

require __DIR__ .'/Routing/AbstractRouter.php';
require __DIR__ .'/Routing/HomeRouter.php';
require __DIR__ .'/Routing/MessageRouter.php';
require __DIR__ .'/Routing/UserRouter.php';