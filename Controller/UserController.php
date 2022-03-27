<?php

namespace App\Controller;

use AbstractController;
use App\Model\Entity\User;
use App\Model\Manager\UserManager;

class UserController extends AbstractController
{
    /**
     * @return void
     */
    public function index()
    {
        $this->render('user/user-list');
    }

    /**
     * @return void
     */
    public function register()
    {
        self::redirectIfConnected();

        if($this->verifyFormSubmit()) {
            $mail = $this->dataClean($this->getFormField('email'));
            $firstname = $this->dataClean($this->getFormField('firstname'));
            $password = $_POST['password'];
            $passwordRepeat = $_POST['password-repeat'];

            $errors = [];
            $mail = filter_var($mail, FILTER_SANITIZE_EMAIL);
            if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "L'adresse mail n'est pas valide";
            }

            if($password !== $passwordRepeat) {
                $errors[] = "Les password ne correspondent pas";
            }

            if(!preg_match('/^(?=.*[!@#$%^&*-\])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/', $password)) {
                $errors[] = "Le password ne correspond pas aux critères";
            }

            if(count($errors) > 0) {
                $_SESSION['errors'] = $errors;
            }
            else {
                $user = new User();
                $user
                    ->setFirstname($firstname)
                    ->setEmail($mail)
                    ->setPassword(password_hash($password, PASSWORD_DEFAULT));

                if(!UserManager::mailExists($user->getEmail())) {
                    UserManager::addUser($user);
                    if(null !== $user->getId()) {
                        $_SESSION['success'] = "Compte activé";
                        $user->setPassword('');
                        $_SESSION['user'] = $user;
                        header("Location: index.php/?c=home");
                    }
                    else {
                        $_SESSION['errors'] = ["Erreur d'enregistrement"];
                    }
                }
                else {
                    $_SESSION['errors'] = ["Adresse mail déjà existante"];
                }
            }

        }
        $this->render('user/register');
    }

    /**
     * @return void
     */
    public function connected()
    {
        self::redirectIfConnected();

        if($this->verifyFormSubmit()) {
            $errorMessage = "Données non correctes";
            $mail = $this->dataClean($this->getFormField('email'));
            $password = $this->getFormField('password');

            $user = UserManager::getUserByMail($mail);
            if (null === $user) {
                $_SESSION['errors'][] = $errorMessage;
            }
            else {
                if (password_verify($password, $user->getPassword())) {
                    $_SESSION['user'] = $user;
                    $this->redirectIfConnected();
                }
                else {
                    $_SESSION['errors'][] = $errorMessage;
                }
            }
        }

        $this->render('user/connected');
    }

    /**
     * @return void
     */
    public function disconnected(): void
    {
        if(self:: verifyUserConnect()) {
            $_SESSION['user'] = null;
            $_SESSION['messages'] = null;
            $_SESSION['success'] = null;
            session_unset();
            session_destroy();
        }

        $this->render('home/index');
    }
}