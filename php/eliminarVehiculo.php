<?php 
include 'conexion.php';
session_start();
include 'autenticacion.php';

$correlativo = $_GET['correlativo'];

$instruccionF = "DELETE FROM fotos_autos WHERE id_vehiculo = '$correlativo'";
mysqli_query($conexion,$instruccionF);

$instruccion = "DELETE FROM vehiculos WHERE correlativo = '$correlativo'";
$validacion = mysqli_query($conexion,$instruccion);



if($validacion)
{
    //instrucciones para un valor verdadero
    header('location: alertPos.php'); //nos permite enviar al navegador de un archivo a otro
}
else{
    //instrucciones para un valor falso
    header('location: alertNeg.php'); //nos permite enviar el navegador de un archivo a otro
}

 ?>