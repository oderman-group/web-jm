<?php
include("../../modelo/conexion.php");

mysqli_query($conexion,"INSERT INTO ".$bdJM.".evento_secciones(sec_id_evento, sec_posicion, sec_titulo, sec_tamaño, sec_estado)VALUES('".$_POST["idEvento"]."','".$_POST["posicion"]."','".$_POST["titulo"]."','".$_POST["tamaño"]."','".$_POST["estado"]."');");

echo '<script type="text/javascript">window.location.href="secciones.php?idEvento='.$_POST['idEvento'].'"</script>';
exit();