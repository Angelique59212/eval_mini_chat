<?php

use App\Model\Entity\Message;
use App\Model\Manager\MessageManager;

session_start();

$payload = file_get_contents('php://input');
$payload = json_decode($payload);

if(empty($payload->content)) {
    http_response_code(400);
    exit;
}

if(!isset($_SESSION['user'])) {
    http_response_code(403);
    exit;
}

$content = trim(strip_tags(htmlentities(($payload->content))));

$message = (new Message())
    ->setContent($content);

if (MessageManager::addNewMessage($message)) {
    echo json_encode([
        'id' => $message->getId(),
        'content' => $message->getContent(),
        'author' => $message->getAuthor()->getFirstname(),
    ]);
    http_response_code(200);
    exit;
}

http_response_code(200);
exit;