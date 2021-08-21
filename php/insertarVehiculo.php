<?php
include 'conexion.php';
session_start();
include 'autenticacion.php';


//recogemos toda la informacion y la enviamos a nuestra base de datos media vez ingresen fotos
$marca = $_POST['marca'];
$linea = $_POST['linea'];
$tipo = $_POST['tipo'];
$transmision = $_POST['transmision'];
$modelo = $_POST['modelo'];
$km = $_POST['km'];
$traccion = $_POST['traccion'];
$combustible = $_POST['combustible'];
$color = $_POST['color'];
$precio = $_POST['precio'];
$cantidad_puertas = $_POST['cantidad_puertas'];
//se envia la informacion a traves de esta consulta
$squery = "INSERT INTO vehiculos(correlativo, marca, linea, tipo, transmision, modelo, km, traccion, combustible, color, precio, cantidad_puertas) VALUES (NULL, '$marca', '$linea', '$tipo', '$transmision', '$modelo', '$km', '$traccion', '$combustible', '$color', '$precio', '$cantidad_puertas')";

mysqli_query($conexion, $squery);

//se recoge al id del ultimo dato ingresado en nuestra BD
$idvehiculo = mysqli_insert_id($conexion);


foreach ($_FILES["archivo"]["tmp_name"] as $key => $tmp_name) {

	if ($_FILES["archivo"]["name"][$key]) {
		//Como se ingresaron las fotos se realiza lo siguiente para recopilar la informacion necesaria.
		$nombreArchivo = $_FILES["archivo"]["name"][$key];//recopilamos nombre de archivo
		$ubicacion = $_FILES["archivo"]["tmp_name"][$key];//recopilamos la ubicacion en el servidor

		$directorio= '../img/fotos/';//inidcamos donde se guardaran las imagenes

		if(!file_exists($directorio))//verificando si la carpeta existe
		{
			mkdir($directorio,0777) or die("no logramos crear carpeta");//codigo para crear carpetas

		}

		$dir = opendir($directorio);//abriendo carpeta
		$ubicacionSalida = $directorio.$nombreArchivo;


		//validando y moviendo imagenes
		if(move_uploaded_file($ubicacion, $ubicacionSalida))
		{
			$queryf = "INSERT INTO fotos_autos(correlativo, id_vehiculo, ubicacion) Values (NULL, '$idvehiculo' ,'$ubicacionSalida')";
			mysqli_query($conexion, $queryf);

		}else
		{
			echo "Error, No ha subido ninguna foto";
		}

		
		closedir($dir);//cerrando carpeta
		header('location: alertPos.php');
	}
	else
	{
		header('location: alertNeg.php');
	}

}


?>

