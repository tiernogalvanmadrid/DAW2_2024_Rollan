<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = cleanInput($_POST["email"]);
    $password = cleanInput(MD5($_POST["password"]));
    
    if (empty($email) || empty($password)) {
        $error = "Por favor, completa todos los campos.";
    } else {
        require_once('constantes.php');
        try {
          $pdo = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
          
          $stmt = $pdo->prepare("SELECT * FROM usuario WHERE email = ?");
          $stmt->execute([$email]);
          $user = $stmt->fetch();
          
          if ($email == $user['email'] && $password == $user['contrasenia']){
                session_start();
                $_SESSION["username"] = $user['nombre_usuario'];
                $_SESSION["id_usuario"] = $user['id_usuario'];
                echo "OK";
            } else {
                $error = "Usuario o contraseña incorrectos.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}


function cleanInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    
    return $data;
}
?>