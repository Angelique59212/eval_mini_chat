<?php

namespace App\Model\Manager;

use Connect;
use App\Model\Entity\Message;

class MessageManager
{
    public const TABLE = 'mdf58_message';

    /**
     * @return array
     */
    public static function findAll(): array
    {
        $messages = [];
        $query = Connect::dbConnect()->query("SELECT * FROM " . self::TABLE);
        if ($query) {
            foreach ($query->fetchAll() as $messageData) {
                $messages[] = (new Message())
                    ->setId($messageData['id'])
                    ->setContent($messageData['content']);
            }
        }
        return $messages;
    }

    /**
     * Add message in db.
     * @param Message $message
     * @return void
     */
    public static function addNewMessage(Message &$message): bool
    {
        $stmt = Connect::dbConnect()->prepare("
            INSERT INTO " . self::TABLE . " (content, mdf58_user_fk)
            VALUES (:content, :mdf58_user_fk)
        ");

        $stmt->bindValue(':content', $message->getContent());
        $stmt->bindValue(':mdf58_user_fk', $message->getAuthor()->getId());


        $result = $stmt->execute();
        $message->setId(Connect::dbConnect()->lastInsertId());
        return $result;
    }
}