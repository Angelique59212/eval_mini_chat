<?php

namespace App\Controller;

use AbstractController;
use App\Model\Entity\Message;
use App\Model\Manager\MessageManager;

class MessageController extends AbstractController
{
    public function index()
    {
        $this->render('message/add-message',[
                'messages' => MessageManager::findAll(),
            ]);
    }

    public function findAll()
    {
        $messages = [];
        foreach (MessageManager::findAll() as $key => $value) {
            /* @var Message $value */
            $messages[$key]['content'] = $value->getContent();
            $messages[$key]['author'] = $value->getAuthor()->getFirstname();
        }
        echo json_encode($messages);
    }
}