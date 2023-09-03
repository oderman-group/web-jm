<?php
include("../../modelo/conexion.php");

mysqli_query($conexion,"DELETE FROM ".$bdJM.".catalogos WHERE cata_id='".$_GET["id"]."'");

echo '<script type="text/javascript">window.location.href="catalogos.php"</script>';
exit();