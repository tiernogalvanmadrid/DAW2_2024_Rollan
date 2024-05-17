<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION["username"])) {
    // El usuario no está autenticado, redirigirlo a la página de inicio de sesión
    header("Location: index.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TETRIS</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style\styletetris.css">
</head>
<body>
<!-- <?php /* include_once "header.php"; */ ?> -->
  <div class="container-fluid">
    <div class="row justify-content-center">
        <div id="gameContainer">
          <div class="col">
            <div id="holdText" class="hold-text">HOLD</div>
            <div id="nextPiece"></div>
          </div>
          <div class="col">  
            <canvas width="320" height="640" id="game"></canvas>
          </div>
          <div class="col">
            <div class="next-text">NEXT PIECES</div>
            <div id="nextPieceContainer"></div>
            <div id="score">Score: 0</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="game.js"></script>
</body>
</html>