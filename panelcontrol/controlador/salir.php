<?php 
session_start();
include("../modelo/conexion.php");
//mysqli_query($conexion,"UPDATE usuarios SET usu_sesion_activa=0 WHERE usu_id='".$_GET["id"]."'");
//if(mysqli_errno()!=0){echo mysqli_error(); exit();}
session_destroy();
header("Location:../login/");
?>