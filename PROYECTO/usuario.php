<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}

// Incluir archivo de conexión a la base de datos
require_once 'constantes.php';

// Obtener el ID de usuario del usuario actual
$id_usuario = $_SESSION["id_usuario"];

try {
    // Conexión a la base de datos
    $pdo = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta para obtener las últimas 10 partidas del usuario actual
    $query = "SELECT * FROM partida WHERE id_usuario = :id_usuario ORDER BY fecha DESC LIMIT 10";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
    $stmt->execute();
    $partidas = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Manejar errores de la consulta
    echo "Error al obtener las partidas: " . $e->getMessage();
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style\style.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Area personal</title>
</head>
<body>
    
    <?php include_once "header.php";?>

    <div class="container mt-5">
    <h2>Ranking de tus Partidas</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Puntuaje Total</th>
                <th>Fecha</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($partidas as $index => $partida): ?>
                <tr>
                    <td><?php echo $index + 1; ?></td>
                    <td><?php echo $partida['puntuaje_total']; ?></td>
                    <td><?php echo $partida['fecha']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <a href="tetris.php" class="btn btn-primary">Jugar</a>
</div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
</body>
</html>