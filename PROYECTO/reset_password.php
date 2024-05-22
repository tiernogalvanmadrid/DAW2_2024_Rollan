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
            $subject = 'Restablecer contraseña';
            $msg = "Copie el enlace y péguelo en la barra de direcciones de su navegador.". "\r\n"."www.cristinarollan.es/recuperacion_reset.php?key=" . $key . "&email=" . $email;
            $headers = 'X_Mailer: PHP/' . phpversion();
            mail($to, $subject, $msg, $headers);
            
        } else {
            $message = "¡Lo siento! No hay ninguna cuenta asociada con este email";
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link rel="stylesheet" href="style\style3.css">
</head>
<body>
    <section>
        <?php
        $num_squares = 700; // Define el número de cuadrados
        for ($i = 0; $i < $num_squares; $i++) {
            echo '<span></span>';
        }
        ?>
        <div class="signin">
            <div class="content">
                <h2>Forgot Password</h2>
                <p>Enter your email address to reset your password.</p>
                <div class="form">
                        <div class="inputBox">
                            <input type="email" id="email" name="email" required>
                            <i>Email</i>
                        </div>
                        <div class="inputBox">
                            <input type="submit" id="submit" value="Reset Password">
                        </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.getElementById('submit').addEventListener('click', function() {
            var email = document.getElementById('email').value;

            // Crear objeto FormData para enviar los datos
            var formData = new FormData();
            formData.append('email', email);

            // Enviar datos usando fetch
            fetch(window.location.href, {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Manejar la respuesta del servidor
                console.log(data);
                alert('Password reset link has been sent to your email.');
            })
            .catch(error => {
                console.error('Error:', error);
                alert('There was an error. Please try again.');
            });
        });
    </script>


</body>
</html>