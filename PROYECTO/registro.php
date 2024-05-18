<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="style\style2.css">
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
                <h2>Sign up</h2>
                <div class="form">
                    <div class="inputBox">
                        <input type="text" id="username" required>
                        <i>Username</i>
                    </div>
                    <div class="inputBox">
                        <input type="email" id="email" required>
                        <i>Email</i>
                    </div>
                    <div class="inputBox">
                        <input type="password" id="password" required>
                        <i>Password</i>
                    </div>
                    <div class="inputBox">
                        <input type="password" id="confirmpassword" required>
                        <i>Confirm Password</i>
                    </div>
                    <div class>
                        <input type="checkbox" name="privacy" id="privacy" required><a href="proteccion_datos.php">Política de protección de datos</a>
                    </div>
                    <div class="inputBox">
                        <input type="submit" value="Sign in" onclick="submitForm()">
                    </div>

                    <div class="links">
                        <h5>Have an account?</h5>
                        <a href="index.php">Log in</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
    function validateEmail(email) {
        var re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        return re.test(email);
    }

    function validateDomain(email) {
        var validDomains = ["gmail.com", "yahoo.com", "yahoo.es", "hotmail.com", "hotmail.es", "outlook.com", "educa.madrid.org"]; // Agrega los dominios válidos aquí
        var domain = email.split('@')[1];
        return validDomains.includes(domain);
    }

    function submitForm() {
        var username = document.getElementById("username").value;
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmpassword").value;
        var privacy = document.getElementById("privacy").checked;

        // Validar campos obligatorios
        if (!username || !email || !password || !confirmPassword || !privacy) {
            alert("Por favor, complete todos los campos y acepte la política de protección de datos.");
            return;
        }

        // Validar formato del email
        if (!validateEmail(email)) {
            alert("Por favor, introduzca un email válido.");
            return;
        }

        // Validar que el dominio del email sea válido
        if (!validateDomain(email)) {
            alert("Por favor, introduzca un email con un dominio válido.");
            return;
        }

        // Validar que las contraseñas coincidan
        if (password !== confirmPassword) {
            alert("Las contraseñas no coinciden.");
            return;
        }

        // Crear un objeto FormData para enviar los datos
        var formData = new FormData();
        formData.append('username', username);
        formData.append('email', email);
        formData.append('password', password);

        // Crear una solicitud AJAX para enviar los datos a un script PHP
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'procesar_ingreso.php', true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                // Manejar la respuesta del servidor si es necesario
                if (xhr.responseText.trim() === "OK") {
                    alert("Usuario registrado con éxito!");
                    window.location.href = "index.php";
                } else if (xhr.responseText.trim() === "email_exists") {
                    alert("Usuario ya registrado");
                } else {
                    alert("Error: " + xhr.responseText);
                }
            } else {
                alert("Error al procesar la solicitud.");
            }
        };
        xhr.send(formData);
    }
    </script>
</body>
</html>