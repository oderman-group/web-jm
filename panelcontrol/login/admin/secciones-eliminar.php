<?php
include("../../modelo/conexion.php");

mysqli_query($conexion,"DELETE FROM ".$bdJM.".evento_secciones WHERE sec_id='".$_GET["idSeccion"]."'");

echo '<script type="text/javascript">window.location.href="secciones.php?idEvento='.$_GET['idEvento'].'"</script>';
exit();