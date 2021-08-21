<?php 
include 'conexion.php';
session_start();
include 'autenticacion.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/verV.css">
  <title>Vehículos</title>
</head>
<body>
  <!--menu principal-->
  <nav class="nav-main">
      <ul>
        <li>
        <a>Bienvenido : <?php echo $_SESSION['nombre']; ?></a>
        </li>
      </ul>
      <ul class="nav-menu">

        <li>
            <a href="verVehiculos.php">Visualizar Vehículos</a>
        </li>
        <li>
            <a href="formVehiculo.php">Registrar Nuevos Vehículos</a>
        </li>
        <li>
            <a href="../index.html" target= "-blank">Ver página principal</a>
        </li>
      </ul>

      <ul >
        <li >
              <a href="logout.php">Cerrar Sesion</a>
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

  <header class="imgPrincipal">
      <h2>Auto Ventas "SD" <br> Información de Vehículos</h2>
  </header>
  <table id="t01">
    <tr>
      <th>Tipo</th>
      <th>Marca</th> 
      <th>Modelo</th>
      <th>Transmisión</th>
      <th>Precio</th>
      <th>Editar</th>
      <th>Eliminar</th>
    </tr>
    <?php 

      include 'conexion.php';

      $instruccion = "SELECT vehiculos.correlativo, tipo_vehiculo.tipo, marcas.marca, vehiculos.modelo, transmision.transmision, vehiculos.precio FROM vehiculos
      INNER JOIN tipo_vehiculo on vehiculos.tipo = tipo_vehiculo.id_tipo
      INNER JOIN marcas on vehiculos.marca = marcas.id_marcar
      INNER JOIN transmision on vehiculos.transmision = transmision.id_transmicion";
      $query = mysqli_query($conexion,$instruccion);

      while ($r = mysqli_fetch_assoc($query)) {
        
        echo "<tr>
                <td>".$r['tipo']."</td>
                <td>".$r['marca']."</td>
                <td>".$r['modelo']."</td>
                <td>".$r['transmision']."</td>
                <td>".$r['precio']."</td>
                <td><a href= 'formModificarVehiculo.php? correlativo=".$r['correlativo']."'><svg class = 'btnEditar' xmlns='http://www.w3.org/2000/svg' class='h-6 w-6' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z'/>
                  </svg></a></td>
                <td><a href = 'eliminarVehiculo.php? correlativo= ".$r['correlativo']."' ><svg class = 'btnEliminar' xmlns='http://www.w3.org/2000/svg' class='h-6 w-6' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16' />
                  </svg></a></td>
             </tr>";
      }
?>
  </table>
</body>
</html>
