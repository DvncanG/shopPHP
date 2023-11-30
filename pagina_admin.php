
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
        <a class="navegacion__enlace navegacion__enlace--activo" href="login.php">Inicio</a>
        <a class="navegacion__enlace" href="">Modificar</a>
        <a class="navegacion__enlace" href="">Borrar</a>
        <a class="navegacion__enlace" href="">añadir</a>
    </nav>

    <main class="contenedor">
        

        <?php
                session_start();

                // Verificar si el usuario está autenticado como admin
                if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== "admin") {
                    header("Location: login.php"); // Redirigir a la página de inicio de sesión si no está autenticado
                    exit();
                }

              
        ?>
        <div class="grid">
            <div class="producto">
               
                    <img class="producto__imagen" src="img/1.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Falda Olympia</p>
                        <p class="producto__precio">30€</p>
                    </div>
             
            </div> <!--.producto-->
            <div class="producto">
               
                    <img class="producto__imagen" src="img/2.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Camiseta Rayas</p>
                        <p class="producto__precio">6€</p>
                    </div>
            
            </div> <!--.producto-->
            <div class="producto">
           
                    <img class="producto__imagen" src="img/3.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Camisa blanca</p>
                        <p class="producto__precio">20€</p>
                    </div>
            
            </div> <!--.producto-->
            <div class="producto">
               
                    <img class="producto__imagen" src="img/4.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Camisa azul</p>
                        <p class="producto__precio">25€</p>
                    </div>
              
            </div> <!--.producto-->
            <div class="producto">
               
                    <img class="producto__imagen" src="img/5.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Camisa cuadros</p>
                        <p class="producto__precio">7€</p>
                    </div>
              
            </div> <!--.producto-->
            <div class="producto">
               
                    <img class="producto__imagen" src="img/6.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Camisa cuadros</p>
                        <p class="producto__precio">40€</p>
                    </div>
             
            </div> <!--.producto-->
            <div class="producto">
              
                    <img class="producto__imagen" src="img/7.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Camisa camionero</p>
                        <p class="producto__precio">15€</p>
                    </div>
               
            </div> <!--.producto-->
            <div class="producto">
              
                    <img class="producto__imagen" src="img/8.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Camisa especial</p>
                        <p class="producto__precio">40€</p>
                    </div>
               
            </div> <!--.producto-->
            <div class="producto">
               
                    <img class="producto__imagen" src="img/9.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Camisa ross</p>
                        <p class="producto__precio">40€</p>
                    </div>
              
            </div> <!--.producto-->
            <div class="producto">
               
                    <img class="producto__imagen" src="img/10.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Camisa cuadros</p>
                        <p class="producto__precio">25€</p>
                    </div>
              
            </div> <!--.producto-->
            <div class="producto">
               
                    <img class="producto__imagen" src="img/11.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Camisa leñador</p>
                        <p class="producto__precio">25€</p>
                    </div>
            
            </div> <!--.producto-->
            <div class="producto">
             
                    <img class="producto__imagen" src="img/12.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Vestido cena</p>
                        <p class="producto__precio">50€</p>
                    </div>
             
            </div> <!--.producto-->
            <div class="producto">
              
                    <img class="producto__imagen" src="img/13.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Conjunto playa</p>
                        <p class="producto__precio">15€</p>
                    </div>
              
            </div> <!--.producto-->
            <div class="producto">
                
                    <img class="producto__imagen" src="img/14.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">chandal del rollo</p>
                        <p class="producto__precio">30€</p>
                    </div>
              
            </div> <!--.producto-->

            
            <div class="grafico grafico--camisas"></div>
            <div class="grafico grafico--node"></div>

        </div>

    </main>

    <footer class="footer">
        <p class="footer__texto">@copyrigth.SaraIllanDvncan</p>
    </footer>

</body>
</html>