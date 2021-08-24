<?php 
include 'conexion.php';

$codVehiculo = $_GET['codVehiculo'];

$instruccionf = "SELECT ubicacion FROM fotos_autos WHERE id_vehiculo= '$codVehiculo'";
$queryf= mysqli_query($conexion,$instruccionf);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Detalles del Vehiculo</title>
	<link rel="stylesheet" href="../css/estiloIn.css">
</head>
<body>
<nav class="nav-main">
      <ul>
        <li>
        <a>Bienvenido</a>
        </li>
      </ul>
      <ul class="nav-menu">

        <li>
            <a> Autoventas SD   </a>
        </li>
      </ul>

      <ul >
        <li >
                <a href="index.php">Ir a Pagina Princial</a>
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
     <!-- Carros -->
     <div class="carros">
<?php 
        while ($rf = mysqli_fetch_assoc($queryf)) {         
                echo "<div class = 'vehiculos'>
                    <img src =".$rf['ubicacion'].">
                    </div>";
                }
?>
    </div>

	<div class="contenedor">
         <div class="formulario">
            <h1>Detalles del Vehiculo</h1>
            <table id="t01">
    <tr>
      <th>Tipo</th>
      <th>Marca</th> 
      <th>Modelo</th>
      <th>Transmisión</th>
      <th>Precio</th>
    </tr>
    <?php 

      include 'conexion.php';
      $instruccion = "SELECT vehiculos.correlativo, tipo_vehiculo.tipo, marcas.marca, vehiculos.modelo, transmision.transmision, vehiculos.precio FROM vehiculos
      INNER JOIN tipo_vehiculo on vehiculos.tipo = tipo_vehiculo.id_tipo
      INNER JOIN marcas on vehiculos.marca = marcas.id_marcar
      INNER JOIN transmision on vehiculos.transmision = transmision.id_transmicion";
      $query = mysqli_query($conexion,$instruccion);

      while ($r = mysqli_fetch_assoc($query)) {
        if($codVehiculo == $r['correlativo'])
        {
        echo "<tr>
                <td>".$r['tipo']."</td>
                <td>".$r['marca']."</td>
                <td>".$r['modelo']."</td>
                <td>".$r['transmision']."</td>
                <td>".$r['precio']."</td>
             </tr>";
        }
      }
?>
  </table>
  
		</div>
  </div>

</body>
</html>