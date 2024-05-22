<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="style\style2.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

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
                        <input type="text" id="username" maxlength="30" required>
                        <i>Username</i>
                    </div>
                    <div class="inputBox">
                        <input type="email" id="email" maxlength="50" required>
                        <i>Email</i>
                    </div>
                    <div class="inputBox">
                        <input type="password" id="password1" maxlength="50" required>
                        <i>Password</i>
                    </div>
                    <div class="inputBox">
                        <input type="password" id="password2" maxlength="50" required>
                        <i>Confirm Password</i>
                    </div>
                    <div>
                        <input type="checkbox" name="privacy" id="privacy" required> <a class="privacy" href="proteccion_datos.php">Política de protección de datos</a>
                    </div>
                    <div class="g-recaptcha" data-sitekey="6LdwOOUpAAAAAHEsXofdXZVmbptJbjA707b4uV08"></div>
                    <div class="inputBox">
                        <input type="submit" value="Sign in" onclick="submitForm(event)">
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
        var validDomains = ["gmail.com", "yahoo.com", "yahoo.es", "hotmail.com", "hotmail.es", "outlook.com", "educa.madrid.org"];
        var domain = email.split('@')[1];
        return validDomains.includes(domain);
    }

    function submitForm(event) {
        event.preventDefault();

        var username = document.getElementById("username").value;
        var email = document.getElementById("email").value;
        var password = document.getElementById("password1").value;
        var confirmPassword = document.getElementById("password2").value;
        var privacy = document.getElementById("privacy").checked;
        var recaptchaResponse = grecaptcha.getResponse();

        if (!username || !email || !password || !confirmPassword || !privacy) {
            alert("Por favor, complete todos los campos y acepte la política de protección de datos.");
            return;
        }

        if (username.length > 30) {
            alert("El nombre de usuario no puede tener más de 30 caracteres.");
            return;
        }

        if (email.length > 50) {
            alert("El email no puede tener más de 50 caracteres.");
            return;
        }

        if (password.length > 50) {
            alert("La contraseña no puede tener más de 50 caracteres.");
            return;
        }

        if (!validateEmail(email)) {
            alert("Por favor, introduzca un email válido.");
            return;
        }

        if (!validateDomain(email)) {
            alert("Por favor, introduzca un email con un dominio válido.");
            return;
        }

        if (password !== confirmPassword) {
            alert("Las contraseñas no coinciden.");
            return;
        }

        if (!recaptchaResponse) {
            alert("Por favor, complete el reCAPTCHA.");
            return;
        }

        var formData = new FormData();
        formData.append('username', username);
        formData.append('email', email);
        formData.append('password1', password);
        formData.append('password2', confirmPassword);
        formData.append('g-recaptcha-response', recaptchaResponse);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'procesar_ingreso.php', true);
        xhr.onload = function () {
            if (xhr.status === 200) {
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