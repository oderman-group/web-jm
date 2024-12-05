<?php
include("../../modelo/conexion.php");

mysqli_query($conexion,"DELETE FROM ".$bdJM.".evento_subsecciones WHERE subsec_id='".$_GET["idSubseccion"]."'");

echo '<script type="text/javascript">window.location.href="subsecciones.php?idSeccion='.$_GET["idSeccion"].'&idEvento='.$_GET['idEvento'].'"</script>';
exit();