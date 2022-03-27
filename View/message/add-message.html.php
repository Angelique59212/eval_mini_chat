<?php
if (!isset($_SESSION['user'])) {
header('Location: index.php');
}?>

<h1>Chat</h1>

<div>
    <label for="content-message"></label>
    <textarea name="content" id="content-message" cols="30" rows="20"></textarea>
    <input type="submit" name="save" id="add-message">
</div>



