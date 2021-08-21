<?php 
session_start();

session_destroy();
setcookie("cookUser","",time()-1,"/");
header('location: login.php');

 ?>
