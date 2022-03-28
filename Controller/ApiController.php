<?php

namespace App\Controller\Api;


use AbstractController;
use App\Model\Entity\Message;
use App\Model\Manager\MessageManager;

class ApiController extends AbstractController
{

    /**
     * @return void
     */
    public function index()
    {
        $this->render('home/index');
    }

    public function addMessage()
    {
        $payload = file_get_contents('php://input');
        $payload = json_decode($payload);

        if (empty($payload->content)) {
            http_response_code(400);
            exit();
        }

        if (!self::verifyUserConnect()) {
            http_response_code(403);
            exit();
        }

        $content = $this->dataClean($payload->content);

        $user = self::verifyUserConnect();
        $currentUser = $_SESSION['user'];

        $message = (new Message())
            ->setAuthor($currentUser)
            ->setContent($content);

        if (MessageManager::addNewMessage($message)) {
            echo json_encode([
                'id'=>$message->getId(),
                'author'=>$message->getAuthor()->getFirstname(),
                'content'=>$message->getContent(),
            ]);
            http_response_code(200);
            exit();
        }
    }
}