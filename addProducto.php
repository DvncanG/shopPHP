<?php
include 'db.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Resto del código de procesamiento de formulario
    // ...

    // Construir la consulta SQL
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];

    $sql = "INSERT INTO productos (nombre, descripcion, precio, imagen) VALUES ('$nombre', '$descripcion', $precio, '$imagen')";

    // Ejecutar la consulta
    if ($db->conn->query($sql) === TRUE) {
        // Redirigir a la pagina_admin.php
        header("Location: pagina_admin.php");
        exit(); // Asegurar que el script se detenga después de la redirección
    } else {
        echo "Error al agregar el producto: " . $db->conn->error;
    }
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Producto</title>
    <link rel="stylesheet" href="./css/addProducto.css">
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <h2>Añadir Producto</h2>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" required></textarea>

        <label for="precio">Precio:</label>
        <input type="number" name="precio" step="0.01" required>

        <label for="imagen">Imagen URL:</label>
        <input type="text" placeholder="img/... .jpg" name="imagen" required>

        <input type="submit" value="Añadir Producto">
    </form>
</body>

</html>