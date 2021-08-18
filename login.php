<?php 
include 'php/conexion.php';

if ($_SERVER["REQUEST_METHOD"]=="POST") {
	$usuario = $_POST['user'];
	$contra = $_POST['contra'];

	$instruccion = "SELECT * FROM usuarios WHERE usuario = '$usuario' and contra = '$contra'";
	$query = mysqli_query($conexion, $instruccion);
	$result = mysqli_fetch_array($query, MYSQLI_ASSOC);
	$contador = mysqli_num_rows($query);

	if ($contador == 1) {
		session_start();
		$_SESSION['nombre'] = $result['nombreCompleto'];
		$_SESSION['usuario'] = $usuario;
    header('location: formVehiculo.php');
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/stlogin.css">
  <title>Venta de Autos LUAS</title>
</head>
<body>
  <div class = "contenedor">
    <img class = "imglogin" src="img/fondo.jpg" alt="">
    <h1>Bienvenido</h1>
    <form method="POST" action="">
      <!--usuario-->
      <label for="usuario">Usuario</label>
      <input type="text" placeholder= "Ingrese Usuario" name= "user">
      <!--contraseña-->
      <label for="contra">Contraseña</label>
      <input type="password" placeholder= "Ingrese Contraseña" name = "contra">

      <input class = "btn" type="submit" value= "Iniciar Sesión">

    </form>

  </div>
</body>
</html>