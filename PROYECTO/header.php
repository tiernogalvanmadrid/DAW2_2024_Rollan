<?php

if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
} else {
    $username = "Invitado";
}
?>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Tetris Game</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto"></ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <span class="navbar-text">
                            <?php echo "Bienvenido, $username"; ?>
                        </span>
                    </li>
                    <li class="nav-item">
                        <?php if (isset($_SESSION["username"])): ?>
                            <a class="nav-link" href="logout.php">Cerrar sesión</a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

