<?php
  include('../controladores/global/conexion.php');
  include('../controladores/global/sesiones.php');
  $sentencia=$pdo->prepare("SELECT * FROM `tblusuarios` WHERE estatus='A' ");
  $sentencia->execute();
  $listausuarios=$sentencia->fetchAll(PDO::FETCH_ASSOC);
  // print_r($listausuarios);
?>