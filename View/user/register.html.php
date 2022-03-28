<h1>Créer un compte</h1>

<div id="form-register">
    <form action="/index.php?c=user&a=register" onsubmit="return validateForm()" method="post" name="formRegister" id="register">
        <div>
            <label for="email">E-mail</label>
            <input type="text" name="email" id="email" required>
        </div>
        <div>
            <label for="firstname">First name</label>
            <input type="text" name="firstname" id="firstname" required>
        </div>
        <div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div>
                <label for="password-repeat">Password repeat</label>
                <input type="password" name="password-repeat" id="password-repeat" required>
            </div>
        </div>

        <input type="submit" value="Créer un compte" name="save" class="save">
    </form>
</div>

<div id="chat-computer">
    <img id="log-discussion" src="/assets/img/chat-computer.png" alt="discussion-chat">
</div>