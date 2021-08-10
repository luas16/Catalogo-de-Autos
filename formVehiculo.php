<?php
include 'php/conexion.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formuladio Insersion de Vehículo</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>

<body>
    <div class="contenedor">
         <div class="formulario">
            <h1>Formulario para insertar Vehículo</h1>

            <form class="form" action="insertarVehiculo.php" method="POST" enctype="multipart/form-data">  
                <span>Marca del Vehículo:</span><br>
                <select name="marca" class="cmb"  >
                    <?php 
                    $instrucion = "SELECT * FROM marcas";
                    $query = mysqli_query($conexion,$instrucion);
                    
                    while ($r = mysqli_fetch_assoc($query)) {
                        echo "<option value='".$r['id_marcar']."'>".$r['marca']."</option>";
                    }
                    ?>
                </select><br>
                <input class = "fdescripcion" type="text" name = "descripcionMarca" placeholder = "Descripción"><br>
                <input class = "flinea" type="text" name = "linea" placeholder = "Linea del Vehiculo"><br>
                <span>Tipo de Vehículo:</span><br>
                <select name="tipo" class="cmb"  >

                    <?php 
                    $instrucion = "SELECT * FROM tipo_vehiculo";
                    $query = mysqli_query($conexion,$instrucion);
                    
                    while ($r = mysqli_fetch_assoc($query)) {
                        echo "<option value='".$r['id_tipo']."'>".$r['tipo']."</option>";
                    }
                    ?>
                </select><br>
                <input class = "fdescripcion" type="text" name = "descripcionTipo" placeholder = "Descripción"><br>
                <span>Transmision del Vehículo:</span><br>
                <select name="transmision" class="cmb"  >

                    <?php 
                    $instrucion = "SELECT * FROM transmision";
                    $query = mysqli_query($conexion,$instrucion);
                    
                    while ($r = mysqli_fetch_assoc($query)) {
                        echo "<option value='".$r['id_transmicion']."'>".$r['transmision']."</option>";
                    }
                    ?>
                </select><br>
                <input class = "fdescripcion" type="text" name = "descripcionTransmision" placeholder = "Descripción"><br>
                <input class = "fmodelo" type="text" name = "modelo" placeholder = "Modelo del Vehículo"><br>
                <input class = "fkm" type="text" name = "km" placeholder = "Kilometraje del Vehiculo"><br>
                <span>Tracción del Vehículo:</span><br>
                <select name="traccion" class="cmb"  >

                    <?php 
                    $instrucion = "SELECT * FROM traccion";
                    $query = mysqli_query($conexion,$instrucion);
                    
                    while ($r = mysqli_fetch_assoc($query)) {
                        echo "<option value='".$r['id_traccion']."'>".$r['traccion']."</option>";
                    }
                    ?>
                </select><br>
                <input class = "fdescripcion" type="text" name = "descripcionTraccion" placeholder = "Descripción"><br>
                <span>Combustible:</span><br>
                <select name="combustible" class="cmb"  >

                    <?php 
                    $instrucion = "SELECT * FROM combustible";
                    $query = mysqli_query($conexion,$instrucion);
                    
                    while ($r = mysqli_fetch_assoc($query)) {
                        echo "<option value='".$r['id_combustible']."'>".$r['combustible']."</option>";
                    }
                    ?>
                </select><br>
                <input class = "fdescripcion" type="text" name = "descripcionCombustible" placeholder = "Descripción"><br>
                <span>Color del Vehículo:</span><br>
                <select name="color" class="cmb"  >

                    <?php 
                    $instrucion = "SELECT * FROM colores";
                    $query = mysqli_query($conexion,$instrucion);
                    
                    while ($r = mysqli_fetch_assoc($query)) {
                        echo "<option value='".$r['id_color']."'>".$r['color']."</option>";
                    }
                    ?>
                </select><br>
                <input class = "fprecio" type="text" name = "precio" placeholder = "Precio del Vehículo"><br>
                <input class = "fcantidad_puertas" type="text" name = "cantidad_puertas" placeholder = "No. de puertas del Vehículo"><br>
                <span>Ingrese fotos del Vehículo:</span><br>
                <input type="file" name= "archivo[]" multiple=""><br>
                
                <input type="submit" value = "Insertar" class = "btnInsertar">

            </form>
        </div>
    </div>

</body>

</html>