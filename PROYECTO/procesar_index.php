<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = cleanInput($_POST["email"]);
    $password = cleanInput(MD5($_POST["password"]));
    $recaptcha = $_POST['g-recaptcha-response'];

	$secret_key = '6LdwOOUpAAAAAGl7nZAA-kbJVogqSk6XzirE3NB9'; 

	$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $recaptcha; 
	$response = file_get_contents($url); 
	$response = json_decode($response);
    
    if ((empty($email) || empty($password))) {
        $error = "Por favor, completa todos los campos.";
    } elseif ($response->success == true){

            require_once('constantes.php');
            try {
                $pdo = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
                
                $stmt = $pdo->prepare("SELECT id_usuario, nombre_usuario, email, contrasenia FROM usuario WHERE email = ?");
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
    }else{
        echo "Recaptcha fallida";
    }
}


function cleanInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    
    return $data;
}
?>