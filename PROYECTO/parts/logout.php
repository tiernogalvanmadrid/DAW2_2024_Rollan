<?php
// Iniciar la sesión (si no está iniciada)
session_start();

// Destruir todas las variables de sesión
$_SESSION = array();

// Esto destruirá la sesión, y no solo los datos de la sesión.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalmente, destruir la sesión
session_destroy();

// Redirigir a la página de inicio
header("Location: ../index.php");
exit();
?>