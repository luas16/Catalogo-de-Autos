<?php 
include 'conexion.php';
session_start();
include 'autenticacion.php';

$linea=$_POST['linea'];
$modelo=$_POST['modelo'];
$kilometraje=$_POST['km'];
$puertas=$_POST['cantidad_puertas'];
$precio=$_POST['precio'];
$correlativo=$_POST['correlativo'];

$instruccion = "UPDATE vehiculos SET linea = '$linea', modelo = '$modelo', km = '$kilometraje', precio = '$precio', cantidad_puertas = '$puertas' WHERE correlativo = '$correlativo'";

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