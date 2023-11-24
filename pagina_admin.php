<?php
session_start();

// Verificar si el usuario está autenticado como admin
if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== "admin") {
    header("Location: login.php"); // Redirigir a la página de inicio de sesión si no está autenticado
    exit();
}

// Página de administrador
echo "¡Bienvenido, administrador!";
?>

<br>
<a href="logout.php">Cerrar sesión</a>
