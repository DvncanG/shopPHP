<?php
session_start();

// Verificar si el usuario está autenticado como usuario
if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== "usuario") {
    header("Location: login.php"); // Redirigir a la página de inicio de sesión si no está autenticado
    exit();
}

// Página de usuario
echo "¡Bienvenido, usuario!";
?>

<br>
<a href="logout.php">Cerrar sesión</a>
