<?php
// Configuración de la conexión a la base de datos
$servername = "localhost"; // El servidor generalmente está en localhost
$username = "root"; // En phpMyAdmin, el nombre de usuario a menudo es "root"
$password = ""; // No hay contraseña en este ejemplo, pero considera agregar una en producción
$dbname = "tiendaropa"; // Nombre de tu base de datos en phpMyAdmin

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

echo "Conexión exitosa";  // Puedes quitar esto en producción

// Aquí puedes realizar operaciones con la base de datos

// Cerrar la conexión al finalizar las operaciones
$conn->close();
?>
