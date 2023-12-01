<?php
session_start();

// Verificar si el usuario está autenticado como usuario
if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== "usuario") {
    header("Location: login.php"); // Redirigir a la página de inicio de sesión si no está autenticado
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FrontEnd Store</title>

    <link rel="stylesheet" href="css/tiendaropa.css">

</head>

<body>

    <header class="header">

        <img class="header__logo" src="img/logojpg.jpg" alt="Logotipo">

    </header>

    <nav class="navegacion">
        <a class="navegacion__enlace navegacion__enlace--activo" href="logout.php">Inicio</a>

    </nav>

    <main class="contenedor">



        <div class="grid">
            <?php
            include 'productos_usuario.php'?>


            <div class="grafico grafico--camisas"></div>
            <div class="grafico grafico--node"></div>

        </div>

    </main>

    <footer class="footer">
        <p class="footer__texto">@copyrigth.SaraIllanDvncan</p>
    </footer>

</body>

</html>