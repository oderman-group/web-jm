<?php
include("../../modelo/conexion.php");

mysqli_query($conexion,"UPDATE ".$bdJM.".evento_secciones SET sec_titulo='".$_POST["titulo"]."', sec_estado='".$_POST["estado"]."', sec_posicion='".$_POST["posicion"]."', sec_tamaño='".$_POST["tamaño"]."' WHERE sec_id='".$_POST["idSeccion"]."'");

echo '<script type="text/javascript">window.location.href="secciones.php?idEvento='.$_POST['idEvento'].'"</script>';
exit();