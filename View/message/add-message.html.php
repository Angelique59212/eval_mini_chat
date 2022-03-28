<?php

use App\Model\Entity\Message;

if (!isset($_SESSION['user'])) {
header('Location: index.php');
}

if (isset($data['messages'])) {
    $messages = $data['messages'];
}?>

<h1>Chat</h1>

<div id="container-chat">
    <div id="container-message">
        <?php
        foreach ($messages as $message) {
            /* @var Message $message */ ?>
            <p><?= $message->getAuthor()->getFirstname() ?></p>
            <p><?= $message->getContent() ?></p><?php
        }
        ?>
    </div>

    <div id="container-response">
        <label for="content-message"></label>
        <textarea name="content" id="content-message" cols="30" rows="20"></textarea>
        <input type="submit" name="save" id="add-message">
    </div>
</div>



