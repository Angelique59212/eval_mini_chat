?>
<header>
    <nav class="menu">
        <i class="fas fa-bars"></i>
        <ul>
            <?php

            use App\Controller\UserController;

            if (!UserController::verifyUserConnect()) { ?>
                <li><a href="/index.php?c=home">Home</a></li>
                <li><a href="/index.php?c=user&a=register">S'enregistrer</a></li>
                <li><a href="/index.php?c=user&a=connected">Se Connecter</a></li><?php
            } else { ?>
                <li><a href="/index.php?c=home">Home</a></li>
                <li><a href="/index.php?c=article&a=list-article">Messages</a></li>
                <li><a href="/index.php?c=user&a=disconnected">Se déconnecter</a></li><?php
            }

            ?>


        </ul>
    </nav>
</header>

<main class="container">
    <?= $html ?>
</main>

<script src="https://kit.fontawesome.com/6167e09880.js" crossorigin="anonymous"></script>
<script src="/assets/js/app.js"></script>
<script src="/assets/js/message.js"></script>

</body>
</html>
