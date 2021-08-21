<?php 
include 'conexion.php';
session_start();
include 'autenticacion.php';

$correlativo= $_GET['correlativo'];
$instruccion = "SELECT * FROM vehiculos Where correlativo = '$correlativo'";
$query = mysqli_query($conexion,$instruccion);
$instruccionF = "SELECT * FROM fotos_auto Where id_Vehiculo = '$correlativo'";
$queryF = mysqli_query($conexion,$instruccionF);

//variables globales para uso en el formulario
$Linea = "";
$tipo = "";
$pais = "";


while($r=mysqli_fetch_assoc($query))
{

	$linea = $r['linea'];
	$modelo = $r['modelo'];
	$kilometraje = $r['km'];
	$precio = $r['precio'];
	$puertas = $r['cantidad_puertas'];
	
}

 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Formulario de Actualizacion</title>
	<link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
<nav class="nav-main">
      <ul>
        <li>
        <a>Bienvenido : <?php echo $_SESSION['nombre']; ?></a>
        </li>
      </ul>
      <ul class="nav-menu">

        <li>
            <a href="verVehiculos.php">Regresar a Visualizar Vehículos</a>
        </li>
        <li>
            <a href="formVehiculo.php">Registrar Nuevos Vehículos</a>
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
	<div class="contenedor">
         <div class="formulario">
            <h1>Formulario para insertar Vehículo</h1>
			<form class="form" action="editarVehiculo.php" method="POST">
				
				<label>Linea</label><br><input type="text" name="linea" value="<?php echo $linea; ?>"><br>
				<label>Modelo</label><br><input type="text" name="modelo" value="<?php echo $modelo; ?>"><br>
				<label>Kilometraje</label><br><input type="text" name="km" value="<?php echo $kilometraje; ?>"><br>
				<label>No. de Puertas</label><br><input type="text" name="cantidad_puertas" value="<?php echo $puertas;?>"><br>
				<label>Precio</label><br><input type="text" name="precio" value="<?php echo $precio; ?>"><br>
				<input type="hidden" name="correlativo" value="<?php echo $correlativo; ?>"><br>
				<input type="submit" value="Actualizar">

			</form>
		</div>
    </div>

</body>
</html>