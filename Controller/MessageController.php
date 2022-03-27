<?php

namespace App\Controller;

use AbstractController;

class MessageController extends AbstractController
{
    public function index()
    {
        header('Location:/index.php?c=message&a=add-message');
    }

}