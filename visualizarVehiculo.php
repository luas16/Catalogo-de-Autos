<?php 
include 'php/conexion.php';
session_start();
include 'php/autenticacion.php';
$miToken = $_SESSION['token'];
$us = $_SESSION['usuario'];


echo $us ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
</body>
<script>
    window.tokenGlobal = "<?php echo $miToken ?>";
</script>
<script type="text/javascript" src="js/tk.js"></script>

</html>
