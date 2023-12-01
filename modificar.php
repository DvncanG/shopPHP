<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/tiendaropa.css">
    <!-- Reemplaza "tu_estilo.css" con la ruta correcta a tu hoja de estilo -->
    <title>Título de tu página</title>
</head>

<body>

<?php
include 'DB.php';

// Verifica si se envió el formulario POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actualizar'])) {
    // Recupera los datos del formulario POST
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    // Puedes agregar más campos según sea necesario (imagen, etc.)

    // Consulta para actualizar el producto
    $sql = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio='$precio' WHERE id=$id";

    if ($db->conn->query($sql) === TRUE) {
        // Redirige a la página_admin.php después de una inserción exitosa
        header("Location: pagina_admin.php");
        exit();
    } else {
        echo "Error al actualizar el producto: " . $db->conn->error;
    }
} elseif (isset($_GET['id'])) {
    // Recupera el ID del producto desde la URL
    $id = $_GET['id'];

    // Consulta para obtener la información del producto
    $sql = "SELECT id, nombre, descripcion, precio, imagen FROM productos WHERE id = $id";
    $result = $db->conn->query($sql);

    // Verifica si se encontró el producto
    if ($result->num_rows > 0) {
        $producto = $result->fetch_assoc();

        // Mostrar un formulario prellenado con la información actual del producto
        echo '<main class="contenedor">';
        echo '<div class="grid">';
        echo '<div class="producto">';
        echo '<img class="producto__imagen" src="' . $producto["imagen"] . '" alt="imagen producto">';
        echo '<div class="producto__informacion">';
        echo '<form action="modificar.php?id=' . $producto["id"] . '" method="post">';
        echo '<input type="hidden" name="id" value="' . $producto["id"] . '">';
        echo '<label for="nombre">Nombre:</label>';
        echo '<input type="text" name="nombre" value="' . $producto["nombre"] . '">';
        echo '<label for="descripcion">Descripción:</label>';
        echo '<input type="text" name="descripcion" value="' . $producto["descripcion"] . '">';
        echo '<label for="precio">Precio:</label>';
        echo '<input type="text" name="precio" value="' . $producto["precio"] . '">';
        // Agrega más campos según sea necesario (imagen, etc.)
        echo '<button type="submit" name="actualizar" class="producto__precio">Actualizar</button>';
        echo '</form>';
        echo '</div></div></div></main>';
    } else {
        echo "Producto no encontrado";
    }
} else {
    echo "Acceso no autorizado";
}
?>

</body>

</html>