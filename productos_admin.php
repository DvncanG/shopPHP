<?php
include 'DB.php';

// Accede a la conexión a través de la instancia de la clase DB
$sql = "SELECT id, nombre, descripcion, precio, imagen FROM productos";
$result = $db->conn->query($sql);

// Muestra los productos dinámicamente
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="producto">';
        echo '<img class="producto__imagen" src="' . $row["imagen"] . '" alt="imagen producto">';
        echo '<div class="producto__informacion">';
        echo '<p class="producto__nombre">' . $row["nombre"] . '</p>';
        echo '<p class="producto__descripcion">' . $row["descripcion"] . '</p>';
        echo '<p class="producto__precio">' . $row["precio"] . '€</p>';
        echo '<form action="modificar.php" method="get">';
        echo '<input type="hidden" name="id" value="' . $row["id"] . '">';
        echo '<button type="submit" class="producto__precio" name="modificar">Modificar</button>';
        echo '</form>';

        echo '<a class="producto__precio" href="borrar.php?id=' . $row["id"] . '">Borrar</a>';
        echo '</div></div>';
    }
} else {
    echo "0 resultados";
}
?>