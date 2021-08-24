<?php 
include 'conexion.php';
/*consulta para los datos */
$instruccion = "SELECT vehiculos.correlativo, fotos_autos.ubicacion, marcas.marca, vehiculos.modelo, vehiculos.linea FROM vehiculos
INNER JOIN fotos_autos on vehiculos.correlativo = fotos_autos.id_vehiculo
INNER JOIN marcas on vehiculos.marca = marcas.id_marcar";
$query = mysqli_query($conexion,$instruccion);

/*Ralizamos consulta para poder tomar una foto */
$instruccionf = "SELECT *, (ROW_NUMBER()OVER(PARTITION BY id_vehiculo ORDER BY correlativo)) AS fila
FROM fotos_autos";
$queryf = mysqli_query($conexion,$instruccionf);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--font awesome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!--conexion al css-->
  <link rel="stylesheet" href="../css/estiloIn.css">
  <title>Vehículos</title>
</head>
<body>
  <!--icono de menu responsivo-->
  <div class="menu-btn">
        <i class="fas fa-bars"></i>
  </div>
  <!--menu principal-->
    <nav class="nav-main">
      <ul class="nav-menu-izquierda">
         <li>
             <a href="#">
                 <i class="fas fa-bars"></i>
             </a>
         </li>
      </ul>
      <ul class="nav-menu">
        <li>
            <a href="#">Vehiculos</a>
        </li>
        <li>
            <a href="#">Nosotros</a>
        </li>
        <li>
            <a href="#">Contacto</a>
        </li>
      </ul>

      <ul >
        <li >
              <a href="login.php">Iniciar Sesion</a>
          </li>
      </ul>
      <ul class="nav-menu-derecha">
         <li>
             <a href="#">
                 <i class="fas fa-search"></i>
             </a>
         </li>
      </ul>
   </nav>
  <!-- imagen principal -->
    <header class="imgPrincipal">
      <h2>Auto Ventas "SD"</h2>
    </header>

  <!-- Carros -->
    <div class="carros">
<?php
    while($r = mysqli_fetch_assoc($query)) {

        while ($rf = mysqli_fetch_assoc($queryf)) {
            
            if($rf['fila'] ==1)
                {
                echo "<div class = 'vehiculos'>
                    <img src =".$rf['ubicacion'].">
                    <h3>".$r['marca']."</h3>
                    <p>".$r['modelo']."</p>
                    <p>".$r['linea']."</p>
                    <a href = 'visualizarVehiculo.php? codVehiculo= ".$rf['id_vehiculo']."' >Ver Vehiculo</a>
                    </div>";
                }
            }
    }

?>

    </div>

    <div class = "areaSocial">
        <div class="links">
            <a href="https://www.facebook.com" target= "-blank"> <i class="fab fa-facebook"></i></a>
            <a href="https://twitter.com" target= "-blank"> <i class="fab fa-twitter"></i></a>
            <a href="https://www.whatsapp.com" target= "-blank"> <i class="fab fa-whatsapp"></i></a>
            <a href="https://www.linkedin.com" target= "-blank"> <i class="fab fa-linkedin"></i></a>
            <a href="https://www.instagram.com" target= "-blank"> <i class="fab fa-instagram"></i></a>
        </div>
    </div>


<!--pie de pagina -->
<div class="footer-links">
    <div class="footer-container">
        <ul>
            <li>
                <a>
                    <h3>Nosotros</h3>
                </a>
            </li>
            <li>
                <a href="#">Visón</a>
            </li>
            <li>
                <a href="#">Misión</a>
            </li>
            <li>
                <a href="#">Principios</a>
            </li>
            <li>
                <a href="#">Valores</a>
            </li>
        </ul>
        <ul>
            <li>
                <a >
                    <h3>Tipo de Vehiculos</h3>
                </a>
            </li>
            <li>
                <a href="#">PickUP</a>
            </li>
            <li>
                <a href="#">Sedan</a>
            </li>
            <li>
                <a href="#">Hasback</a>
            </li>
            <li>
                <a href="#">Motocicletas</a>
            </li>
            <li>
                <a href="#">Mas...</a>
            </li>
        </ul>
        <ul>
            <li>
                <a>
                    <h3>Contacto</h3>
                </a>
            </li>
            <li>
                <a href="#">Ubicaciones</a>
            </li>
            <li>
                <a href="#">Correo</a>
            </li>
            <li>
                <a href="#">Telefonos</a>
            </li>
            <li>
                <a href="#">Servicios Varios</a>
            </li>
            <li>
                <a href="#">Mas...</a>
            </li>
        </ul>
        <ul>
            <li>
                <a>
                    <h3>Marcas</h3>
                </a>
            </li>
            <li>
                <a href="#">Toyota</a>
            </li>
            <li>
                <a href="#">Mazda</a>
            </li>
            <li>
                <a href="#">Hyndai</a>
            </li>
            <li>
                <a href="#">Honda</a>
            </li>
            <li>
                <a href="#">Mas..</a>
            </li>
        </ul>

    </div>
</div>
    <footer class="footer">   
        <h3>Autoventas SD Copyright</h3>
        <p>Multiservicios lúaS</p>
    </footer> 

    <!--estilo de scroll-->
    <script src="https://unpkg.com/scrollreveal"></script>
    <!--conexion al js-->
    <script src="../js/main.js"></script>
</body>
</html>
