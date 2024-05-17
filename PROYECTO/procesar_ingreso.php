<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = MD5($_POST["password"]);
    try {
        require_once('constantes.php');

        $pdo = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Verificar si el email ya está registrado
        $sql = "SELECT id_usuario FROM usuario WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "email_exists";
        } else {
            // Insertar nuevo usuario
            $sql = "INSERT INTO usuario (nombre_usuario, email, contrasenia) VALUES (:username, :email, :password)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            
            if ($stmt->execute()) {
                echo "OK";
            } else {
                echo "error";
            }
        }
    } catch (PDOException $e) {
        echo "error: " . $e->getMessage();
    }
}
?>
