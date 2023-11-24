<!-- login.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body>

<?php
include("DB.php"); // Incluir el archivo de conexión a la base de datos

session_start();

// Función para reconectar si es necesario
function reconectar() {
    global $conn, $servername, $username, $password, $dbname;

    if ($conn->ping() === false) {
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }
    }

    return $conn;
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $contrasena = $_POST["contrasena"];

    // Reconectar si es necesario
    $conn = reconectar();

    // Utilizar una sentencia preparada para evitar la inyección SQL
    $sql = "SELECT * FROM usuarios WHERE nombre = ? AND contrasena = ?";
    $stmt = $conn->prepare($sql);

    // Verificar si la preparación de la sentencia fue exitosa
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    // Vincular los parámetros y ejecutar la consulta
    $stmt->bind_param("ss", $nombre, $contrasena);
    $stmt->execute();
    $result = $stmt->get_result();

    if (!$result) {
        die("Error en la ejecución de la consulta: " . $stmt->error);
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION["rol"] = $row["rol"];

        if ($_SESSION["rol"] == "admin") {
            header("Location: pagina_admin.php");
            exit(); // Asegura que el script se detenga después de la redirección
        } elseif ($_SESSION["rol"] == "usuario") {
            header("Location: pagina_usuario.php");
            exit(); // Asegura que el script se detenga después de la redirección
        } else {
            echo "Rol no válido";
        }
    } else {
        echo "Credenciales incorrectas";
    }

    // Cerrar la sentencia preparada
    $stmt->close();
}

// No cerramos explícitamente la conexión aquí, dejamos que PHP maneje la liberación de recursos al final del script
?>

<h2>Iniciar sesión</h2>
<form action="login.php" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required><br>

    <label for="contrasena">Contraseña:</label>
    <input type="password" id="contrasena" name="contrasena" required><br>

    <input type="submit" value="Iniciar sesión">
</form>

</body>
</html>
