<!-- login.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

    <div class="container">

        <?php
        include("DB.php"); // Incluir el archivo de conexión a la base de datos
        session_start();

        // Verificar si el usuario ya está autenticado
        if (isset($_SESSION['usuario'])) {
            // El usuario ya está autenticado, redirigir según el rol almacenado en la sesión
            if ($_SESSION["rol"] == "admin") {
                header("Location: pagina_admin.php");
                exit();
            } elseif ($_SESSION["rol"] == "usuario") {
                header("Location: pagina_usuario.php");
                exit();
            }
        }

        // Verificar si se ha enviado el formulario
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $contrasena = $_POST["contrasena"];

            // Reconectar si es necesario
            $conn = $db->reconectar();

            // Lógica de autenticación
            $sql = "SELECT * FROM usuarios WHERE nombre = ? AND contrasena = ?";
            $stmt = $conn->prepare($sql);

            if (!$stmt) {
                die("Error en la preparación de la consulta: " . $conn->error);
            }

            $stmt->bind_param("ss", $nombre, $contrasena);
            $stmt->execute();
            $result = $stmt->get_result();

            if (!$result) {
                die("Error en la ejecución de la consulta: " . $stmt->error);
            }

            // Verificar si las credenciales son correctas
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                // Establecer la sesión
                $_SESSION["usuario"] = $nombre;
                $_SESSION["rol"] = $row["rol"];

                // Redirigir según el rol almacenado en la sesión
                if ($_SESSION["rol"] == "admin") {
                    header("Location: pagina_admin.php");
                    exit();
                } elseif ($_SESSION["rol"] == "usuario") {
                    header("Location: pagina_usuario.php");
                    exit();
                }
            } else {
                echo "Credenciales incorrectas";
            }

            // Cerrar la conexión y la sentencia preparada
            $stmt->close();
            $conn->close();
        }
        ?>
        <h2>SHOP-PHP</h2>
        <h2>Iniciar sesión</h2>
        <form class="formulario" action="login.php" method="post">
            <label class="label_formulario" for="nombre">Nombre:</label>
            <input class="input_formulario" type="text" id="nombre" name="nombre" required><br>

            <label class="label_formulario" for="contrasena">Contraseña:</label>
            <input class="input_formulario" type="password" id="contrasena" name="contrasena" required><br>

            <input class="input_formulario" type="submit" value="Iniciar sesión">
        </form>
    </div>

</body>

</html>