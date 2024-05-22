<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = cleanInput($_POST["email"]);

    try {
        require_once('constantes.php');

        $pdo = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT nombre_usuario, email FROM usuario WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            $message_success = " Por favor revisa tu bandeja de entrada de correo electrónico o carpeta de spam y sigue los pasos.";
            
            // Generar la clave aleatoria
            $key = md5(time() + 123456789 % rand(4000, 55000000));
            
            // Insertar esta clave temporal en la base de datos
            $stmt = $pdo->prepare("INSERT INTO recuperar_contrasenia (email, temp_key) VALUES (:email, :temp_key)");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':temp_key', $key, PDO::PARAM_STR);
            $stmt->execute();
            
            // Enviar correo electrónico con la información para restablecer la contraseña
            $to = $email;
            $subject = 'Changing password DEMO- psuresh.com.np';
            $msg = "Please copy the link and paste in your browser address bar". "\r\n"."www.psuresh.com.np/misc/forgot-password-php/forgot_password_reset.php?key=" . $key . "&email=" . $email_reg;
            $headers = 'From: Gentle Heart Foundation' . "\r\n";
            mail($to, $subject, $msg, $headers);
            
        } else {
            $message = "Sorry! no account associated with this email";
        }
    }catch (PDOException $e) {
        echo "error: " . $e->getMessage();
    }
}

function cleanInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    
    return $data;
}
?>