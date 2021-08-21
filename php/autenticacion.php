
<?php

if (!isset($_SESSION['usuario'])) {
    header('location: login.php');
    die(); 
  }
  
if (!isset($_COOKIE['cookUser'])) {
    header('location: login.php');
    die(); 
  }
  
if($_SESSION['token'] != $_COOKIE['cookUser'])
  {
    header('location: login.php');
    die(); 
  }
  
?>