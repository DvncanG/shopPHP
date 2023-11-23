<?php
session_start(); // Iniciar sesión

// Incluir el archivo de conexión a la base de datos
include 'DB.php';

function verificarInicioSesion($nombreUsuario, $contrasena, $conn) {
    // Asegurémonos de que la conexión esté abierta antes de realizar la consulta
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $sql = "SELECT id, nombre, contrasena, rol FROM usuarios WHERE nombre = '$nombreUsuario'";
    $resultado = $conn->query($sql);

    // Si ocurrió algún error en la consulta
    if (!$resultado) {
        die("Error en la consulta: " . $conn->error);
    }

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        if (password_verify($contrasena, $fila['contrasena'])) {
            // Inicio de sesión exitoso
            $_SESSION['usuario_id'] = $fila['id'];
            $_SESSION['usuario_nombre'] = $fila['nombre'];
            $_SESSION['usuario_rol'] = $fila['rol'];

            // Cerrar la conexión si ya no se necesita
            $conn->close();

            return true;
        }
    }

    // Cerrar la conexión si no hay coincidencias
    $conn->close();

    return false; // Inicio de sesión fallido
}



// Manejar el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreUsuario = $_POST['nombreUsuario'];
    $contrasena = $_POST['contrasena'];

    if (verificarInicioSesion($nombreUsuario, $contrasena, $conn)) {
        // Redirigir según el rol
        if ($_SESSION['usuario_rol'] == 'admin') {
            header("Location: pagina_admin.php");
        } else {
            header("Location: pagina_usuario.php");
        }
        exit(); // Asegurarse de que el script se detenga después de redirigir
    } else {
        $mensajeError = "Nombre de usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
<body>

<h2>Iniciar Sesión</h2>
<?php
if (isset($mensajeError)) {
    echo "<p style='color: red;'>$mensajeError</p>";
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="nombreUsuario">Nombre de Usuario:</label>
    <input type="text" name="nombreUsuario" required>
    <br>
    <label for="contrasena">Contraseña:</label>
    <input type="password" name="contrasena" required>
    <br>
    <input type="submit" value="Iniciar Sesión">
</form>

</body>
</html>
