<?php

use App\Model\Entity\Message;

if (isset($data['messages'])) {
    $messages = $data['messages'];
} ?>

<h1>Chat</h1>

<div id="container-chat">
    <div id="container-message">
        <?php
        foreach ($messages as $message) {
            /* @var Message $message */ ?>
            <p class="message"><?= $message->getAuthor()->getFirstname() ?></p>
            <p class="message-content"><?= $message->getContent() ?></p><?php
        }
        ?>
    </div>

    <div id="container-response">
        <label for="content-message"></label>
        <textarea name="content" id="content-message" cols="30" rows="20"></textarea>
        <div>
            <div>
                <input type="submit" name="save" id="add-message">
            </div>
        </div>
    </div>
</div>



