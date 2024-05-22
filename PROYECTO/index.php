<?php
session_start();

if (isset($_SESSION["username"])) {
  header("Location: usuario.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="UTF-8">
    <title>Tetris Game</title>
    <link rel="stylesheet" href="style\style.css">
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
          <h2>Sign In</h2>
          <div class="form">
            <div class="inputBox">
              <input type="email" id="email" required>
              <i>Email</i>
            </div>
            <div class="inputBox">
              <input type="password" id="password" required>
              <i>Password</i>
            </div>
            <div class="g-recaptcha" data-sitekey="6LdwOOUpAAAAAHEsXofdXZVmbptJbjA707b4uV08"></div>
            <div class="links">
              <a href="reset_password.php">Forgot Password</a>
              <a href="registro.php">Sign up</a>
            </div>
            <div class="inputBox">
              <input type="submit" value="Log in" onclick="submitForm()">            
            </div>
          </div>
        </div>
      </div>
  </section>
  <script>
    function submitForm() {
      event.preventDefault();
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var recaptchaResponse = grecaptcha.getResponse();

    if (!email || !password || !recaptchaResponse) {
            alert("Por favor, complete todos los campos.");
            return;
    }
    if (!recaptchaResponse) {
            alert("Por favor, complete el reCAPTCHA.");
            return;
    }
    if (!email) {
            alert("Por favor, ingresa un email.");
            return;
    }
    if (!password) {
            alert("Por favor, ingresa una contraseña.");
            return;
    }

    // Crear un objeto FormData para enviar los datos
    var formData = new FormData();
    formData.append('email', email);
    formData.append('password', password);
    formData.append('g-recaptcha-response', recaptchaResponse);

    // Crear una solicitud AJAX para enviar los datos a un script PHP
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'procesar_index.php', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            // Manejar la respuesta del servidor si es necesario
            if (xhr.responseText.trim() === "OK") {
              window.location.href = "usuario.php";
            } else {
              alert("Usuario o contraseña incorrectos.")
            }
        }
    };
    xhr.send(formData);
}
</script>
</body>
</html>