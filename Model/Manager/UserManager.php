<?php

namespace App\Model\Manager;

use App\Model\Entity\User;
use Connect;

class UserManager
{
    public const TABLE = 'mdf58_user';

    /**
     * create user
     * @param User $user
     * @return bool
     */
    public static function addUser(User &$user): bool
    {
        $stmt = Connect::dbConnect()->prepare("
            INSERT INTO " . self::TABLE . " (firstname,email,password) 
                VALUES(:firstname, :email, :password)
        ");

        $stmt->bindValue(':firstname',$user->getFirstname());
        $stmt->bindValue(':email',$user->getEmail());
        $stmt->bindValue(':password',$user->getPassword());

        return $stmt->execute();
    }

    /**
     * @param int $id
     * @return User|null
     */
    public static function getUserById(int $id): ?User
    {
        $result = Connect::dbConnect()->query("SELECT * FROM " . self::TABLE . " WHERE id = $id");
        return $result ? self::makeUser($result->fetch()) : null;
    }

    private static function makeUser(array $data): User
    {
        return (new User())
            ->setId($data['id'])
            ->setFirstname($data['firstname'])
            ->setEmail($data['email'])
            ->setPassword($data['password']);
    }

    /**
     * verify user exist
     * @param int $id
     * @return bool
     */
    public static function userExists(int $id): bool
    {
        $result = Connect::dbConnect()->query("SELECT count(*) as cnt FROM " . self::TABLE . " WHERE id = $id");
        return $result ? $result->fetch()['cnt'] : 0;
    }

    /**
     * verify mail exist
     * @param string $mail
     * @return bool
     */
    public static function mailExists(string $mail): bool
    {
        $result = Connect::dbConnect()->query("SELECT count(*) as cnt FROM " . self::TABLE . " WHERE email = \"$mail\"");
        return $result ? $result->fetch()['cnt'] : 0;
    }

    /**
     * @param string $mail
     * @return User|null
     */
    public static function getUserByMail(string $mail): ?User
    {
        $stmt = Connect::dbConnect()->prepare("SELECT * FROM " . self::TABLE . " WHERE email = :mail ");
        $stmt->bindParam(':mail', $mail);
        return $stmt->execute() ? self::makeUser($stmt->fetch()) : null;
    }
}