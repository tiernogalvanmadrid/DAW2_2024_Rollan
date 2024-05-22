<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = cleanInput($_POST["username"]);
    $email = cleanInput($_POST["email"]);
    $password1 = cleanInput(MD5($_POST["password1"]));
    $password2 = cleanInput(MD5($_POST["password2"]));
    $recaptcha = $_POST['g-recaptcha-response'];

	$secret_key = '6LdwOOUpAAAAAGl7nZAA-kbJVogqSk6XzirE3NB9'; 

	$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $recaptcha; 
	$response = file_get_contents($url); 
	$response = json_decode($response);

    if (($password2 == $password1) && ($response->success == true)) {

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
                $stmt->bindParam(':password', $password1, PDO::PARAM_STR);
                
                if ($stmt->execute()) {
                    echo "OK";
                } else {
                    echo "error";
                }
            }
        } catch (PDOException $e) {
            echo "error: " . $e->getMessage();
        }
    }else{
        echo "error: Las contraseñas no coinciden o reCAPTCHA fallado.";
    }
}


function cleanInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    
    return $data;
}
?>