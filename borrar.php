<?php
include 'DB.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtén los detalles del producto para mostrar en la confirmación
    $sql = "SELECT nombre, descripcion, precio FROM productos WHERE id = $id";
    $result = $db->conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nombre = $row['nombre'];
        $descripcion = $row['descripcion'];
        $precio = $row['precio'];
    } else {
        // Manejar el caso en que no se encuentre el producto
        echo "Producto no encontrado";
        exit();
    }
} else {
    // Manejar el caso en que no se proporcionó un ID válido
    echo "ID de producto no proporcionado";
    exit();
}

// Si se ha confirmado el borrado, realiza la operación
if (isset($_POST['borrar'])) {
    $sql = "DELETE FROM productos WHERE id = $id";
    $result = $db->conn->query($sql);

    if ($result) {
        // Borrado exitoso, redirigir a pagina_admin.php
        header("Location: pagina_admin.php");
        exit();
    } else {
        // Manejar el caso en que el borrado no sea exitoso
        echo "Error al borrar el producto";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Borrado</title>
</head>
<body>
    <h2>Confirmar Borrado</h2>
    <p>¿Estás seguro de que quieres borrar el siguiente producto?</p>
    <p>Nombre: <?php echo $nombre; ?></p>
    <p>Descripción: <?php echo $descripcion; ?></p>
    <p>Precio: <?php echo $precio; ?>€</p>

    <form action="" method="post">
        <input type="submit" name="borrar" value="Borrar">
        <a href="pagina_admin.php">Cancelar</a>
    </form>
</body>
</html>
